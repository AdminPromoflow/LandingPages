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
                        $this->handleRegistration($data);
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
    private function handleRegistration($data) {
        // Logic to process registration
       $name = $data->nameRegister;
       $email = $data->emailRegister;
       $password = $data->passwordRegister;

       $security = new Security();
       $var =  $security-> validateUserData($name, $email, $password);


       if (!!$var) {
            // Este bloque se ejecutará si $var no es igual a false
            $response = array("message" => "Registration in process").echo json_encode($response). json_encode($var);
        } else {
            $response = array("message" => "Registration no successful. User already exist");
            echo json_encode($response);
        }


      /* $user = new Users($connection);
       $user->setName($data->action);
       $user->setEmail($data->action);
       $user->setPassword($data->action);*/

        // You should implement your registration logic here and handle any errors appropriately.
      //  $response = array("message" => "Registration successful");
      //  echo json_encode($response);
    }

    // Function to handle login
    private function handleLogin() {
        // Logic to process login
        // You should implement your login logic here and handle any errors appropriately.
        $response = array("message" => "Login successful");
        echo json_encode($response);
    }
}
require_once '../config/database.php';
require_once '../config/security.php';
require_once '../models/users.php';

// Create an instance of the class and handle the request
$apiHandler = new ApiHandler();
$apiHandler->handleRequest();
?>
