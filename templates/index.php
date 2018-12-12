<?php
/**
 * @var App\View $this
 */
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Новости</title>
</head>
<body>
<?php foreach ($this->news as $article): ?>
    <article>
        <h2><?php echo $article->title; ?></h2>
        <p><?php echo $article->content; ?></p>
        <p>Автор:<?php echo $article->author->name; ?></p>
    </article>
<?php endforeach; ?>
</body>
</html>