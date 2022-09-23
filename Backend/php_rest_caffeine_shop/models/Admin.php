<?php 
  class Admin {
    // DB stuff
    private $conn;
    private $table = 'admin';

    // admin Properties
    public $id;
    public $name;
    public $email;
    public $password;
    public $confirm_password;
    public $created_at;

    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }
    
    // Get admin
    public function read_single() {
      // get query
      $query = 'SELECT * FROM ' . $this->table . ' WHERE email = :email';

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Bind ID
      $stmt->bindParam(":email", $this->email);

      // Execute query
      $stmt->execute();
      
      $row = $stmt->fetch(PDO::FETCH_ASSOC);

      // set properties
      $this->id = $row['id'];
      $this->name = $row['name'];
      $this->id = $row['email'];
      $this->password = $row['password'];
      $this->confirm_password = $row['confirm_password'];
    }
    
  }