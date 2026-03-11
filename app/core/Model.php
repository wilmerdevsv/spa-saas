<?php
namespace App\Core;
abstract class Model {public function db(): Database {return Container::get('db');}}
