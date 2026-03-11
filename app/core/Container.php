<?php
namespace App\Core;
class Container {private static array $items=[]; public static function set(string $k,mixed $v): void {self::$items[$k]=$v;} public static function get(string $k): mixed {return self::$items[$k]??null;}}
