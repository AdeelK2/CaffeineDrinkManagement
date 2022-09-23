<?php 
  class CustomerStats {
    // DB stuff
    private $conn;
    private $table = 'customer_drinks_stats';

    // Properties
    public $id;
    public $customer_name;
    public $caffeine_qty_consumed;
    public $drink_name;
    public $drink_qty;
    public $drink_caffeine_qty;
    public $drink_price;

    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

    // Get stats
    public function read() {
        // Create query
        $query = 'SELECT * FROM ' . $this->table . '
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
                                    id = ?
                                    LIMIT 0,1';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Bind ID
        $stmt->bindParam(1, $this->id);

        // Execute query
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // Set properties
        $this->customer_name = $row['customer_name'];
        $this->caffeine_qty_consumed = $row['caffeine_qty_consumed'];
        $this->drink_name = $row['drink_name'];
        $this->drink_qty = $row['drink_qty'];
        $this->drink_caffeine_qty = $row['drink_caffeine_qty'];
        $this->drink_price = $row['drink_price'];
    }

        // Create stats
    public function create() {
        // Create Query
        $query = 'INSERT INTO ' .
        $this->table . '
        SET
        customer_name = :customer_name,
        caffeine_qty_consumed = :caffeine_qty_consumed, 
        drink_name = :drink_name,
        drink_qty = :drink_qty,
        drink_caffeine_qty = :drink_caffeine_qty, 
        drink_price = :drink_price';

        // Prepare Statement
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->customer_name = htmlspecialchars(strip_tags($this->customer_name));
        $this->caffeine_qty_consumed = htmlspecialchars(strip_tags($this->caffeine_qty_consumed));
        $this->drink_name = htmlspecialchars(strip_tags($this->drink_name));
        $this->drink_qty = htmlspecialchars(strip_tags($this->drink_qty));
        $this->drink_caffeine_qty = htmlspecialchars(strip_tags($this->drink_caffeine_qty));
        $this->drink_price = htmlspecialchars(strip_tags($this->drink_price));

        // Bind data
        $stmt-> bindParam(':customer_name', $this->customer_name);
        $stmt-> bindParam(':caffeine_qty_consumed', $this->caffeine_qty_consumed);
        $stmt-> bindParam(':drink_name', $this->drink_name);
        $stmt-> bindParam(':drink_qty', $this->drink_qty);
        $stmt-> bindParam(':drink_caffeine_qty', $this->drink_caffeine_qty);
        $stmt-> bindParam(':drink_price', $this->drink_price);

        // Execute query
        if($stmt->execute()) {
            return true;
        }

        // Print error if something goes wrong
        printf("Error: $s.\n", $stmt->error);

        return false;
    }
    
        // Update stats
    public function update() {
        // Create Query
        $query = 'UPDATE ' .
        $this->table . '
        SET
        customer_name = :customer_name,
        caffeine_qty_consumed = :caffeine_qty_consumed,
        drink_name = :drink_name,
        drink_qty = :drink_qty,
        drink_caffeine_qty = :drink_caffeine_qty,
        drink_price = :drink_price
        WHERE
        id = :id';

    // Prepare Statement
    $stmt = $this->conn->prepare($query);

    // Clean data

    $this->customer_name = htmlspecialchars(strip_tags($this->customer_name));
    $this->caffeine_qty_consumed = htmlspecialchars(strip_tags($this->caffeine_qty_consumed));
    $this->drink_name = htmlspecialchars(strip_tags($this->drink_name));
    $this->drink_qty = htmlspecialchars(strip_tags($this->drink_qty));
    $this->drink_caffeine_qty = htmlspecialchars(strip_tags($this->drink_caffeine_qty));
    $this->drink_price = htmlspecialchars(strip_tags($this->drink_price));
    $this->id = htmlspecialchars(strip_tags($this->id));
    // Bind data

    $stmt-> bindParam(':customer_name', $this->customer_name);
    $stmt-> bindParam(':caffeine_qty_consumed', $this->caffeine_qty_consumed);
    $stmt-> bindParam(':drink_name', $this->drink_name);
    $stmt-> bindParam(':drink_qty', $this->drink_qty);
    $stmt-> bindParam(':drink_caffeine_qty', $this->drink_caffeine_qty);
    $stmt-> bindParam(':drink_price', $this->drink_price);
    $stmt-> bindParam(':id', $this->id);

    // Execute query
    if($stmt->execute()) {
        return true;
    }

    // Print error if something goes wrong
    printf("Error: $s.\n", $stmt->error);

    return false;
    }

      // Delete stats
  public function delete() {
    // Delete query
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