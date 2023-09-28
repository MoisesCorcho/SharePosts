<?php 

class User {

    private $db;

    public function __construct()
    {
        $this->db = new Database();    
    }

    public function verifyEmailExists($email)
    {   
        $sql = 'SELECT * FROM users WHERE email = :email';
        
        $this->db->query($sql);
        // Bind value
        $this->db->bind('email', $email);
        $this->db->execute();

        if ($this->db->rowCount() > 0) {
            return true;
        } 

        return false;
    }

    public function registerUser($data)
    {
        $sql = "INSERT INTO users(name, email, password) VALUES(:name, :email, :password)";

        $this->db->query($sql);
        // Bind Values
        $this->db->bind('name', $data['name']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('password', $data['password']);

        // Execute the prepared statement
        if ($this->db->execute()) {
            return true;
        }
        // If something goes wrong
        return false;
    }

    public function login($email, $password) 
    {
        $sql = "SELECT * FROM users WHERE email = :email";
        $this->db->query($sql);
        $this->db->bind('email', $email);
        $row = $this->db->single();

        // We get hadhed password from database
        $hashed_password = $row->password;

        if (password_verify($password, $hashed_password)) {
            return $row;
        } else {
            return false;
        }

    }

    public function getUser($id)
    {   
        $sql = 'SELECT * FROM users WHERE id = :id';
        
        $this->db->query($sql);
        // Bind value
        $this->db->bind('id', $id);
        // Get one value
        $result = $this->db->single();

        return $result;
    }

}