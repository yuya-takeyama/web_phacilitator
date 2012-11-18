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
 * Wrapper class for session.
 *
 * @author Yuya Takeyama
 */
class Yuyat_WebPhacilitator_Session implements ArrayAccess
{
    /**
     * @var Yuyat_WebPhacilitator_DataMapperContainer
     */
    private $dataMapperContainer;

    private $user;

    public function __construct($params = array())
    {
        if (isset($params['data_mapper_container'])) {
            $this->dataMapperContainer = $params['data_mapper_container'];
        }
    }

    public function offsetSet($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public function offsetGet($key)
    {
        return $_SESSION[$key];
    }

    public function offsetExists($key)
    {
        return isset($_SESSION[$key]);
    }

    public function offsetUnset($key)
    {
        unset($_SESSION[$key]);
    }

    public function getUser()
    {
        if (is_null($this->user)) {
            if (isset($_SESSION['user_id'])) {
                $id   = $_SESSION['user_id'];
                $user = $this->dataMapperContainer['User']->get($id);

                $this->user = $user ? $user : false;
            } else {
                $this->user = false;
            }
        }

        return $this->user === false ? null : $this->user;
    }

    public function isLoggedIn()
    {
        return is_null($this->getUser()) === false;
    }
}
