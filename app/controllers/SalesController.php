<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Core\Response;
use App\Services\SalesService;

class SalesController extends Controller
{
    public function index(array $params = []): void
    {
        $this->view('sales/index', (new SalesService())->index());
    }

    public function create(array $params = []): void
    {
        (new SalesService())->create($_POST);
        $this->redirect('/sales');
    }

}
