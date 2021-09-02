<?php

namespace App\Http\Controllers;

use App\Http\Classes\GithubUser;
use App\Http\Classes\GithubUserList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator;

/**
 * Github API script.
 *
 * It query requests from users endpoint
 *
 * @copyright  2021 Alan Padiernos
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class GithubUserController extends Controller
{
    /**
     * @var int
     */
    private int $is_list_exec;

    /**
     * @return int
     */
    public function getIsListExec(): int
    {
        return $this->is_list_exec;
    }

    /**
     * @param int $is_list_exec
     */
    public function setIsListExec(int $is_list_exec): void
    {
        $this->is_list_exec = $is_list_exec;
    }

    /**
     * Get the users from github api
     *
     * @param String $username username of a github account
     * @return String of api response
     */
    public function getGithubUser($username)
    {
        $username = $username == 'me' ? Auth::user()->name : $username;

        //check if the redis key exists
        $is_cached = self::redis_get_cache($username);
        if( $is_cached )
        {
            $response = $is_cached;
        }
        else{
            try {
                if( $this->getIsListExec() )
                    sleep(5);
                $response = Http::get($this->base_url .'/users/'. $username);

                //set the redis key as username and it's value based on the response
                self::redis_set_cache($username,json_encode($response->json()));
            } catch (\Exception $e) {
                abort(503);
            }

            if ( $response->status() == 401) {
                throw new AuthenticationException();
            } else if (! $response->successful()) {
                abort(503);
            }
            $response = $response->json();

        }
        return $response;
    }


    /**
     * API request to get users list
     * @param Request $request
     * @return GithubUser[]|mixed
     */
    public function getGithubUsers(Request $request)
    {
        $userList = new GithubUserList();
        $total = 1;
        $users = array();

        //set the sort filter
        $sort = SORT_DESC;
        if( $request->sort ) {
            $sort = strtolower($request->sort) == 'asc' ? SORT_ASC : SORT_DESC;
        }
        try {
            //check if we can query by usernames
            if( $request->usernames ) {
                $users = $request->usernames;
            }else {
                //check if list of users are cached
                $is_cached = self::redis_get_cache('githubuserslist');
                if ($is_cached) {
                    $response = $is_cached;
                } else {
                    $response = Http::get($this->base_url . '/repos/git/git/contributors');
                    $users = $response->body();
                    self::redis_set_cache('githubuserslist', json_encode($response->json()));
                }
                $response = $is_cached ? $is_cached : $users;
                $users = array_column(json_decode($response), 'login');
            }
        } catch (\Exception $e) {
            abort(503);
        }

        // Validation
        $validatorResponse = Validator::make(['users'=>$users,'sort'=>$request->sort],[
            'users' => 'array',
            'sort' => 'string|in:asc,desc|max:4|min:3',
        ]);
        // Send failed response if validation fails
        if ($validatorResponse->fails()) {
            return $this->sendInvalidFieldResponse($validatorResponse->errors());
        }

        //build the user object and add them into arrayList
        foreach( $users as $user ){
            if( $total != 11 ) {
                $githubuser = self::setUser($user);
                $userList->add($githubuser);
            }else
                break;
            $total++;
        }
        $response = $userList->all();

        //sort by key
        array_multisort(array_column($response , 'name'), $sort, $response);
        return $response;
    }


    /**
     * build the user object
     * @param string $githubusername
     * @return GithubUser
     */
    private static function setUser(string $githubusername): GithubUser
    {
        $user = new GithubUser();

        //get the user in github
        $response = $user->getGithubuser($githubusername);
        $githubuser = json_decode($response);

        $user->setName($githubuser->name ? $githubuser->name : '');
        $user->setLogin($githubuser->login);
        $user->setCompany($githubuser->company ? $githubuser->company : '');

        //get the no. of followers
        $no_of_followers = self::getUserFollowers($githubuser->followers_url);
        $user->setNoOfFollowers($no_of_followers);

        //get the no. of repos
        $no_of_repos = self::getUserRepos($githubuser->repos_url);
        $user->setNoOfPublicrepos($no_of_repos);

        return $user;
    }


    /**
     * API request to get users followers
     * @param string $githubuserfollowersurl
     * @return int
     */
    private static function getUserFollowers(string $githubuserfollowersurl): int
    {
        try {
            $is_cached = self::redis_get_cache($githubuserfollowersurl);
            if( $is_cached ){
                $response = $is_cached;
            }else{
                $response = Http::get($githubuserfollowersurl);
                self::redis_set_cache($githubuserfollowersurl,json_encode($response->json()));
                $response = $response->body();
            }

            return count(json_decode($response));
        } catch (\Exception $e) {
            return 0;
        }
        return 0;
    }


    /**
     * API request to get user repos
     * @param string $githubuserreposurl
     * @return int
     */
    private static function getUserRepos(string $githubuserreposurl): int
    {
        try {
            $is_cached = self::redis_get_cache($githubuserreposurl);
            if( $is_cached ){
                $response = $is_cached;
            }else{
                $response = Http::get($githubuserreposurl);
                self::redis_set_cache($githubuserreposurl,json_encode($response->json()));
                $response = $response->body();
            }

            return count(json_decode($response));
        } catch (\Exception $e) {
            return 0;
        }
        return 0;
    }


}
