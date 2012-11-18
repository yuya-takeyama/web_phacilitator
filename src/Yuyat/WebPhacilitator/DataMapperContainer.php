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
 * Container for DataMappers.
 *
 * @author Yuya Takeyama
 */
class Yuyat_WebPhacilitator_DataMapperContainer implements ArrayAccess
{
    private $adapter;

    private $mappers = array();

    public function __construct($adapter)
    {
        $this->adapter = $adapter;
    }

    public function offsetSet($key, $value)
    {
        throw new BadMethodCallException('Invalid operation');
    }

    public function offsetGet($key)
    {
        if (empty($this->mappers[$key])) {
            $klass = "Yuyat_WebPhacilitator_DataMapper_{$key}Mapper";
            $this->mappers[$key] = new $klass($this->adapter);
        }

        return $this->mappers[$key];
    }

    public function offsetExists($key)
    {
        $mapper = $this[$key];

        return isset($mapper);
    }

    public function offsetUnset($key)
    {
        throw new BadMethodCallException('Invalid operation');
    }
}
