<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require __DIR__ . '/autoload.php';

$news = \App\Models\Article::findAll(1);

$article = \App\Models\Article::findById(130);

//$article1 = new \App\Models\Article();
//
//$article1->title = 'test';
//$article1->content = 'test';
//$article1->insert();

foreach ($news as $article){
    echo '<a href=\'article.php?id=' . $article->id . '\'>' . $article->title .'</a><br>';
}

