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
    protected $_entityClass = 'Yuyat_Phacilitator_Entity_UserRole';
 
    protected $_datasource = 'phacilitator_user_roles';

    public $id = array(
        'type'    => 'int',
        'primary' => true,
        'serial'  => true,
    );

    public $user_id = array(
        'type' => 'int',
    );

    public $role_id = array(
        'type' => 'int',
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
 
    public $user = array(
        'type'     => 'relation',
        'relation' => 'HasOne',
        'mapper'   => 'Yuyat_WebPhacilitator_DataMapper_UserMapper',
        'where'    => array('id' => 'entity.user_id')
    );
}
