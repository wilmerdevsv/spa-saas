<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Core\Response;
use App\Services\ServiceCatalogService;

class ServicesController extends Controller
{
    public function index(array $params = []): void
    {
        $this->view('services/index', (new ServiceCatalogService())->index());
    }

    public function create(array $params = []): void
    {
        (new ServiceCatalogService())->create($_POST);
        $this->redirect('/services');
    }

}
