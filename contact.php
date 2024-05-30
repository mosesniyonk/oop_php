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
            background-color: #f4f4f9;
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
            border-radius: 50%;
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

        main {
            padding: 20px;
            display: flex;
            gap: 20px;
        }

        .announcement {
            background-color: #800080;
            color: white;
            padding: 20px;
            width: 20%;
        }

        .announcement h2 {
            margin-top: 0;
        }

        .students-list {
            background-color: #ffa500;
            color: white;
            padding: 20px;
            width: 75%;
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
            <img src="/assets/logo.png" alt="IPRC Logo">
        </div>
        <div class="title">
            <h1>STUDENTS INFORMATION SYSTEM</h1>
        </div>
        <div class="search">
            <input type="text" placeholder="Search...">
            <button>Search</button>
        </div>
    </header>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="register.php">Register</a></li>
            <li><a href="students.php">Students</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
        <!-- <a href="logout.php" class="logout">Logout</a> -->
    </nav>
    <main>
        <section class="announcement">
            <h2>Announcement</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                <br>
                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </section>
        <section class="students-list">
            <h2>Contact Us</h2>
            <p>If you have any questions or need further information, please feel free to reach out to us. We are here to assist you and provide any information you need about our Students Information System.</p>
            <p><strong>Email:</strong> contact@studentsystem.com</p>
            <p><strong>Phone:</strong> +123 456 7890</p>
            <p><strong>Address:</strong> 123 Education Lane, Knowledge City, EduState, 12345</p>
            <p>Our support team is available Monday to Friday, 9 AM to 5 PM. We strive to respond to all inquiries within 24 hours.</p>
            <p>For technical support, please include as much detail as possible in your request so that we can provide you with the best assistance. We value your feedback and are always looking for ways to improve our system.</p>
        </section>
    </main>
    <footer>
        <p>Copyright &copy; 2024, All rights reserved to the designer&trade;</p>
    </footer>
</body>
</html>
