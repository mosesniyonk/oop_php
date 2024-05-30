<?php
include 'db_connection.php';

class StudentUpdate {
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

    public function updateStudent($id, $first_name, $last_name, $phone_number, $email, $gender, $age, $province, $departments, $level, $district, $college, $comments, $picture = null) {
        try {
            $query = "UPDATE students SET 
                        first_name = :first_name,
                        last_name = :last_name,
                        phone_number = :phone_number,
                        email = :email,
                        gender = :gender,
                        age = :age,
                        province = :province,
                        departments = :departments,
                        level = :level,
                        district = :district,
                        college = :college,
                        comments = :comments";
            
            if ($picture) {
                $query .= ", picture = :picture";
            }

            $query .= " WHERE id_auto = :id";

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
            $stmt->bindParam(':comments', $comments);
            if ($picture) {
                $stmt->bindParam(':picture', $picture);
            }
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

$studentUpdate = new StudentUpdate();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $student = $studentUpdate->getStudentById($id);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id_auto'];
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
    $picture = null;
    if (isset($_FILES['picture']) && $_FILES['picture']['name'] != "") {
        $picture = $_FILES['picture']['name'];
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($picture);
        move_uploaded_file($_FILES['picture']['tmp_name'], $target_file);
    }

    if ($studentUpdate->updateStudent($id, $first_name, $last_name, $phone_number, $email, $gender, $age, $province, $departments, $level, $district, $college, $comments, $picture)) {
        header("Location: students.php");
        exit();
    } else {
        $errors[] = "Failed to update student.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Student</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 50%;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        form {
            width: 100%;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table td {
            padding: 10px;
        }
        table td label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }
        table td input, table td select, table td textarea {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-buttons {
            text-align: center;
        }
        .form-buttons button {
            padding: 10px 20px;
            margin: 10px;
            border: none;
            border-radius: 4px;
            background-color: #28a745;
            color: white;
            cursor: pointer;
        }
        .form-buttons button[type="reset"] {
            background-color: #dc3545;
        }
        .form-buttons button:hover {
            opacity: 0.9;
        }
        .error {
            color: red;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php if ($student): ?>
            <h2>Update Student</h2>
            <?php if (isset($errors) && !empty($errors)): ?>
                <div class="error">
                    <?php echo implode('<br>', $errors); ?>
                </div>
            <?php endif; ?>
            <form action="update_student.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $student['id_auto']; ?>">
                <table>
                    <tr>
                        <td><label for="first_name">First Name</label></td>
                        <td><input type="text" id="first_name" name="first_name" value="<?php echo $student['first_name']; ?>" required></td>
                    </tr>
                    <tr>
                        <td><label for="last_name">Last Name</label></td>
                        <td><input type="text" id="last_name" name="last_name" value="<?php echo $student['last_name']; ?>" required></td>
                    </tr>
                    <tr>
                        <td><label for="phone_number">Phone Number</label></td>
                        <td><input type="text" id="phone_number" name="phone_number" value="<?php echo $student['phone_number']; ?>" required></td>
                    </tr>
                    <tr>
                        <td><label for="email">Email</label></td>
                        <td><input type="email" id="email" name="email" value="<?php echo $student['email']; ?>" required></td>
                    </tr>
                    <tr>
                        <td><label for="gender">Gender</label></td>
                        <td>
                            <input type="radio" id="male" name="gender" value="male" <?php echo ($student['gender'] == 'male') ? 'checked' : ''; ?> required>
                            <label for="male">Male</label>
                            <input type="radio" id="female" name="gender" value="female" <?php echo ($student['gender'] == 'female') ? 'checked' : ''; ?> required>
                            <label for="female">Female</label>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="age">Age</label></td>
                        <td><input type="text" id="age" name="age" value="<?php echo $student['age']; ?>" required></td>
                    </tr>
                    <tr>
                        <td><label for="province">Province</label></td>
                        <td>
                            <select id="province" name="province" required>
                                <option value="">CHOOSE PROVINCE</option>
                                <option value="North">North</option>
                                <option value="South">South</option>
                                <option value="East">East</option>
                                <option value="West">West</option>
                                <option value="Kigali">Kigali</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="department">Department</label></td>
                        <td>
                            <input type="checkbox" id="it" name="department[]" value="Information Technology" <?php echo (strpos($student['departments'], 'Information Technology') !== false) ? 'checked' : ''; ?>>
                            <label for="it">Information Technology</label>
                            <input type="checkbox" id="ee" name="department[]" value="Electrical Engineering" <?php echo (strpos($student['departments'], 'Electrical Engineering') !== false) ? 'checked' : ''; ?>>
                            <label for="ee">Electrical Engineering</label>
                            <input type="checkbox" id="he" name="department[]" value="Horticulture Engineering" <?php echo (strpos($student['departments'], 'Horticulture Engineering') !== false) ? 'checked' : ''; ?>>
                            <label for="he">Horticulture Engineering</label>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="level">Level</label></td>
                        <td>
                            <select id="level" name="level" required>
                                <option value="">CHOOSE LEVEL</option>
                                <option value="6">Level 6 Y1</option>
                                <option value="6">Level 6 Y2</option>
                                <option value="7">Level 7</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="district">District</label></td>
                        <td>
                            <select id="district" name="district" required>
                                <option value="">CHOOSE DISTRICT</option>
                                <option value="Burera">Burera</option>
                                <option value="Musanze">Musanze</option>
                                <option value="Rulindo">Rulindo</option>
                                <option value="Gakenke">Gakenke</option>
                                <option value="Karongi">Karongi</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="college">College</label></td>
                        <td>
                            <select id="college" name="college" required>
                                <option value="">CHOOSE COLLEGE</option>
                                <option value="Main Campus">Main Campus</option>
                                <option value="Nyamishaba">Nyamishaba</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="picture">Picture</label></td>
                        <td><input type="file" id="picture" name="picture"></td>
                    </tr>
                    <tr>
                        <td><label for="comments">Comments</label></td>
                        <td><textarea id="comments" name="comments" required><?php echo $student['comments']; ?></textarea></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="form-buttons">
                            <button type="submit">Update</button>
                            <button type="reset">Cancel</button>
                        </td>
                    </tr>
                </table>
            </form>
        <?php else: ?>
            <p>Student not found.</p>
        <?php endif; ?>
    </div>
</body>
</html>