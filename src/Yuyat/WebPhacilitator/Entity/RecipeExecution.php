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
 * Entity represents RecipeExecution.
 *
 * @author Yuya Takeyama
 */
class Yuyat_WebPhacilitator_Entity_RecipeExecution extends phpDataMapper_Entity
{
    public function isCompleted()
    {
        return $this->completed_at > '0000-00-00 00:00:00';
    }

    public function getStatusAsString()
    {
        return $this->isCompleted() ? 'Completed' : 'Incomplete';
    }
}
