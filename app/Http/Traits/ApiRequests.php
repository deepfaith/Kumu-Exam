<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redis;


trait ApiRequests
{
  
/**
     * Get the users from github api 
     *
     * @param String $username username of a github account
     * @return String of api response
     */  
    public function get($username)
    {
        $username = $username == 'me' ? Auth::user()->name : $username;        
        
        //check if the redis key exists
        if( Redis::exists($username) )
        {
            $response = Redis::get($username);
        }
        else{
            try {
                $response = Http::get($this->base_url .'/users/'. $username);
                
                //set the redis key as username and it's value based on the response
                Redis::set($username, json_encode($response->json()), 'EX', 180);
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
  
}
