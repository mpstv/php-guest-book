<?php
include $_SERVER['DOCUMENT_ROOT'] . "\Core\Application.php";

$app = new \Core\Application();

$app->registerModel(\App\Models\ReviewModel::class);

$app->run();
