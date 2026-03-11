<?php
namespace App\Middleware;
use App\Core\Auth;
class AdminMiddleware {public function handle(): bool {if(!in_array(Auth::user()['role']??'', ['admin','superadmin'], true)){http_response_code(403);echo 'Forbidden';return false;} return true;}}
