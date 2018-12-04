<?php
require __DIR__ . '/autoload.php';

$article = \App\Models\Article::findById((int)$_GET['id']);

echo $article[0]->title . "<br>";
echo $article[0]->content . "<br>";
