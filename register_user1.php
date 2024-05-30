<?php
include 'db_connection.php';

class UserRegistration {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function isUsernameTaken($username) {
        $query = "SELECT * FROM users WHERE username = :username";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function register($first_name, $last_name, $email, $username, $password, $phone_number) {
        try {
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);
            $query = "INSERT INTO users (first_name, last_name, email, username, password, phone_number) VALUES (:first_name, :last_name, :email, :username, :password, :phone_number)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':first_name', $first_name);
            $stmt->bindParam(':last_name', $last_name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $hashed_password);
            $stmt->bindParam(':phone_number', $phone_number);
            return $stmt->execute();
        } catch (PDOException $exception) {
            echo "Error: " . $exception->getMessage();
            return false;
        }
    }
}

function validateInput($first_name, $last_name, $email, $username, $password, $confirm_password, $phone_number) {
    $errors = [];

    // Check for empty fields
    if (empty($first_name) || empty($last_name) || empty($email) || empty($username) || empty($password) || empty($confirm_password) || empty($phone_number)) {
        $errors[] = "All fields are required.";
    }

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    // Validate username length
    if (strlen($username) < 5) {
        $errors[] = "Username must be at least 5 characters long.";
    }

    // Validate password strength
    if (strlen($password) < 8 || 
        !preg_match('/[A-Z]/', $password) || 
        !preg_match('/[a-z]/', $password) || 
        !preg_match('/[\W]/', $password) || 
        strpos($password, $first_name) !== false || 
        strpos($password, $last_name) !== false || 
        strpos($password, $email) !== false || 
        strpos($password, $phone_number) !== false) {
        $errors[] = "Password must be at least 8 characters long and include a combination of uppercase letters, lowercase letters, and special characters. The password cannot contain your first name, last name, email, or phone number.";
    }

    // Validate password confirmation
    if ($password !== $confirm_password) {
        $errors[] = "Passwords do not match.";
    }

    // Validate phone number
    if (!preg_match('/^(078|073)\d{7}$/', $phone_number)) {
        $errors[] = "Phone number must be exactly 10 digits and start with 078 (MTN) or 073 (Airtel).";
    }

    // Validate names (only letters allowed)
    if (!ctype_alpha($first_name) || !ctype_alpha($last_name)) {
        $errors[] = "Names can only contain letters.";
    }

    return $errors;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $phone_number = $_POST['phone_number'];

    // Validate inputs
    $errors = validateInput($first_name, $last_name, $email, $username, $password, $confirm_password, $phone_number);

    if (empty($errors)) {
        $register = new UserRegistration();
        if ($register->isUsernameTaken($username)) {
            $errors[] = "Username taken.";
        } else {
            if ($register->register($first_name, $last_name, $email, $username, $password, $phone_number)) {
                header("Location: login.php");
                exit();
            } else {
                $errors[] = "Registration failed.";
            }
        }
    }

    if (!empty($errors)) {
        $error_message = urlencode(implode(' ', $errors));
        header("Location: register_user.php?error=$error_message");
        exit();
    }
}
?>
