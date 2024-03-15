<?php
class NoColours {

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
    function getAllNoColoursBySidePrinted($SidePrintedSelected, $materialSelected){


     // Create a database connection
     $connection = new Database();

     // Create a new Users instance and set user data
     $noColours = new NoColours_Model($connection);
     /*$noColours->setSidePrinted($SidePrintedSelected);
     $noColours->setMaterial($materialSelected);
     $response = $noColours->getAllNoColoursBySidePrinted();
     //echo json_encode($response); exit;
     return $response;*/
   }

   function selectNoColours($allNoColours){
     session_start(); // Iniciar la sesión si no está iniciada aún
     //echo json_encode($allNoColours); exit;
      if (isset($_SESSION['noColoursSelected'])) {
        return $_SESSION['noColoursSelected'];
      } else {
        $array = [];
        foreach ($allNoColours as $key) {
          $array[] = $key["noSides"];
        }

        $noColoursSelected = $array[0];
        return $noColoursSelected;
      }


   }

   // Private function to handle the action of setting the selected material
   function setSessionNoColours($noColoursSelected) {
       session_start(); // Start or resume a session
       $_SESSION['noColoursSelected'] = $noColoursSelected; // Store the selected material option in the session
   }
   function getSessionNoColours() {
       session_start(); // Start or resume a session
       return $_SESSION['$noColoursSelected'] ; // Store the selected material option in the session
   }



}

// Include required files
require_once '../config/database.php';
require_once '../../models/noColours.php';


$noColours = new NoColours();
$noColours->handleRequest();
?>
