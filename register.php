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

main {
    display: flex;
/*    padding: 20px;*/
}

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
    font-family: 'Comic Sans MS', cursive, sans-serif;
    flex: 2;
/*    background-color: #808080;*/
    padding: 20px;
    border-radius: 5px;
    color: white;
    background-color: #ffa500; 
    height: 400px; 
    padding-top: 1px;
}

.registration-form h2 {
    text-align: left;
    color: blue;
    padding: 0px;
    margin: 0 -20px 20px -20px;
}
.registration-form .logout {
    text-align: right;
    color: whitesmoke;
    padding: 10px;
/*    margin: 0 -20px 20px -20px;*/
float: left;
}

.registration-form table {
    width: 100%;
/*    border-spacing: 0 10px;*/
    background-color: grey;
}

.registration-form label {
/*    display: inline-block;*/
/*    width: 100%;*/
    text-align: right;
/*    padding-right: 10px;*/
}

.registration-form input,
.registration-form select,
.registration-form textarea {
/*    width: 100%;*/
/*    padding: 10px;*/
    box-sizing: border-box;
/*    border-radius: 5px;*/
    border: 3px solid blue;
}

.registration-form .form-buttons {
    text-align: center;
}

.registration-form .form-buttons button {
    padding: 10px 20px;
    background-color: darkgrey;
    border: 3px solid blue;
    color: white;
    cursor: pointer;
    margin: 0 10px;
    border-radius: 25px;
}

footer {
    background-color: dimgray;
    color: white;
    text-align: center;
    position: fixed;
    width: 100%;
    bottom: 0;
    font-family: 'Times New Roman', cursive, sans-serif;
    border-bottom: 8px solid black;
    border-radius: 0px 0px 4px 4px;
}

    </style>
</head>
<body>
    <header>
        <div class="logo">
            <img src="/assets/logo.png" alt="IPRC Logo" style="border-radius: 50%;">
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
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </section>
        <section class="registration-form">
            <div style="display: flex;">
            <h2 style="flex:1">Student Registration Form</h2>
            <a href="logout.php" class="logout" style="flex:2">Logout</a>
        </div>
            <form action="register_student.php" method="post" enctype="multipart/form-data">
                <table style="border: 3px solid whitesmoke;">
                    <tr>
                        <td>
                    <table style="border: 3px solid whitesmoke;">

                    <tr>
                        <td><label for="first_name">First Name</label></td>
                        <td><input type="text" id="first_name" name="first_name" required></td>
                        <td><label for="province">Province</label></td>
                        <td>
                            <select id="province" name="province" required>
                                <option value="">CHOOSE PROVINCE</option>
                                <option value="North">North</option>
                                <option value="East">East</option>
                                <option value="West">West</option>
                                <option value="South">South</option>
                                <option value="Kigali">Kigali</option>
                                <!-- Add options here -->
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="last_name">Last Name</label></td>
                        <td><input type="text" id="last_name" name="last_name" required></td>
                        <td rowspan="3"><label for="department">Department</label></td>
                        <td rowspan="3">
                            <input type="checkbox" id="it" name="department[]" value="Information Technology">
                            <label for="it">Information Technology</label><br>
                            <input type="checkbox" id="ee" name="department[]" value="Electrical Engineering">
                            <label for="ee">Electrical Engineering</label><br>
                            <input type="checkbox" id="he" name="department[]" value="Horticulture Engineering">
                            <label for="he">Horticulture Engineering</label>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="phone_number">Phone Number</label></td>
                        <td><input type="text" id="phone_number" name="phone_number" required></td>
                    </tr>
                    <tr>
                        <td><label for="email">Email</label></td>
                        <td><input type="email" id="email" name="email" required></td>

                    </tr>

                    <tr>
                        <td><label for="gender">Gender</label></td>
                        <td>
                            <input type="radio" id="male" name="gender" value="male" required>
                            <label for="male">Male</label><br>
                            <input type="radio" id="female" name="gender" value="female" required>
                            <label for="female">Female</label>
                        </td>
                        <td><label for="level">Level</label></td>
                        <td>
                            <select id="level" name="level" required>
                                <option value="">CHOOSE LEVEL</option>
                                <option value="6">Level 6 Y1</option>
                                <option value="6">Level 6 Y2</option>
                                <option value="7">Level 7</option>
                                <!-- Add options here -->
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="age">Age</label></td>
                        <td><input type="text" id="age" name="age" required></td>
                        <td><label for="picture">Picture</label></td>
                        <td><input type="file" id="picture" name="picture" required></td>
                    </tr>
                    
                    <tr>
                        <td><label for="district">District</label></td>
                        <td>
                            <select id="district" name="district" required>
                                <option value="">CHOOSE DISTRICT</option>
                                <option value="Kicukiro">Kicukiro</option>
                                <option value="Rubavu">Rubavu</option>
                                <option value="Rusizi">Rusizi</option>
                                <option value="Rulindo">Rulindo</option>
                                <option value="Rutsiro">Rutsiro</option>

                                <!-- Add options here -->
                            </select>
                        </td>
                        <td><label for="college">College</label></td>
                        <td>
                            <select id="college" name="college" required>
                                <option value="">CHOOSE COLLEGE</option>
                                <option value="Main campus">Main Campus</option>
                                <option value="Nyamishaba">Nyamishaba</option>
                                <!-- Add options here -->
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="comments">Comments</label></td>
                        <td colspan="4" align="center"><textarea id="comments" name="comments" required cols="70" rows="3"></textarea></td>
                    </tr>
                    <tr>
                        <td colspan="4" class="form-buttons">
                            <button type="submit">Register</button>
                            <button type="reset">Cancel</button>
                        </td>
                    </tr>
                </td>
            </tr>
            </table>
                </table>
            </form>
        </section>
    </main>
    <footer>
        <p>Copyright &copy; 2024, All rights reserved to the designer!&trade;</p>
    </footer>
</body>
</html>