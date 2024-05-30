<?php
include 'db_connection.php';

class StudentDetails {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function getStudentById($id) {
        try {
            $query = "SELECT * FROM students WHERE id_auto = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $exception) {
            echo "Error: " . $exception->getMessage();
        }
    }
}

if (isset($_GET['id_auto'])) {
    $id = $_GET['id_auto'];
    $studentDetails = new StudentDetails();
    $student = $studentDetails->getStudentById($id);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Details</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="max-w-lg w-full bg-white shadow-md rounded-lg p-8">
        <?php if ($student): ?>
            <h2 class="text-2xl font-bold mb-6">Student Details</h2>
            <p class="mb-4"><strong>First Name:</strong> <?php echo $student['first_name']; ?></p>
            <p class="mb-4"><strong>Last Name:</strong> <?php echo $student['last_name']; ?></p>
            <p class="mb-4"><strong>Gender:</strong> <?php echo $student['gender']; ?></p>
            <p class="mb-4"><strong>Department:</strong> <?php echo $student['departments']; ?></p>
            <p class="mb-4"><strong>Email:</strong> <?php echo $student['email']; ?></p>
            <p class="mb-4"><strong>Phone:</strong> <?php echo $student['phone_number']; ?></p>
            <p class="mb-4"><strong>Age:</strong> <?php echo $student['age']; ?></p>
            <p class="mb-4"><strong>Province:</strong> <?php echo $student['province']; ?></p>
            <p class="mb-4"><strong>Level:</strong> <?php echo $student['level']; ?></p>
            <p class="mb-4"><strong>District:</strong> <?php echo $student['district']; ?></p>
            <p class="mb-4"><strong>College:</strong> <?php echo $student['college']; ?></p>
            <p class="mb-4"><strong>Comments:</strong> <?php echo $student['comments']; ?></p>
            <p class="mb-4"><strong>Picture:</strong> <img class="rounded-full w-24 h-24 object-cover" src="uploads/<?php echo $student['picture']; ?>" alt="Student profile Picture"></p>
        <?php else: ?>
            <p class="text-red-500">Student not found.</p>
        <?php endif; ?>
    </div>
</body>
</html>
