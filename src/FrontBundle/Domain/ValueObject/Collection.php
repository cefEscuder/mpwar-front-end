<?php

namespace FrontBundle\Domain\ValueObject;

use ArrayAccess;
use InvalidArgumentException;
use Mockery\Exception;

abstract class Collection implements ArrayAccess
{
    private $items = [];

    public function add($obj, $key = null)
    {
        $this->validateType($obj, $this->typeOfCollection());

        if ($key == null) {
            $this->items[] = $obj;
        } else {
            if (isset($this->items[$key])) {
                throw new Exception("Key $key already in use.");
            } else {
                $this->items[$key] = $obj;
            }
        }
    }

    private function validateType($item, $type)
    {
        if (!$item instanceof $type) {
            throw new InvalidArgumentException(
                sprintf(
                    'Type of argument expected : %s',
                    $type
                )
            );
        }
    }

    /**
     * @return string Type of Objects inside collection FQN
     */
    abstract protected function typeOfCollection(): string;

    public function delete($key)
    {
        if (isset($this->items[$key])) {
            unset($this->items[$key]);
        } else {
            throw new Exception("Invalid key $key.");
        }
    }

    public function get($key)
    {
        if (isset($this->items[$key])) {
            return $this->items[$key];
        } else {
            throw new Exception("Invalid key $key.");
        }

    }

    public function count()
    {
        return count($this->items);
    }

    public function offsetExists($offset)
    {
        return isset($this->items[$offset]);
    }

    public function offsetGet($offset)
    {
        return $this->items[$offset];
    }

    public function offsetSet($offset, $value)
    {
        return;
    }

    public function offsetUnset($offset)
    {
        return;
    }

    public function getArray()
    {
        return $this->items;
    }
}