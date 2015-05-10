<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Books extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User');
		$this->load->model('Book');
	}

	public function index()
	{
		if($this->session->userdata('loggedIn') == TRUE)
		{
			$array['recent_reviews'] = $this->Book->get_recent_reviews();
			$this->load->view('home', $array);
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

	public function add_review()
	{
		if($this->session->userdata('loggedIn') == TRUE)
		{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('book_title', 'Title', 'trim|required|min_length[1]');
			$this->form_validation->set_rules('book_author', 'Author', 'trim|required|min_length[2]');
			$this->form_validation->set_rules('book_review', 'Review', 'trim|required|min_length[10]');
			$this->form_validation->set_rules('book_rating', 'Rating', 'trim|required');

	    if ($this->form_validation->run() === FALSE)
			{
				$errors = array(validation_errors());
      	$this->session->set_flashdata('errors', $errors);
				redirect('/books/add');
			}
			else
			{
				$this->Book->add_review($this->input->post());
				redirect('/');
			}

		}
		else
		{
			$this->session->sess_destroy();
			redirect('/users');
		}
	}

	public function get_titles($title)
	{
		$array['titles'] = $this->Book->get_titles($title);
		$this->load->view('partials/book_titles.php', $array);
	}

	public function get_authors($author)
	{
		$array['authors'] = $this->Book->get_authors($author);
		$this->load->view('partials/book_authors.php', $array);
	}

	public function get_author_by_id($id)
	{
		$array['author'] = $this->Book->get_author_by_id($id);
		$this->load->view('partials/book_author.php', $array);
	}






}