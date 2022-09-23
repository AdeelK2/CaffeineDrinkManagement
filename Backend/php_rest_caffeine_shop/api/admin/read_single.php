<?php 
  // Headers
 
  header('Content-Type: application/json');
  header("Access-Control-Max-Age: 600");    // cache for 10 minutes

  include_once '../../config/Database.php';
  include_once '../../models/Admin.php';
 
  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate admin object
  $admin = new Admin($db);

  // Get ID
  $data = json_decode(file_get_contents("php://input"));
  
  $admin->email = $data->email;
  // Get admin
  $admin->read_single();

  // Create array
  $admin_arr = array(
    'id' => $admin->id,
    'name' => $admin->name,
    'email' => $admin->email,
    'password' => $admin->password,
    'confirm_password' => $admin->confirm_password
  );
  
  // Make JSON
  print_r(json_encode(['data'=>$admin_arr]));