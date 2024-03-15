<?php
class TypeLanyards {

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
    function getAllTypeLanyardsByMaterial($MaterialSelected, $materialSelected){


     // Create a database connection
     $connection = new Database();

     // Create a new Users instance and set user data
     $typeLanyards = new TypeLanyards_Model($connection);
     /*$typeLanyards->setMaterial($MaterialSelected);
     $typeLanyards->setMaterial($materialSelected);
     $response = $typeLanyards->getAllTypeLanyardsByMaterial();
     //echo json_encode($response); exit;
     return $response;*/
   }

   function selectTypeLanyards($allTypeLanyards){
     session_start(); // Iniciar la sesión si no está iniciada aún
     //echo json_encode($allTypeLanyards); exit;
      if (isset($_SESSION['typeLanyardsSelected'])) {
        return $_SESSION['typeLanyardsSelected'];
      } else {
        $array = [];
        foreach ($allTypeLanyards as $key) {
          $array[] = $key["noSides"];
        }

        $typeLanyardsSelected = $array[0];
        return $typeLanyardsSelected;
      }


   }

   // Private function to handle the action of setting the selected material
   function setSessionTypeLanyards($typeLanyardsSelected) {
       session_start(); // Start or resume a session
       $_SESSION['typeLanyardsSelected'] = $typeLanyardsSelected; // Store the selected material option in the session
   }
   function getSessionTypeLanyards() {
       session_start(); // Start or resume a session
       return $_SESSION['$typeLanyardsSelected'] ; // Store the selected material option in the session
   }



}

// Include required files
require_once '../config/database.php';
require_once '../../models/typeLanyards.php';


$typeLanyards = new TypeLanyards();
$typeLanyards->handleRequest();
?>
