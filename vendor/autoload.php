<?php
declare(strict_types=1);
spl_autoload_register(static function(string $class): void {
 $prefix='App\\'; $base=__DIR__ . '/../app/';
 if (strncmp($prefix,$class,strlen($prefix))!==0) return;
 $file=$base . str_replace('\\','/',substr($class,strlen($prefix))) . '.php';
 if (is_file($file)) require_once $file;
});
