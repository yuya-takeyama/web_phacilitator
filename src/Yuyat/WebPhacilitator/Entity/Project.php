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
 * Entity represents Project.
 *
 * @author Yuya Takeyama
 */
class Yuyat_WebPhacilitator_Entity_Project
    extends phpDataMapper_Entity
    implements Yuyat_WebPhacilitator_InProjectRecipeFinderInterface
{
    private $rawProject;

    public function getRawProject()
    {
        if (is_null($this->rawProject)) {
            $file = "{$this->root_directory}/.phacilitator/project.php";
            $this->rawProject = include $file;
        }

        return $this->rawProject;
    }

    public function getRawRecipeIterator()
    {
        return new Yuyat_WebPhacilitator_CallbackMapIterator(
            new RecursiveIteratorIterator($this->getRawProject()),
            array($this, 'createRawRecipeWrapper')
        );
    }

    public function findRecipeByInProjectId($id)
    {
        $recipe = $this->recipes->first(array('in_project_id' => $id));
    }

    public function createRawRecipeWrapper(Yuyat_Phacilitator_RecipeInterface $recipe)
    {
        return new Yuyat_WebPhacilitator_RawRecipeWrapper($recipe, $this);
    }
}
