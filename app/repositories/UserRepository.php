<?php
namespace App\Repositories;
class UserRepository extends BaseRepository {protected string $table='users'; public function findByEmail(string $email): ?array {$row=$this->db()->query('SELECT * FROM users WHERE email=:email LIMIT 1',['email'=>$email])->fetch(); return $row?:null;}}
