<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Core\Response;
use App\Services\PaymentService;

class PaymentsController extends Controller
{
    public function index(array $params = []): void
    {
        $this->view('payments/index', (new PaymentService())->index());
    }

    public function create(array $params = []): void
    {
        (new PaymentService())->create($_POST);
        $this->redirect('/payments');
    }

}
