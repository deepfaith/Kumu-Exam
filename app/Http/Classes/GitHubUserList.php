<?php
namespace App\Http\Classes;

class GithubUserList
{
    /**
    * @var GithubUser[] The GithubUsers
    */
    private array $list;


    /**
    * Add GithubUser to list.
    *
    * @param GithubUser $GithubUser The GithubUser
    *
    * @return void
    */
    public function add(GithubUser $GithubUser): void
    {
        $this->list[] = (array) $GithubUser;
    }

    /**
    * Get all GithubUsers.
    *
    * @return GithubUser[] The GithubUsers
    */
    public function all(): array
    {
        return $this->list;
    }
}
