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

  // Get ID
  $customerstats->id = isset($_GET['id']) ? $_GET['id'] : die();

  // Get customerstat
  $customerstats->read_single();

  // Create array
  $customerstats_arr = array(
    'id' => $customerstats->id,
    'customer_name' => $customerstats->customer_name,
    'caffeine_qty_consumed' => $customerstats->caffeine_qty_consumed,
    'drink_name' => $customerstats->drink_name,
    'drink_qty' => $customerstats->drink_qty,
    'drink_caffeine_qty' => $customerstats->drink_caffeine_qty,
    'drink_price' => $customerstats->drink_price
  );

  // Make JSON
  print_r(json_encode($customerstats_arr));