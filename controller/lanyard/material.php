<?php
// Include required files for database connection and model manipulation
require_once '../config/database.php'; // Path to database configuration
require_once '../../models/lanyards.php'; // Path to lanyards model
require_once 'width.php';
require_once 'width.php'; // Double inclusion of the 'width.php' file. This might be an error.
require_once 'sidePrinted.php';
require_once 'noColours.php';
require_once 'typeLanyards.php';
require_once 'clips.php';
require_once 'amount.php';
require_once 'extras.php';


// Define the Material class
class Material {
    // Public function to handle incoming HTTP requests
    public function handleRequest() {
        // Check if the request method is POST
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve the raw JSON data from the request body
            $rawData = file_get_contents("php://input");
            $data = json_decode($rawData);

            // Validate the JSON data to ensure it contains an "action" field
            if ($data !== null && isset($data->action)) {
                $action = $data->action; // Extract the action from the JSON data

                // Switch case to handle different actions based on the request
                switch ($action) {
                    case "getMaterials":
                        // Handle the retrieval of materials
                        $materials = $this->getMaterials($data);

                        // Randomly select a material and set it as the session material
                        $materialSelected = $this->selectMaterial($materials);
                        $this->setSessionMaterial((object)$materialSelected);

                        // Retrieve all lanyard types
                        $lanyardTypes = new TypeLanyards();
                        $allLanyardTypes  = $lanyardTypes->getAllLanyardsType();

                        // Retrieve all widths based on the selected material
                        $width = new Width();
                        $allWidthByMaterial  = $width->getAllWidthByMaterial($_SESSION['materialSelected']);

                        // Set the first width as the session width

                        $width->setSessionWidth($allWidthByMaterial[0]['width']);


                        //$sidePrinted = new SidePrinted();


                        // Prepare response with materials, lanyard types, and widths
                        $response = array('materials' => $materials,
                                           'lanyardsType' => $allLanyardTypes,
                                           'width' => $allWidthByMaterial);

                        echo json_encode($response);
                        break;

                    case "setMaterialSelected":




                        // Handle setting the selected material and searching its attributes
                        $this->setSessionMaterial($data);
                        // Retrieve attributes of the selected material
                        $infoMaterial  = $this->getAttributesMaterial($data);


                        $lanyardTypes = new TypeLanyards();
                        $lanyardTypes ->setIdMaterial($infoMaterial["idMaterial"]);
                        $allLanyardTypes =  $lanyardTypes->getAllLanyardsTypesByIdMaterial();
              //          $lanyardTypes-> setSessionTypeLanyards($allLanyardTypes);



                        // Retrieve all widths for the selected material
                        $width = new Width();
                        $allWidth =  $width->getAllWidthByMaterial($data->optionSelected);

                        // Select the first width and set it as the session width
                        $widthSelected = $width->selectWidth($allWidth);
                        $width-> setSessionWidth($widthSelected);




                        // Retrieve all side printed options based on the selected width and material
                        $sidePrinted = new SidePrinted();
                        $allSidePrinted = $sidePrinted->getAllSidePrintedByWidth($widthSelected, $data->optionSelected);

                        // Select a side printed option and set it as the session side printed
                        $sidePrintedSelected =  $sidePrinted->selectSidePrinted($allSidePrinted);
                        $sidePrinted->setSessionSidePrinted($sidePrintedSelected);




                        // Prepare and send the response with material information
                        $response = array('material' => $infoMaterial,
                                          'allLanyardTypes' => $allLanyardTypes,
                                          'allWidth' => $allWidth,
                                          'widthSelected' => $widthSelected,
                                          'allSidePrinted' => $allSidePrinted,
                                          'sidePrintedSelected' => $sidePrintedSelected);
                        //,  'allWidth' => $allWidth
                        echo json_encode($response);
                        break;
                      case "getMaterialSelected":
                        // Handle the retrieval of the selected material
                        $materialSelected = $this->handleGetMaterialSelected($data);
                        $response = array('getMaterial' => $materialSelected);
                        break;

                    default:
                        // Respond with an error for unknown actions
                        http_response_code(400); // Bad Request
                        echo json_encode(array("message" => "Unknown action"));
                        break;
                }
            } else {
                // Respond with an error if JSON data is incomplete or missing the action field
                http_response_code(400); // Bad Request
                echo json_encode(array("message" => "Incomplete JSON data or missing action"));
            }
        } else {
            // Respond with an error if the request method is not POST
            http_response_code(405); // Method Not Allowed
            echo json_encode(array("message" => "Method not allowed"));
        }
    }

    // Private function to handle the action of setting the selected material
    private function setSessionMaterial($data) {
      // Start or resume a session
      if (session_status() === PHP_SESSION_NONE) {
        // Si no hay una sesión activa, inicia una
        session_start();
        }
        $_SESSION['materialSelected'] = $data->optionSelected; // Store the selected material option in the session

      //  echo json_encode($_SESSION['materialSelected']);
    }
    // Private function to handle the action of setting the selected material
    private function selectMaterial($materials) {
      $materialSelected  = array_rand($materials);
      $materialSelected = ($materials[$materialSelected]["material"]);
      $materialSelected =  array("optionSelected" => $materialSelected);

      return $materialSelected;
    }

    // Private function to handle the action of getting the selected material
    private function handleGetMaterialSelected() {
         // Start or resume a session
         if (session_status() === PHP_SESSION_NONE) {
           // Si no hay una sesión activa, inicia una
           session_start();
           }
        return ($_SESSION['materialSelected']) ; // Store the get material option in the session
    }

    // Private function to handle searching for attributes of the selected material
    private function getAttributesMaterial($data) {
        $connection = new Database(); // Create a new database connection

        $lanyards = new Lanyards($connection); // Instantiate the Lanyards model
        $lanyards->setMaterial($data->optionSelected); // Set the selected material in the model

        $response = $lanyards->getInfoMaterials(); // Retrieve material information

        // Store the retrieved material information
        $infoMaterial = array(
             'idMaterial' => $response['idLanyard'],
            'material' => $response['material'],
            'link' => $response['linkImg'],
            'description' => $response['description']
        );

        // Start or resume a session
        if (session_status() === PHP_SESSION_NONE) {
          // Si no hay una sesión activa, inicia una
          session_start();
          }

        $_SESSION['IdmaterialSelected'] = $response['idLanyard']; // Store the selected material ID in the session

        return $infoMaterial;
    }

    // Private function to handle the retrieval of all materials
    private function getMaterials($data){
        $connection = new Database(); // Create a new database connection

        $lanyards = new Lanyards($connection); // Instantiate the Lanyards model

        $response = $lanyards->getAllLanyardMaterials(); // Retrieve all lanyard materials

        return($response); // Send the response with all materials
    }
}

// Instantiate the Material class and handle the request
$material = new Material();
$material->handleRequest();
?>
