<?php
// Include required files
require_once '../../config/database.php';
require_once '../../../models/lanyards.php';

class SetMaterialSelected {
    private $infoMaterial;

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
                    case "setMaterialSelected":
                        $this->handleSetMaterialSelected($data);
                        $this->handleSearchMaterialAttributes($data);

                        $response = array('material' => $this->infoMaterial);
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

    // Function to handle setting material selected
    private function handleSetMaterialSelected($data) {
        session_start();
        $_SESSION['materialSelected'] = $data->optionSelected;
    }

    // Function to handle searching material attributes
    private function handleSearchMaterialAttributes($data) {
        // Create a database connection
        $connection = new Database();

        // Create a new Lanyards instance and set material data
        $lanyards = new Lanyards($connection);
        $lanyards->setMaterial($data->optionSelected);

        $response = $lanyards->getInfoMaterials();

        $this->infoMaterial = array(
            'material' => $response['material'],
            'link' => $response['linkImg'],
            'description' => $response['description']
        );

        session_start();
        $_SESSION['IdmaterialSelected'] = $response['idLanyard'];
    }
}

$setMaterialSelected = new SetMaterialSelected();
$setMaterialSelected->handleRequest();
?>
