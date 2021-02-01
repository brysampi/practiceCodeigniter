<?php namespace App\Controllers;

class Pages extends BaseController
{
	public function index()
	{
        echo view('pages/Header');
        echo view('pages/navbar/Navbar');
        echo view('pages/Body');
        echo view('pages/Footer');
	}
}
