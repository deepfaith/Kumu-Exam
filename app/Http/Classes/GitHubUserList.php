<?php
namespace App\Http\Classes;

/**
 * GithubUserList Class.
 *
 * @copyright  2021 Alan Padiernos
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class GithubUserList
{
    /**
    * @var GithubUser[] The GithubUsers
    */
    private array $list = array();


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
        $this->list = $this->list ? $this->list : [];
        return $this->list;
    }
}
