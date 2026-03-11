<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Core\Response;
use App\Services\CustomerService;

class CustomersController extends Controller
{
    public function index(array $params = []): void
    {
        $this->view('customers/index', (new CustomerService())->index());
    }

    public function create(array $params = []): void
    {
        (new CustomerService())->create($_POST);
        $this->redirect('/customers');
    }

}
