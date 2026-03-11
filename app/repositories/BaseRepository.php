<?php
namespace App\Repositories;
use App\Core\{Container,Tenant};
class BaseRepository {
protected string $table='';
protected function db(): \App\Core\Database {return Container::get('db');}
public function allByTenant(): array {return $this->db()->query("SELECT * FROM {$this->table} WHERE tenant_id=:tenant",['tenant'=>Tenant::currentId()])->fetchAll();}
public function create(array $data): int {$cols=array_keys($data);$sql='INSERT INTO '.$this->table.' ('.implode(',',$cols).') VALUES (:'.implode(',:',$cols).')';$this->db()->query($sql,$data);return (int)$this->db()->pdo()->lastInsertId();}
}
