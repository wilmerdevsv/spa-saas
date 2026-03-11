<?php
namespace App\Repositories;
class AppointmentRepository extends BaseRepository {protected string $table='appointments';  public function todayByTenant(): array {return $this->db()->query('SELECT * FROM appointments WHERE tenant_id=:tenant AND DATE(start_time)=CURDATE()',['tenant'=>\App\Core\Tenant::currentId()])->fetchAll();}}
