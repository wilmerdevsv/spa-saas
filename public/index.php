<?php
declare(strict_types=1);
session_start();
require_once __DIR__ . '/../vendor/autoload.php';
$app = new App\Core\App(require __DIR__ . '/../config/app.php');
$app->run();
