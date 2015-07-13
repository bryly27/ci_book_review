<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User');
	}

	public function index()
	{
		if($this->session->userdata('loggedIn') === TRUE)
		{
			redirect('/books');
		}
		else
		{
			$this->load->view('login');
		}
	}

	public function register()
	{
		//register function
		if($this->input->post('action') == 'register')
		{
			//load the form validation library
			$this->load->library('form_validation');


			//---------form validation---------

			$this->form_validation->set_rules('first_name', 'First Name', 'trim|required|min_length[2]');
   		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|min_length[2]');
	    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
	    $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|matches[confirm_password]');
	    $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required');


	    //running the form validator... if errors appear
	    if ($this->form_validation->run() === FALSE)
			{
				//save errors to a variable
				$errors = array(validation_errors());
				//set flashdata containing errors
      	$this->session->set_flashdata('errors', $errors);
      	//redirect to index function
				redirect('/');
			}
			else
			{
				$this->load->library('encrypt');
				//if there are no errors... set a variable to equal the post data
				$user_details = array(
					"first_name" => $this->input->post('first_name'),
					"last_name" => $this->input->post('last_name'),
					"email" => $this->input->post('email'),
					"password" => $this->encrypt->encode(md5($this->input->post('password'))),
				);
				//send the post data to the database
				$add_user = $this->User->add_user($user_details);
				//set a success flashdata message
				$success[] = 'You are now registered. ';
        $this->session->set_flashdata('success', $success);
        //redirect to the index function
				redirect('/');
			}
		}
	}
		//-----------------------login--------------------------

	public function login()
	{


		if($this->input->post('action') == 'login' && $this->input->post('email') !== null && $this->input->post('password') !== null)
		{
			//load the form validation library
			$this->load->library('form_validation');
			$this->load->library('encrypt');
			//form validation
			$this->form_validation->set_rules("email","Email","required|valid_email");
			//set variables to equal to post data
			$email = $this->input->post('email');
			$password = md5($this->input->post('password'));
			//go to database to retrieve user with the email $email
			$user = $this->User->get_user($email);
			if($user)
			{
				$password2 = $this->encrypt->decode($user['password']);
			}
			//if the $user is true and the password is equal to the variable password
			if ($user && $password2==$password) 
			{		
				//set a session to tell us the user is logged in
				$this->session->set_userdata('loggedIn', TRUE);
				$this->session->set_userdata('user', $user);
				//redirect to function home
				redirect('/users/home');
			}
			else
			{
				//if the user info is wrong send a flash message with an error message
				$this->session->set_userdata('loggedIn', FALSE);
				$errors[] = 'Please enter valid credentials';
    		$this->session->set_flashdata('errors', $errors);
				// $this->load->view('main');
				redirect('/users');
			}
		}
	}

	public function home()
	{
		if($this->session->userdata('loggedIn') === TRUE)
		{
		redirect('/books');
		}
		else
		{
			$this->session->sess_destroy();
			redirect('/');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/');
	}

	public function profile($id)
	{
		if($this->session->userdata('loggedIn') === TRUE)
		{
			$array['user'] = $this->User->get_profile($id);
			$array['reviews'] = $this->User->get_reviews($id);
			$this->load->view('profile', $array);
		}
		else 
		{
			$this->session->sess_destroy();
			redirect('/');
		}
	}





}