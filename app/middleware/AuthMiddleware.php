<?php
namespace App\Middleware;
use App\Core\{Auth,Container};
class AuthMiddleware {public function handle(): bool {if(!Auth::check()){header('Location: '.Container::get('config')['app']['base_url'].'/login');return false;} return true;}}
