<?php

namespace App;

/**
 * Class View
 * @package App
 */

class View implements \Countable, \ArrayAccess
{
    /**
     * @var array $data
     */
    protected $data = [];

    /**
     * @param string $name
     * @param mixed $value
     */
    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    /**
     * @param string $name
     * @return mixed|null
     */
    public function __get($name)
    {
        return $this->data[$name] ?? null;
    }

    /**
     * @param string $name
     * @return bool
     */
    public function __isset($name)
    {
        return isset($this->data[$name]);
    }

    /**
     * @param string $template
     * @return string
     */
    private function render($template)
    {
        ob_start();

        include $template;

        $out = ob_get_contents();

        ob_end_clean();

        return $out;
    }

    /**
     * @param string $template
     */
    public function display($template)
    {
        echo $this->render($template);
    }


    public function offsetExists($offset)
    {
        return isset($this->data[$offset]);
    }

    public function offsetGet($offset)
    {
        return $this->data[$offset];
    }

    public function offsetSet($offset, $value)
    {
        $this->data[$offset] = $value;
    }

    public function offsetUnset($offset)
    {
        unset($this->data[$offset]);
    }

    public function count()
    {
        return count($this->data);
    }
}
