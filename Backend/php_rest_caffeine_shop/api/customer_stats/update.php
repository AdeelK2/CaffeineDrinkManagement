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

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  // Set ID to UPDATE
  $customerstats->id = $data->id;

  $customerstats->customer_name = $data->customer_name;
  $customerstats->caffeine_qty_consumed = $data->caffeine_qty_consumed;
  $customerstats->drink_name = $data->drink_name;
  $customerstats->drink_qty = $data->drink_qty;
  $customerstats->drink_caffeine_qty = $data->drink_caffeine_qty;
  $customerstats->drink_price = $data->drink_price;

  // Update customerstats
  if($customerstats->update()) {
    echo json_encode(
      array('message' => 'customerstats Updated')
    );
  } else {
    echo json_encode(
      array('message' => 'customerstats not updated')
    );
  }
