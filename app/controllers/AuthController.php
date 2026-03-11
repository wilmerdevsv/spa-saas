<?php
namespace App\Controllers;

use App\Core\Auth;
use App\Core\Controller;

class AuthController extends Controller
{
    public function showLogin(array $params = []): void { $this->view('auth/login'); }
    public function login(array $params = []): void {
        if (Auth::attempt((string)$this->input('email'), (string)$this->input('password'))) { $this->redirect('/dashboard'); }
        $this->view('auth/login', ['error' => 'Credenciales inválidas']);
    }
    public function logout(array $params = []): void { Auth::logout(); $this->redirect('/login'); }
}
