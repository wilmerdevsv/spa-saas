<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Core\Response;
use App\Services\AdminService;

class AdminController extends Controller
{
    public function tenants(array $params = []): void { $this->view('admin/tenants', (new AdminService())->tenants()); }
    public function createTenant(array $params = []): void { (new AdminService())->createTenant($_POST); $this->redirect('/admin/tenants'); }
    public function suspendTenant(array $params = []): void { (new AdminService())->suspendTenant($_POST); $this->redirect('/admin/tenants'); }
    public function plans(array $params = []): void { $this->view('admin/plans', (new AdminService())->plans()); }
    public function createPlan(array $params = []): void { (new AdminService())->createPlan($_POST); $this->redirect('/admin/plans'); }
    public function invoices(array $params = []): void { $this->view('admin/invoices', (new AdminService())->invoices()); }
    public function generateInvoice(array $params = []): void { (new AdminService())->generateInvoice($_POST); $this->redirect('/admin/invoices'); }
}
