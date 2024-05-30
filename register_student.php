<?php
include 'db_connection.php';

class Student {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function register($first_name, $last_name, $phone_number, $email, $gender, $age, $province, $departments, $level, $district, $college, $picture, $comments) {
        try {
            $query = "INSERT INTO students (first_name, last_name, phone_number, email, gender, age, province, departments, level, district, college, picture, comments) 
                      VALUES (:first_name, :last_name, :phone_number, :email, :gender, :age, :province, :departments, :level, :district, :college, :picture, :comments)";
            
            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(':first_name', $first_name);
            $stmt->bindParam(':last_name', $last_name);
            $stmt->bindParam(':phone_number', $phone_number);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':gender', $gender);
            $stmt->bindParam(':age', $age);
            $stmt->bindParam(':province', $province);
            $stmt->bindParam(':departments', $departments);
            $stmt->bindParam(':level', $level);
            $stmt->bindParam(':district', $district);
            $stmt->bindParam(':college', $college);
            $stmt->bindParam(':picture', $picture);
            $stmt->bindParam(':comments', $comments);

            if ($stmt->execute()) {
                echo "<script>alert('Student registered successfully!'); window.location.href='students.php';</script>";
            } else {
                echo "Failed to register student.";
            }
        } catch (PDOException $exception) {
            echo "Error: " . $exception->getMessage();
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $phone_number = $_POST['phone_number'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $province = $_POST['province'];
    $departments = implode(",", $_POST['department']);
    $level = $_POST['level'];
    $district = $_POST['district'];
    $college = $_POST['college'];
    $comments = $_POST['comments'];

    // Handle file upload
    $picture = $_FILES['picture']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($picture);
    move_uploaded_file($_FILES['picture']['tmp_name'], $target_file);

    $student = new Student();
    $student->register($first_name, $last_name, $phone_number, $email, $gender, $age, $province, $departments, $level, $district, $college, $picture, $comments);
}
?>
