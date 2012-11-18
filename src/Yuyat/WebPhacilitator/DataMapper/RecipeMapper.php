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
 * DataMapper for Recipe.
 *
 * @author Yuya Takeyama
 */
class Yuyat_WebPhacilitator_DataMapper_RecipeMapper extends phpDataMapper_Base
{
    protected $_entityClass = 'Yuyat_WebPhacilitator_Entity_Recipe';
 
    protected $_datasource = 'phacilitator_recipes';

    public $id = array(
        'type'    => 'int',
        'primary' => true,
        'serial'  => true,
        'null'    => false,
    );

    public $name = array(
        'type' => 'string',
        'null' => false,
    );

    public $project_id = array(
        'type' => 'int',
        'null' => false,
    );

    public $in_project_id = array(
        'type' => 'string',
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
 
    public $project = array(
        'type'     => 'relation',
        'relation' => 'HasOne',
        'mapper'   => 'Yuyat_WebPhacilitator_DataMapper_ProjectMapper',
        'where'    => array('id' => 'entity.project_id')
    );

    public $recipe_roles = array(
        'type'     => 'relation',
        'relation' => 'HasMany',
        'mapper'   => 'Yuyat_WebPhacilitator_DataMapper_RecipeRoleMapper',
        'where'    => array('recipe_id' => 'entity.id')
    );
}
