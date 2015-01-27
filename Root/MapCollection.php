<?php
/**
 * @copyright 2014 Integ S.A.
 * @license http://opensource.org/licenses/MIT The MIT License (MIT)
 * @author Javier Lorenzana <javier.lorenzana@gointegro.com>
 */

namespace GoIntegro\Raml\Root;

class MapCollection implements \Countable, \IteratorAggregate
{
    const ERROR_DUPLICATE_ITEM
        = "An item identified by \"%s\" was added twice.";

    /**
     * @var array The items from all maps merged.
     */
    private $items = [];

    /**
     * @param array $map
     * @return self
     * @todo The original map to which each item belonged is lost thus.
     */
    public function add(array $map)
    {
        foreach ($map as $key => $item) {
            if (empty($this->items[$key])) {
                $this->items[$key] = $item;
            } else {
                throw new \ErrorException(self::ERROR_DUPLICATE_ITEM);
            }
        }
    }

    /**
     * @param string $key
     * @return \stdClass|NULL
     */
    public function has($key)
    {
        return isset($this->itemss[$key]);
    }

    /**
     * @param string $key
     * @return \stdClass|NULL
     */
    public function get($key)
    {
        return isset($this->itemss[$key]) ? $this->itemss[$key] : NULL;
    }

    /**
     * @see \Countable::count
     */
    public function count()
    {
        return count($this->itemss);
    }

    /**
     * @see \IteratorAggregate::getIterator
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->itemss);
    }
}
