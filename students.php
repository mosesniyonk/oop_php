<?php
include 'auth_check.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students Information System</title>
    <link rel="stylesheet" href="styles.css">
    <style type="text/css">
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

header {
    background-color: grey;
    color: white;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 20px;
}

header .logo img {
    height: 50px;
}

header .title h1 {
    margin: 0;
    font-size: 24px;
    text-align: center;
    flex: 1;
}

header .search {
    display: flex;
    align-items: center;
}

header .search input {
    padding: 5px;
    margin-right: 5px;
}

header .search button {
    padding: 6px 10px;
    background-color: #ffa500;
    border: none;
    color: white;
    cursor: pointer;
}

nav {
    background-color: lightgreen;
    padding: 10px 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

nav ul {
    list-style: none;
    margin: 0;
    padding: 0;
    display: flex;
    width: 100%;
}

nav ul li {
    flex: 1;
    text-align: center;

}

nav ul li a {
    background-color: #ffa500;
    width: 90%;
    text-decoration: none;
    color: white;
    font-weight: bold;
    display: block;
    padding: 10px;
}

nav .logout {
    color: white;
    text-decoration: none;
    font-weight: bold;
}

/* main {
/*    display: flex;*/
/*    padding: 20px;*/ 


.announcement {
/*    flex: 1;*/
    background-color: #800080;
    color: white;
    padding: 20px;
/*    margin-right: 20px;*/
    width: 20%;
    display: inline;
    float: left;
/*    height: 200px;*/
/*    overflow: scroll;*/
}

.announcement h2 {
    margin-top: 0;
}

.registration-form {
/*    flex: 2;*/
    background-color: #808080;
    padding: 20px;
    border-radius: 5px;
    color: white;

}

.registration-form h2 {
    text-align: center;
    background-color: blue;
    color: white;
    padding: 10px;
    margin: 0 -20px 20px -20px;
}

.registration-form table {
    width: 90%;
    border-spacing: 0 10px;
}

.registration-form td {
    padding: 5px;
}

.registration-form label {
    display: inline-block;
    width: 100%;
    text-align: right;
    padding-right: 10px;
}

.registration-form input,
.registration-form select,
.registration-form textarea {
    width: 100%;
    padding: 10px;
    box-sizing: border-box;
    border-radius: 5px;
    border: 1px solid #ccc;
}

.registration-form .form-buttons {
    text-align: center;
}

.registration-form .form-buttons button {
    padding: 10px 20px;
    background-color: #ffa500;
    border: none;
    color: white;
    cursor: pointer;
    margin: 0 10px;
    border-radius: 5px;
}

footer {
    background-color: grey;
    color: white;
    text-align: center;
    padding: 10px;
    position: fixed;
    width: 100%;
    bottom: 0;
}

    </style>
</head>
<body>
    <header>
        <div class="logo">
            <img src="./assets/logo.png" alt="IPRC Logo" style="border-radius: 50%;">
        </div>
        <div class="title">
            <h1>STUDENTS INFORMATION SYSTEM</h1>
        </div>
        <div class="search">
            <input type="text" placeholder="Search here">
            <button>Search</button>
        </div>
    </header>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li py-6 mt-9 >
            <li><a href="about.php">About</a></li>
            <li><a href="register.php">Register</a></li>
            <li><a href="students.php">Students</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
        <a href="logout.php" class="logout">Logout</a>
    </nav>
    <main>
        <section class="announcement">
            <h2>Announcement</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
<br>
            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </section>
        <section class="students-list" style="background-color: #ffa500; height: 400px; padding-top: 10px;">
            <?php
include 'db_connection.php';

class StudentDisplay {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function getStudents() {
        try {
            $query = "SELECT * FROM students";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $exception) {
            echo "Error: " . $exception->getMessage();
        }
    }
}

$studentDisplay = new StudentDisplay();
$students = $studentDisplay->getStudents();
?>

            <center><h2 style="color: blue">List of registered students</h2></center>
             <table border="1">
        <tr>
            <th>S/N</th>
            <th>Reg No</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Gender</th>
            <th>Department</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Actions</th>
        </tr>
        <?php
        if ($students) {
            $sn = 1;
            foreach ($students as $student) {
                echo "<tr>";
                echo "<td>" . $sn++ . "</td>";
                echo "<td>" . $student['id_formatted'] . "</td>"; // Assuming 'id' is the registration number
                echo "<td>" . $student['first_name'] . "</td>";
                echo "<td>" . $student['last_name'] . "</td>";
                echo "<td>" . $student['gender'] . "</td>";
                echo "<td>" . $student['departments'] . "</td>";
                echo "<td>" . $student['email'] . "</td>";
                echo "<td>" . $student['phone_number'] . "</td>";
                echo "<td>";
                echo "<a href='update_student.php?id=" . $student['id_auto'] . "'>Edit</a> | ";
                echo "<a href='delete_student.php?id=" . $student['id_auto'] . "' onclick='return confirm(\"Are you sure?\")'>Delete</a> | ";
                echo "<a href='details_student.php?id=" . $student['id_auto'] . "'>Details</a>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='9'>No students found.</td></tr>";
        }
        ?>
    </table>
            
        </section>
    </main>
    <footer>
        <p>Copyright &copy; 2024, All rights reserved to the designer&trade;</p>
    </footer>
</body>
</html>