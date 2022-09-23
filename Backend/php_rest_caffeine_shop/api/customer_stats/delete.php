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

  // Delete drink
  if($customerstats->delete()) {
    echo json_encode(
      array('message' => 'customerstats data deleted')
    );
  } else {
    echo json_encode(
      array('message' => 'customerstats data not deleted')
    );
  }
