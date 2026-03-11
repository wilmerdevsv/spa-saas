<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Core\Response;
use App\Services\AppointmentService;

class AppointmentsController extends Controller
{
    public function index(array $params = []): void
    {
        $this->view('appointments/index', (new AppointmentService())->index());
    }

    public function create(array $params = []): void
    {
        (new AppointmentService())->create($_POST);
        $this->redirect('/appointments');
    }

    public function update(array $params = []): void
    {
        (new AppointmentService())->update($params, $_POST);
        Response::json(['status' => 'ok']);
    }

    public function delete(array $params = []): void
    {
        (new AppointmentService())->delete($params, []);
        Response::json(['status' => 'ok']);
    }
}
