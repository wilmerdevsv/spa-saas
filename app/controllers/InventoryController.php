<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Core\Response;
use App\Services\InventoryService;

class InventoryController extends Controller
{
    public function index(array $params = []): void
    {
        $this->view('inventory/index', (new InventoryService())->index());
    }

    public function movement(array $params = []): void
    {
        (new InventoryService())->movement($_POST);
        $this->redirect('/inventory');
    }

}
