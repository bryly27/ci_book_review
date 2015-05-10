<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Book extends CI_Model {
     
    function add_review($book)
    {   
        // var_dump($book);
        if(!empty($book['book_id']))
        {
            $query = ("INSERT INTO reviews (review, rating, created_at, updated_at, user_id, book_id) VALUES (?, ?, NOW(), NOW(), ?, ?)");
            $values = (array($book['book_review'], $book['book_rating'], $book['user_id'], $book['book_id']));
            $this->db->query($query, $values);
        }
        else 
        {
            // insert author
            $query = ("INSERT INTO authors (name, created_at, updated_at) VALUES (?, NOW(), NOW())");
            $values = (array(ucwords($book['book_author'])));
            $this->db->query($query, $values);
            $author_id = mysql_insert_id();

            // insert book 
            $query2 = ("INSERT INTO books (title, created_at, updated_at, author_id) VALUES (?, NOW(), NOW(), ?)");
            $values2 = (array(ucwords($book['book_title']), $author_id));
            $this->db->query($query2, $values2);
            $book_id = mysql_insert_id();

            // insert review
            $query3 = ("INSERT INTO reviews(review, rating, created_at, updated_at, user_id, book_id) VALUES (?, ?, NOW(), NOW(), ?, ?)");
            $values3 = (array($book['book_review'], $book['book_rating'], $book['user_id'], $book_id));
            $this->db->query($query3, $values3);
        }

    }

    function get_titles($title)
    {
        return $this->db->query("SELECT books.id, authors.id as author_id, title, name FROM books LEFT JOIN authors ON books.author_id = authors.id WHERE title LIKE '%$title%'")->result_array();
    }

    function get_authors($author)
    {
        return $this->db->query("SELECT id, name FROM authors WHERE name LIKE '%$author%'")->result_array();
    }

    function get_author_by_id($id)
    {
        return $this->db->query("SELECT id, name FROM authors WHERE id = ?", $id)->row_array();
    }

    function get_recent_reviews()
    {
        return $this->db->query("SELECT books.id, books.title, authors.id as author_id, authors.name, reviews.rating, users.id as user_id, users.first_name, reviews.review, reviews.created_at FROM reviews LEFT JOIN books ON reviews.book_id = books.id LEFT JOIN users ON reviews.user_id = users.id LEFT JOIN authors ON books.author_id = authors.id ORDER BY reviews.id DESC LIMIT 3")->result_array();
    }
   


}
