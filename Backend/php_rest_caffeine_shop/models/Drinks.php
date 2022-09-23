<?php 
  class Drink {
    // DB stuff
    private $conn;
    private $table = 'drinks';

    // drink Properties
    public $id;
    public $drink_name;
    public $drink_company_name;
    public $price;
    public $drink_code;
    public $drink_quantity;
    public $caffeine_qty;
    public $description;

    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

    // Get drinks
    public function read() {
        // Create query
        $query = 'SELECT
        *
        FROM
        ' . $this->table . '
        ORDER BY
        created_at DESC';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Execute query
        $stmt->execute();

        return $stmt;
    }
    
    // Get Single Drink
    public function read_single() {
        // Create query
        $query = 'SELECT * FROM ' . $this->table . '
                                  WHERE
                                  drink_code = ?
                                  LIMIT 0,1';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Bind ID
        $stmt->bindParam(1, $this->drink_code);

        // Execute query
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // Set properties
        $this->drink_name = $row['drink_name'];
        $this->drink_company_name = $row['drink_company_name'];
        $this->price = $row['price'];
        $this->drink_code = $row['drink_code'];
        $this->drink_quantity = $row['drink_quantity'];
        $this->caffeine_qty = $row['caffeine_qty'];
        $this->description = $row['description'];
    }
        // Create drink
    public function create() {
        // Create Query
        $query = 'INSERT INTO ' .
        $this->table . '
        SET
        drink_name = :drink_name,
        drink_company_name = :drink_company_name, 
        price = :price,
        drink_code = :drink_code,
        drink_quantity = :drink_quantity,
        caffeine_qty = :caffeine_qty,
        description = :description';

        // Prepare Statement
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->drink_name = htmlspecialchars(strip_tags($this->drink_name));
        $this->drink_company_name = htmlspecialchars(strip_tags($this->drink_company_name));
        $this->price = htmlspecialchars(strip_tags($this->price));
        $this->drink_code = htmlspecialchars(strip_tags($this->drink_code));
        $this->drink_quantity = htmlspecialchars(strip_tags($this->drink_quantity));
        $this->caffeine_qty = htmlspecialchars(strip_tags($this->caffeine_qty));
        $this->description = htmlspecialchars(strip_tags($this->description));

        // Bind data
        $stmt-> bindParam(':drink_name', $this->drink_name);
        $stmt-> bindParam(':drink_company_name', $this->drink_company_name);
        $stmt-> bindParam(':price', $this->price);
        $stmt-> bindParam(':drink_code', $this->drink_code);
        $stmt-> bindParam(':drink_quantity', $this->drink_quantity);
        $stmt-> bindParam(':caffeine_qty', $this->caffeine_qty);
        $stmt-> bindParam(':description', $this->description);

        // Execute query
        if($stmt->execute()) {
            return true;
        }

        // Print error if something goes wrong
        printf("Error: $s.\n", $stmt->error);

        return false;
    }
    
        // Update drink
    public function update() {
        // Create Query
        $query = 'UPDATE ' .
        $this->table . '
        SET
        drink_name = :drink_name,
        drink_company_name = :drink_company_name,
        price = :price,
        drink_code = :drink_code,
        drink_quantity = :drink_quantity,
        caffeine_qty = :caffeine_qty,
        description = :description
        WHERE
        id = :id';

    // Prepare Statement
    $stmt = $this->conn->prepare($query);

    // Clean data

    $this->drink_name = htmlspecialchars(strip_tags($this->drink_name));
    $this->drink_company_name = htmlspecialchars(strip_tags($this->drink_company_name));
    $this->price = htmlspecialchars(strip_tags($this->price));
    $this->drink_code = htmlspecialchars(strip_tags($this->drink_code));
    $this->drink_quantity = htmlspecialchars(strip_tags($this->drink_quantity));
    $this->caffeine_qty = htmlspecialchars(strip_tags($this->caffeine_qty));
    $this->description = htmlspecialchars(strip_tags($this->description));
    $this->id = htmlspecialchars(strip_tags($this->id));
    // Bind data

    $stmt-> bindParam(':drink_name', $this->drink_name);
    $stmt-> bindParam(':drink_company_name', $this->drink_company_name);
    $stmt-> bindParam(':price', $this->price);
    $stmt-> bindParam(':drink_code', $this->drink_code);
    $stmt-> bindParam(':drink_quantity', $this->drink_quantity);
    $stmt-> bindParam(':caffeine_qty', $this->caffeine_qty);
    $stmt-> bindParam(':description', $this->description);
    $stmt-> bindParam(':id', $this->id);
    // Execute query
    if($stmt->execute()) {
        return true;
    }

    // Print error if something goes wrong
    printf("Error: $s.\n", $stmt->error);

    return false;
    }

      // Delete drink
  public function delete() {
    // Create query
    $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';

    // Prepare Statement
    $stmt = $this->conn->prepare($query);

    // clean data
    $this->id = htmlspecialchars(strip_tags($this->id));

    // Bind Data
    $stmt-> bindParam(':id', $this->id);

    // Execute query
    if($stmt->execute()) {
      return true;
    }

    // Print error if something goes wrong
    printf("Error: $s.\n", $stmt->error);

    return false;
    }
  }