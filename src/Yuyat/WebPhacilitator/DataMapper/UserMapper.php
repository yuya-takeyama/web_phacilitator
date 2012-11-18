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
 * DataMapper for User.
 *
 * @author Yuya Takeyama
 */
class Yuyat_WebPhacilitator_DataMapper_UserMapper extends phpDataMapper_Base
{
    protected $_entityClass = 'Yuyat_WebPhacilitator_Entity_User';
 
    protected $_datasource = 'phacilitator_users';

    public $id = array(
        'type'    => 'int',
        'primary' => true,
        'serial'  => true,
        'null'    => false,
    );

    public $screen_name = array(
        'type'   => 'string',
        'null'   => false,
        'unique' => true,
        'length' => 20,
    );

    public $facebook_access_token = array(
        'type'   => 'string',
        'unique' => true,
    );

    public $is_root = array(
        'type'    => 'bool',
        'default' => 0,
        'null'    => false,
    );

    public $created_at = array(
        'type'    => 'datetime',
        'default' => '0000-00-00 00:00:00',
        'null'    => false,
    );

    public $updated_at = array(
        'type'    => 'datetime',
        'default' => '0000-00-00 00:00:00',
        'null'    => false,
    );

    public $deleted_at = array(
        'type'    => 'datetime',
        'default' => '0000-00-00 00:00:00',
        'null'    => false,
    );
 
    public $user_roles = array(
        'type'     => 'relation',
        'relation' => 'HasMany',
        'mapper'   => 'Yuyat_WebPhacilitator_DataMapper_RoleMapper',
        'where'    => array('invoice_id' => 'entity.id')
    );
}
