<?php
require __DIR__ . '/autoload.php';

$article = \App\Models\Article::findById((int)$_GET['id']);

echo $article->title . "<br>";
echo $article->content . "<br>";
