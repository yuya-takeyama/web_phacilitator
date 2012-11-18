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
 * DataMapper for Role.
 *
 * @author Yuya Takeyama
 */
class Yuyat_WebPhacilitator_DataMapper_RoleMapper extends phpDataMapper_Base
{
    protected $_entityClass = 'Yuyat_WebPhacilitator_Entity_Role';
 
    protected $_datasource = 'phacilitator_roles';

    public $id = array(
        'type'    => 'int',
        'primary' => true,
        'serial'  => true,
        'null'    => false,
    );

    public $name = array(
        'type'   => 'string',
        'null'   => false,
        'unique' => true,
        'length' => 32,
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
        'mapper'   => 'Yuyat_WebPhacilitator_DataMapper_UserRoleMapper',
        'where'    => array('role_id' => 'entity.id')
    );
}
