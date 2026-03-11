<?php
namespace App\Core;
class Tenant {public static function currentId(): int {return (int)($_SESSION['tenant_id']??0);} }
