<?php
namespace App\Services;
use App\Repositories\{AppointmentRepository,SaleRepository,ServiceRepository,TherapistRepository};
class DashboardService {public function summary(): array {return ['appointments'=>(new AppointmentRepository())->todayByTenant(),'todayRevenue'=>0,'topServices'=>(new ServiceRepository())->allByTenant(),'topTherapists'=>(new TherapistRepository())->allByTenant(),'monthlyRevenue'=>[1200,1800,2100,2600,3000,2800]];}}
