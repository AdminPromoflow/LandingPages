<?php

require_once '../config/database.php';
require_once '../models/users.php';

// Define the expected authentication token.
$expectedToken = "ZaPWPtiQvAjwWBFXvOzu3Cfo4PUZiQ4f"; // Replace this with your real token.

// Check if the request is a POST request.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if an authentication token is provided in the headers.
    $providedToken = $_SERVER['HTTP_AUTH_TOKEN'];

    if ($providedToken === $expectedToken) {
        // The token is valid, proceed with handling the request.
        $json_data = file_get_contents('php://input');

        // Decode the JSON to get the data.
        $data = json_decode($json_data, true); // The second argument allows decoding as an associative array.

        // Check if the "action" property is present and its value is "getAllLanyardCustomers".
        if (isset($data['action']) && $data['action'] === "getAllLanyardCustomers") {

            $connection = new Database();
            // Create a new Users instance and set user data
            $user = new Users($connection);
            // Create the user in the database
            $response = $user->getAllLanyardCustomers();

            // Encode the response as JSON.
            $json_response = json_encode($response);

            // Set the Content-Type header to indicate that the response is JSON.
            header('Content-Type: application/json');

            // Send the JSON response.
            echo $json_response;
        } else {
            // Invalid "action" property, send a response with an error.
            http_response_code(400); // Bad Request.
            echo 'The "action" property is not valid or is missing in the JSON.';
        }
    } else {
        // Invalid token, send an unauthorized error response.
        http_response_code(401); // Unauthorized.
        echo 'Invalid authentication token.';
    }
} else {
    // If a non-POST request is received, send a response indicating the method is not allowed.
    http_response_code(405); // Method Not Allowed.
    echo 'Only POST requests are allowed in this service.';
}
?>
