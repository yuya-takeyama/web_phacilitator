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
 * Wrapper of Phacilitator Recipe.
 *
 * @author Yuya Takeyama
 */
class Yuyat_WebPhacilitator_RawRecipeWrapper
{
    /**
     * @var Yuyat_Phacilitator_Recipe
     */
    private $recipe;

    /**
     * @var Yuyat_WebPhacilitator_InProjectRecipeFinderInterface
     */
    private $recipeFinder;

    /**
     * @var Yuyat_WebPhacilitator_Recipe
     */
    private $webRecipe;

    public function __construct(
        Yuyat_Phacilitator_RecipeInterface $recipe,
        Yuyat_WebPhacilitator_InProjectRecipeFinderInterface $recipeFinder
    )
    {
        $this->recipe       = $recipe;
        $this->recipeFinder = $recipeFinder;
    }

    public function __call($method, $args)
    {
        if (method_exists($this->recipe, $method)) {
            if (count($args) === 0) {
                return call_user_func(array($this->recipe, $method));
            } else {
                return call_user_func_array(array($this->recipe, $method, $args));
            }
        }

        throw new BadMethodCallException(__METHOD__ . ' is not defined');
    }

    public function isRegistered()
    {
        if (is_null($this->webRecipe)) {
            $finder = $this->recipeFinder;
            $name   = $this->recipe->getFullName();

            $recipe = $finder->findRecipeByInProjectId($name);

            if ($recipe) {
                $this->webRecipe = $recipe;
            } else {
                $this->webRecipe = false;
            }
        }

        return (bool)$recipe;
    }
}
