<?php namespace App\Controllers;
  
use CodeIgniter\Controller;
  
class Dashboard extends Controller
{
    public function index()
    {
        echo view('templates/header');
        echo view('dashboard');
        echo view('templates/footer');
        $session = session();
        // echo "Welcome back, ".$session->get('email');
        
    }
}