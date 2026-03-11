<?php
namespace App\Core;
use PDO;
class Database {private static ?self $instance=null; private PDO $pdo; private function __construct(array $c){$dsn=sprintf('mysql:host=%s;port=%s;dbname=%s;charset=%s',$c['host'],$c['port'],$c['database'],$c['charset']);$this->pdo=new PDO($dsn,$c['username'],$c['password'],[PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC]);}
public static function getInstance(array $c): self {return self::$instance??=new self($c);} public function query(string $sql,array $params=[]): \PDOStatement {$st=$this->pdo->prepare($sql);$st->execute($params);return $st;} public function pdo(): PDO {return $this->pdo;}}
