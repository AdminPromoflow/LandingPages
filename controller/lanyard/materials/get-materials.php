<?php
class HandlerGetMaterials {

    // Function to handle incoming requests
    public function handleRequest() {


        // Check if a POST request was received
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Get the raw JSON data from the request body
            $rawData = file_get_contents("php://input");
            $data = json_decode($rawData);

            // Check if JSON data is valid and contains an "action" field
            if ($data !== null && isset($data->action)) {
                // Get the action from the JSON data
                $action = $data->action;

                // Perform actions based on the request
                switch ($action) {
                    case "getMaterials":
                        $this->handleGetMaterials($data);
                        break;

                    default:
                        // Unknown action
                        http_response_code(400); // Bad Request
                        $response = array("message" => "Unknown action");
                        echo json_encode($response);
                        break;
                }
            } else {
                // Incomplete JSON data or missing action
                http_response_code(400); // Bad Request
                echo json_encode(array("message" => "Incomplete JSON data or missing action"));
            }
        } else {
            // The request is not a valid POST request
            http_response_code(405); // Method Not Allowed
            echo json_encode(array("message" => "Method not allowed"));
        }
    }


    // Function to handle user login
    private function handleGetMaterials($data){
      
      // Create a database connection
      $connection = new Database();

      // Create a new Users instance and set user data
      $lanyards = new Lanyards($connection);

      $response = $lanyards->getAllLanyardMaterials();

      echo json_encode($response);
    }
}

// Include required files
require_once '../../config/database.php';
require_once '../../../models/lanyards.php';

// Create an instance of the ApiHandler class and handle the request

$handlerGetMaterials = new HandlerGetMaterials();
$handlerGetMaterials->handleRequest();
?>
