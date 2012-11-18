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
 * DataMapper for Project.
 *
 * @author Yuya Takeyama
 */
class Yuyat_WebPhacilitator_DataMapper_ProjectMapper extends phpDataMapper_Base
{
    protected $_entityClass = 'Yuyat_Phacilitator_Entity_Project';
 
    protected $_datasource = 'phacilitator_projects';

    public $id = array(
        'type'    => 'int',
        'primary' => true,
        'serial'  => true,
    );

    public $name = array(
        'type' => 'string',
    );

    public $root_directory = array(
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
 
    public $project_users = array(
        'type'     => 'relation',
        'relation' => 'HasMany',
        'mapper'   => 'Yuyat_WebPhacilitator_DataMapper_UserMapper',
        'where'    => array('project_id' => 'entity.id')
    );
}
