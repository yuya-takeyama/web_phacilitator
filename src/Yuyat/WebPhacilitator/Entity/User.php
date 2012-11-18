<?php
/**
 * This file is part of WebPhacilitator.
 *
 * (c) Yuya Takeyama
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Entity represents User.
 *
 * @author Yuya Takeyama
 */
class Yuyat_WebPhacilitator_Entity_User extends phpDataMapper_Entity
{
    private $projects;

    private $roles;

    public function getProjects()
    {
        if (is_null($this->projects)) {
            $this->projects = array();

            foreach ($this->project_users as $projectUser) {
                $this->projects[] = $projectUser->project;
            }
        }

        return $this->projects;
    }

    public function getRoles()
    {
        if (is_null($this->roles)) {
            $this->roles = array();

            foreach ($this->user_roles as $userRole) {
                $this->roles[] = $userRole->role;
            }
        }

        return $this->roles;
    }
}
