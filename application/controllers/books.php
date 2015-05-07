<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Books extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User');
	}

	public function index()
	{
		if($this->session->userdata('loggedIn') == TRUE)
		{
			$this->load->view('home');
		}
		else 
		{
			$this->session->sess_destroy();
			redirect('/users');
		}
	}

	public function add()
	{
		$this->load->view('add_review');
	}






}