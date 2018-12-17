<?php

namespace App;

/**
 * Class IndexController
 * @package App
 */
class ArticleController extends Controller
{

    protected function render(): void
    {
        $article = \App\Models\Article::findById($_GET['id']);

        if ($article !== null) {
            $this->view->article = $article;

            $this->view->display(__DIR__ . '/../templates/article.php');
        } else {
            $this->view->display(__DIR__ . '/../templates/404.php');
        }
    }
}