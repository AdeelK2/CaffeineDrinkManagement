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

  // Get ID
  $data = json_decode(file_get_contents("php://input"));

  $drink->drink_code = $data->drink_code;

  // Get post
  $drink->read_single();

  // Create array
  $drink_arr = array(
    'id' => $drink->id,
    'drink_name' => $drink->drink_name,
    'drink_company_name' => $drink->drink_company_name,
    'price' => $drink->price,
    'drink_code' => $drink->drink_code,
    'drink_quantity' => $drink-> drink_quantity,
    'caffeine_qty' => $drink->caffeine_qty,
    'description' => $drink->description
  );

  // Make JSON
  print_r(json_encode($drink_arr));