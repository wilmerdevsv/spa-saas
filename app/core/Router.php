<?php
namespace App\Core;
class Router {private array $routes=[]; private array $middlewares=[];
public function registerMiddleware(string $n, object $m): void {$this->middlewares[$n]=$m;}
public function get(string $u,array $a,array $m=[]): void {$this->add('GET',$u,$a,$m);} public function post(string $u,array $a,array $m=[]): void {$this->add('POST',$u,$a,$m);} public function put(string $u,array $a,array $m=[]): void {$this->add('PUT',$u,$a,$m);} public function delete(string $u,array $a,array $m=[]): void {$this->add('DELETE',$u,$a,$m);} 
private function add(string $method,string $uri,array $action,array $middleware): void {$this->routes[$method][$uri]=['action'=>$action,'middleware'=>$middleware];}
public function dispatch(string $method,string $uri): void {$path=parse_url($uri,PHP_URL_PATH)?:'/';$base=Container::get('config')['app']['base_url']??'';if($base&&str_starts_with($path,$base)){$path=substr($path,strlen($base))?:'/';}[$route,$params]=$this->match($method,$path);if(!$route){http_response_code(404);echo '404 Not Found';return;}foreach($route['middleware'] as $k){if(isset($this->middlewares[$k])&&!$this->middlewares[$k]->handle()) return;}[$c,$m]=$route['action'];(new $c())->{$m}($params);} 
private function match(string $method,string $path): array {foreach(($this->routes[$method]??[]) as $routePath=>$route){$pattern='#^'.preg_replace('/\{([a-zA-Z_][a-zA-Z0-9_]*)\}/','(?P<$1>[^/]+)',$routePath).'$#';if(preg_match($pattern,$path,$matches)===1){return[$route,array_filter($matches,'is_string',ARRAY_FILTER_USE_KEY)];}}return[null,[]];}
}
