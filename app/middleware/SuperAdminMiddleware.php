<?php
namespace App\Middleware;
use App\Core\Auth;
class SuperAdminMiddleware {public function handle(): bool {if(!Auth::hasRole('superadmin')){http_response_code(403);echo 'Forbidden';return false;} return true;}}
