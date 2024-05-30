<?php
include 'db_connection.php';

class StudentDelete {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function deleteStudent($id) {
        try {
            $query = "DELETE FROM students WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id);
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $exception) {
            echo "Error: " . $exception->getMessage();
            return false;
        }
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $studentDelete = new StudentDelete();
    if ($studentDelete->deleteStudent($id)) {
        header("Location: students.php");
        exit();
    } else {
        echo "Failed to delete student.";
    }
}
?>
