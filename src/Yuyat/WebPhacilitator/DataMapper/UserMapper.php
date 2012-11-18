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
    protected $_entityClass = 'Yuyat_Phacilitator_Entity_User';
 
    protected $_datasource = 'phacilitator_users';

    public $id = array(
        'type'    => 'int',
        'primary' => true,
        'serial'  => true,
    );

    public $screen_name = array(
        'type' => 'string',
    );

    public $facebook_access_token = array(
        'type' => 'string',
    );

    public $created_at = array(
        'type'    => 'datetime',
        'default' => '0000-00-00 00:00:00',
    );

    public $updated_at = array(
        'type'    => 'datetime',
        'default' => '0000-00-00 00:00:00',
    );

    public $deleted_at = array(
        'type'    => 'datetime',
        'default' => '0000-00-00 00:00:00',
    );
 
    public $user_roles = array(
        'type'     => 'relation',
        'relation' => 'HasMany',
        'mapper'   => 'Yuyat_WebPhacilitator_DataMapper_RoleMapper',
        'where'    => array('invoice_id' => 'entity.id')
    );
}
