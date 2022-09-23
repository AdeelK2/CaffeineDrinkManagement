<?php 
  // Headers
  header('Content-Type: application/json');
  header("Access-Control-Max-Age: 600");    // cache for 10 minutes
  
  include_once '../../config/Database.php';
  include_once '../../models/CustomerStats.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate customerstats object
  $customerstats = new CustomerStats($db);

  // customerstats read query
  $result = $customerstats->read();
  
  // Get row count
  $num = $result->rowCount();

  // Check if any customerstat found
  if($num > 0) {
        // drink array
        $customerstats_arr = array();
        $customerstats_arr['data'] = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
          extract($row);

          $customerstats_item = array(
            'id' => $id,
            'customer_name' => $customer_name,
            'caffeine_qty_consumed' => $caffeine_qty_consumed,
            'drink_name' => $drink_name,
            'drink_qty' => $drink_qty,
            'drink_caffeine_qty' => $drink_caffeine_qty,
            'drink_price' => $drink_price,
          );

          // Push to "data"
          array_push($customerstats_arr['data'], $customerstats_item);
        }

        // Turn to JSON & output
        echo json_encode($customerstats_arr);

  } else {
        // No customerstats 
        echo json_encode(
          array('message' => 'No customerstats Found')
        );
  }
