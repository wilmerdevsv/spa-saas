<?php
namespace App\Core;
use App\Middleware\{AuthMiddleware,AdminMiddleware,SuperAdminMiddleware};
class App {
 public function __construct(private array $config){date_default_timezone_set($config['app']['timezone']);Container::set('config',$config);Container::set('db',Database::getInstance($config['db']));}
 public function run(): void {$router=new Router();$router->registerMiddleware('auth',new AuthMiddleware());$router->registerMiddleware('admin',new AdminMiddleware());$router->registerMiddleware('superadmin',new SuperAdminMiddleware());$routes=require __DIR__.'/../../routes/web.php';$routes($router);$router->dispatch($_SERVER['REQUEST_METHOD']??'GET',$_SERVER['REQUEST_URI']??'/');}
}
