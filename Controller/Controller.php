<?php
class ApiHandler {
    public function handleRequest() {
        // Check if a POST request was received
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Get the action type from the JSON data
            $rawData = file_get_contents("php://input");
            $data = json_decode($rawData);

            if ($data !== null && isset($data->action)) {
                // Get the action from the JSON data
                $action = $data->action;

                // Perform actions based on the request
                switch ($action) {
                    case "register":
                        $this->handleRegistration();
                        break;

                    case "login":
                        $this->handleLogin();
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

    // Function to handle registration
    private function handleRegistration() {
        // Logic to process registration
        // You should implement your registration logic here and handle any errors appropriately.
        $response = array("message" => "Registration successful");
        echo json_encode($response);
    }

    // Function to handle login
    private function handleLogin() {
        // Logic to process login
        // You should implement your login logic here and handle any errors appropriately.
        $response = array("message" => "Login successful");
        echo json_encode($response);
    }
}

// Create an instance of the class and handle the request
$apiHandler = new ApiHandler();
$apiHandler->handleRequest();
?>
