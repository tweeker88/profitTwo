<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require __DIR__ . '/autoload.php';

$news = \App\Models\Article::findAll(1);

foreach ($news as $article){
    echo '<a href=\'article.php?id=' . $article->id . '\'>' . $article->title .'</a><br>';
}

