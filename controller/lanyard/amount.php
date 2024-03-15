<?php
class Amount {

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
                    case "setTypeLanyardSelected":


                        break;

                    default:
                        // Unknown action
                      //  http_response_code(400); // Bad Request
                      //  $response = array("message" => "Unknown action");
                        //echo json_encode($response);
                        break;
                }
            } else {
                // Incomplete JSON data or missing action
                http_response_code(400); // Bad Request
                echo json_encode(array("message" => "Incomplete JSON data or missing action"));
            }
        } else {
            // The request is not a valid POST request
          //  http_response_code(405); // Method Not Allowed
          //  echo json_encode(array("message" => "Method not allowed"));
        }
    }
    function getAllAmountByMaterial($MaterialSelected, $materialSelected){


     // Create a database connection
     $connection = new Database();

     // Create a new Users instance and set user data
     $amount = new Amount_Model($connection);
     /*$amount->setMaterial($MaterialSelected);
     $amount->setMaterial($materialSelected);
     $response = $amount->getAllAmountByMaterial();
     //echo json_encode($response); exit;
     return $response;*/
   }

   function selectAmount($allAmount){
     session_start(); // Iniciar la sesión si no está iniciada aún
     //echo json_encode($allAmount); exit;
      if (isset($_SESSION['amountSelected'])) {
        return $_SESSION['amountSelected'];
      } else {
        $array = [];
        foreach ($allAmount as $key) {
          $array[] = $key["noSides"];
        }

        $amountSelected = $array[0];
        return $amountSelected;
      }


   }

   // Private function to handle the action of setting the selected material
   function setSessionAmount($amountSelected) {
       session_start(); // Start or resume a session
       $_SESSION['amountSelected'] = $amountSelected; // Store the selected material option in the session
   }
   function getSessionAmount() {
       session_start(); // Start or resume a session
       return $_SESSION['$amountSelected'] ; // Store the selected material option in the session
   }



}

// Include required files
require_once '../config/database.php';
require_once '../../models/amount.php';


$amount = new Amount();
$amount->handleRequest();
?>
