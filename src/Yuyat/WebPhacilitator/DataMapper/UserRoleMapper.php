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
 * DataMapper for UserRole.
 *
 * @author Yuya Takeyama
 */
class Yuyat_WebPhacilitator_DataMapper_UserRoleMapper extends phpDataMapper_Base
{
    protected $_entityClass = 'Yuyat_WebPhacilitator_Entity_UserRole';
 
    protected $_datasource = 'phacilitator_user_roles';

    public $id = array(
        'type'    => 'int',
        'primary' => true,
        'serial'  => true,
        'null'    => false,
    );

    public $user_id = array(
        'type' => 'int',
        'null' => false,
    );

    public $role_id = array(
        'type' => 'int',
        'null' => false,
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
 
    public $user = array(
        'type'     => 'relation',
        'relation' => 'HasOne',
        'mapper'   => 'Yuyat_WebPhacilitator_DataMapper_UserMapper',
        'where'    => array('id' => 'entity.user_id')
    );
}
