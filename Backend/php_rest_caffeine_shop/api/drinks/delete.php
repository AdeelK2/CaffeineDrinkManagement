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

  // Delete drink
  if($drink->delete()) {
    echo json_encode(
      array('message' => 'Drink deleted')
    );
  } else {
    echo json_encode(
      array('message' => 'Drink not deleted')
    );
  }
