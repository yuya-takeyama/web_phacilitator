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
 * Interface of InProjectRecipeFinder.
 *
 * @author Yuya Takeyama
 */
interface Yuyat_WebPhacilitator_InProjectRecipeFinderInterface
{
    public function findRecipeByInProjectId($id);
}
