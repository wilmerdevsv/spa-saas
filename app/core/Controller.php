<?php
namespace App\Core;
class Controller {protected function view(string $tpl,array $data=[]): void {View::render($tpl,$data);} protected function input(string $k,mixed $d=null): mixed {return $_POST[$k]??$_GET[$k]??$d;} protected function redirect(string $path): void {header('Location: '.(Container::get('config')['app']['base_url']??'').$path); exit;}}
