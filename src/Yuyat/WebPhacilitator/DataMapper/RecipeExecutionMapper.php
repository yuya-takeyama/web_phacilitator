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
 * DataMapper for RecipeExecution.
 *
 * @author Yuya Takeyama
 */
class Yuyat_WebPhacilitator_DataMapper_RecipeExecutionMapper extends phpDataMapper_Base
{
    protected $_entityClass = 'Yuyat_WebPhacilitator_Entity_RecipeExecution';
 
    protected $_datasource = 'phacilitator_recipe_executions';

    public $id = array(
        'type'    => 'int',
        'primary' => true,
        'serial'  => true,
        'null'    => false,
    );

    public $user_id = array(
        'type'   => 'int',
        'null'   => false,
    );

    public $recipe_id = array(
        'type'   => 'int',
        'null'   => false,
    );

    public $description = array(
        'type' => 'text',
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

    public $completed_at = array(
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

    public $recipe = array(
        'type'     => 'relation',
        'relation' => 'HasOne',
        'mapper'   => 'Yuyat_WebPhacilitator_DataMapper_RecipeMapper',
        'where'    => array('id' => 'entity.recipe_id')
    );
}
