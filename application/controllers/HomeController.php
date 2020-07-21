<?php


class HomeController extends CI_Controller
{

	public function index()
	{
		$user = $this->ion_auth->user()->row();

		$this->load->view('home',['user'=>$user]);
	}
	
}
