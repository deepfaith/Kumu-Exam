<?php

namespace App\Http\Classes;

use App\Http\Controllers\GithubUserController;

/**
 * GithubUser Class.
 *
 * @copyright  2021 Alan Padiernos
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class GithubUser
{

	public string $name;
    private string $githubuser;
    public string $login;
    public string $company;
    public int $no_of_followers;
    public int $repos;
    public int $no_of_publicrepos;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * We will get the githubuser through api
     * @return string
     */
    public function getGithubuser(string $username)
    {
        $githubusercontroller = new GithubUserController();
        $githubusercontroller->setIsListExec(1);
        return $githubusercontroller->getGithubUser($username);
    }

    /**
     * @return string
     */
    public function getLogin(): string
    {
        return $this->login;
    }

    /**
     * @param string $login
     */
    public function setLogin(string $login): void
    {
        $this->login = $login;
    }

    /**
     * @return string
     */
    public function getCompany(): string
    {
        return $this->company;
    }

    /**
     * @param string $company
     */
    public function setCompany(string $company): void
    {
        $this->company = $company;
    }

    /**
     * @return int
     */
    public function getNoOfFollowers(): int
    {
        return $this->no_of_followers;
    }

    /**
     * @param int $no_of_followers
     */
    public function setNoOfFollowers(int $no_of_followers): void
    {
        $this->no_of_followers = $no_of_followers;
    }

    /**
     * @return int
     */
    public function getRepos(): int
    {
        return $this->repos;
    }

    /**
     * @param int $repos
     */
    public function setRepos(int $repos): void
    {
        $this->repos = $repos;
    }

    /**
     * @return int
     */
    public function getNoOfPublicrepos(): int
    {
        return $this->no_of_publicrepos;
    }

    /**
     * @param int $no_of_publicrepos
     */
    public function setNoOfPublicrepos(int $no_of_publicrepos): void
    {
        $this->no_of_publicrepos = $no_of_publicrepos;
    }


}
