<?php
class Security {

    public static function validateUserData($username, $email, $password) {
        // Check if fields are not empty
        if (empty($username) || empty($email) || empty($password)) {
            return false;
        }

        // Check email format
       if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return $email;
        }

        // Check if the username already exists in the database
        if (self::usernameExistsInDatabase($email)) {
            return false;
        }

        // Escape data before storing it in the database

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT); // Hash the password

        // If everything is fine, return the secure data
        return [
            'username' => $username,
            'email' => $email,
            'password' => $hashedPassword
        ];
    }

    private static function usernameExistsInDatabase($email) {
      $connection = new Database();
      $user = new Users($connection);
      $user->setEmail($email);
      $var = $user->checkIfUserExistsByEmail()['COUNT(*)'];

      if ($var == "0") {
        return false;
      }
      return true;
    }
}

require_once '../../models/users.php';
echo json_encode("string2");exit;

require_once '../../config/database.php';

?>
