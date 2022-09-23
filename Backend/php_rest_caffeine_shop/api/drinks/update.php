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

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  // Set ID to UPDATE
  $drink->id = $data->id;

  $drink->drink_name = $data->drink_name;
  $drink->drink_company_name = $data->drink_company_name;
  $drink->price = $data->price;
  $drink->drink_code = $data->drink_code;
  $drink->drink_quantity = $data->drink_quantity;
  $drink->caffeine_qty = $data->caffeine_qty;
  $drink->description = $data->description;

  // Update drink
  if($drink->update()) {
    echo json_encode(
      array('message' => 'Drink Updated')
    );
  } else {
    echo json_encode(
      array('message' => 'Drink not updated')
    );
  }
