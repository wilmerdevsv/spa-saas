<?php
namespace App\Core;
use App\Repositories\UserRepository;
class Auth {public static function attempt(string $email,string $password): bool {$u=(new UserRepository())->findByEmail($email);if(!$u||!password_verify($password,$u['password'])) return false;$_SESSION['user']=['id'=>$u['id'],'name'=>$u['name'],'role'=>$u['role'],'tenant_id'=>$u['tenant_id']];$_SESSION['tenant_id']=$u['tenant_id'];return true;} public static function user(): ?array {return $_SESSION['user']??null;} public static function check(): bool {return isset($_SESSION['user']);} public static function logout(): void {unset($_SESSION['user'],$_SESSION['tenant_id']);} public static function hasRole(string $r): bool {return (self::user()['role']??'')===$r;}}
