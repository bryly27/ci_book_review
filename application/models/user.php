<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Model {
     
    function get_user($email)
    {
        return $this->db->query("SELECT * FROM users WHERE email = ?", $email)->row_array();
    }

    function add_user($user)
    {
        $query = "INSERT INTO users (first_name, last_name, email, password, created_at, updated_at) VALUES (?,?,?,?, NOW(), NOW())";
        $values = array(ucwords($user['first_name']), ucwords($user['last_name']), strtolower($user['email']), $user['password']); 
        return $this->db->query($query, $values);
    }

    function get_profile($id)
    {
        return $this->db->query("SELECT first_name, last_name, email, created_at FROM users WHERE id = ?", $id)->row_array();
    }

    function get_reviews($id)
    {
        return $this->db->query("SELECT books.id, books.title, reviews.rating, reviews.created_at FROM reviews LEFT JOIN users ON reviews.user_id = users.id LEFT JOIN books ON reviews.book_id = books.id WHERE users.id = ? ORDER BY reviews.created_at DESC", $id)->result_array();
    }   



}
