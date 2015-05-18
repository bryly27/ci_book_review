<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Books extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User');
		$this->load->model('Book');
		if($this->session->userdata('loggedIn') === FALSE)
		{
			$this->session->sess_destroy();
			redirect('/users');
		}
	}

	public function index()
	{
		$array['recent_reviews'] = $this->Book->get_recent_reviews();
		$array['books'] = $this->Book->get_books();
		$this->load->view('home', $array);
	}

	public function add()
	{
		$this->load->view('add_review');
	}

	public function add_review()
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

	public function review($id)
	{
		$array['book'] = $this->Book->get_book($id);
		$array['reviews'] = $this->Book->get_reviews($id);
		$this->load->view('book', $array);
	}

	public function add_review_from_book($id)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('book_review', 'Review', 'trim|required|min_length[10]');
		$this->form_validation->set_rules('book_rating', 'Rating', 'trim|required');

    if ($this->form_validation->run() === FALSE)
		{
			$errors = array(validation_errors());
    	$this->session->set_flashdata('errors', $errors);
			redirect('/books/review/'.$id);
		}
		else
		{
			$this->Book->add_review($this->input->post());
			redirect('/books/review/'.$id);
		}
	}

	public function delete_review($review_id, $book_id)
	{
		$this->Book->delete_review($review_id);
		redirect('/books/review/'.$book_id);
	}

	public function author($id)
	{
		$array['authors'] = $this->Book->get_author($id);
		$this->load->view('author', $array);
	}








}