<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Core\Response;
use App\Services\TherapistService;

class TherapistsController extends Controller
{
    public function index(array $params = []): void
    {
        $this->view('therapists/index', (new TherapistService())->index());
    }

    public function create(array $params = []): void
    {
        (new TherapistService())->create($_POST);
        $this->redirect('/therapists');
    }

}
