<?php
/**
 * Created by Nikolay Tuzov
 */

/**
 * @var string $content
 * @var string $pageTitle
 * */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?= \vendor\core\base\View::getMeta(); ?>

    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">

    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link href="/css/chat.css" rel="stylesheet">


    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<?php require_once("partial/_top_menu.php"); ?>

<h1>Main Layout</h1>

<div class="container">
    <?= $content ?>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="/bootstrap/js/bootstrap.min.js"></script>

<script src="https://unpkg.com/vue"></script>
<script src="https://cdn.jsdelivr.net/npm/vue-resource@1.3.4"></script>

<script src="/js/main.js"></script>

<?php foreach ($this->scripts as $script): ?>
    <?= $script . "\n"; ?>
<?php endforeach; ?>

</body>
</html>