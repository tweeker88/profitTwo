<?php


namespace App;

/**
 * Class Controller
 * @package App
 */
abstract class Controller
{

    /**
     * @var View $view
     */
    protected $view;

    public function __invoke() :void
    {
        $this->view = new View();
        $this->render();
    }

    abstract protected function render();
}