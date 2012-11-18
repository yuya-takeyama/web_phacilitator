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
 * Iterator maps another iterator's elements using callback.
 *
 * @author Yuya Takeyama
 */
class Yuyat_WebPhacilitator_CallbackMapIterator implements Iterator
{
    private $iterator;

    private $callback;

    public function __construct(Iterator $iterator, $callback)
    {
        if (!is_callable($callback)) {
            throw new InvalidArgumentException('Callback must be callable');
        }

        $this->iterator = $iterator;
        $this->callback = $callback;
    }

    public function rewind()
    {
        $this->iterator->rewind();
    }

    public function next()
    {
        $this->iterator->next();
    }

    public function key()
    {
        return $this->iterator->key();
    }

    public function current()
    {
        return call_user_func($this->callback, $this->iterator->current());
    }

    public function valid()
    {
        return $this->iterator->valid();
    }
}
