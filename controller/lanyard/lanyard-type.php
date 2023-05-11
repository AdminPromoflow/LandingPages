<?php
class LanyardType {
  private $infoLanyardType;

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
                        $this->handleSetLanyardTypesSelected($data);
                        $this->handleSearchLanyardTypesAttributes($data);

                        $response = array('lanyardType' => $this->infoLanyardType);

                        echo json_encode($response);

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
    private function handleSetLanyardTypesSelected($data){
      session_start();
      if (!isset($_SESSION['LanyardTypeSelected'])) {
        $_SESSION['LanyardTypeSelected'] = 'one-end';
      }
      else {
        $_SESSION['LanyardTypeSelected'] = $data->optionSelected;
      }

      //  echo json_encode($_SESSION['LanyardTypeSelected']);exit;

    }

    private function handleSearchLanyardTypesAttributes($data){
      // Create a database connection
      $connection = new Database();

      // Create a new Users instance and set user data
      $lanyardsTypes = new LanyardTypes($connection);


      session_start();

      $lanyardsTypes->setIdMaterial($_SESSION['IdmaterialSelected']);

     $lanyardsTypes->setLanyardType($_SESSION['LanyardTypeSelected']);

      $response = $lanyardsTypes->getInfoLanyardTypeByIdMaterial();


      $this->infoLanyardType = array('price' => $response['price'] ,
                                     'type' => $response['type']);

      return json_encode($this->infoLanyardType);
    }
    private function getAllLanyardsType(){
      // Create a database connection
      $connection = new Database();

      // Create a new Users instance and set user data
      $lanyardsTypes = new LanyardTypes($connection);


      session_start();

      $response = $lanyardsTypes->getAllLanyardsType();


      return ($response);
    }
}

// Include required files
require_once '../config/database.php';
require_once '../../models/lanyards.php';
require_once '../../models/lanyard-types.php';


$lanyardType = new LanyardType();
$lanyardType->handleRequest();
?>
