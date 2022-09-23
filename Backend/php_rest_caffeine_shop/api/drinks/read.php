<?php 
  // Headers

  header('Content-Type: application/json');
  header("Access-Control-Max-Age: 600");    // cache for 10 minutes
  
  include_once '../../config/Database.php';
  include_once '../../models/Drinks.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate drink object
  $drink = new Drink($db);

  // Drink read query
  $result = $drink->read();
  
  // Get row count
  $num = $result->rowCount();

  // Check if any drink
  if($num > 0) {
        // drink array
        $drink_arr = array();
        $drink_arr['data'] = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
          extract($row);

          $drink_item = array(
            'id' => $id,
            'drink_name' => $drink_name,
            'drink_company_name' => $drink_company_name,
            'price' => $price,
            'drink_code' => $drink_code,
            'drink_quantity' => $drink_quantity,
            'caffeine_qty' => $caffeine_qty,
            'description' => $description,
          );

          // Push to "data"
          array_push($drink_arr['data'], $drink_item);
        }

        // Turn to JSON & output
        echo json_encode($drink_arr);

  } else {
        // No Drinks
        echo json_encode(
          array('message' => 'No Drinks Found')
        );
  }
