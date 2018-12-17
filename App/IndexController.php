<?php

namespace App;

/**
 * Class IndexController
 * @package App
 */
class IndexController extends Controller
{

    protected function render() :void
    {
        $news = \App\Models\Article::findAll(1);

        $this->view->news = $news;
        $this->view->display(__DIR__ . '/../templates/index.php');
    }
}