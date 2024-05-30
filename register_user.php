<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User Account</title>
    <link rel="stylesheet" href="css/signup.css">
    <style type="text/css">
        body {
    font-family: 'Comic Sans MS', cursive, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
/*    height: 100vh;*/
}

.signup-form {
    background-color: #fff;
    border: 2px solid #000;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    padding: 20px;
    width: 350px;
    text-align: center;
}

.signup-form h1 {
    color: #0000ff;
}

.signup-form input[type="text"],
.signup-form input[type="email"],
.signup-form input[type="password"] {
    width: 80%;
    padding: 5px;
    margin: 10px 0;
    border: 2px solid #0000ff;
    box-sizing: border-box;
    background-color: white;
    color: black;
}

.signup-form button {
    width: 50%;
    padding: 10px;
    border: 2px solid #0000ff;
    background-color: #444;
    color: #fff;
    cursor: pointer;
    box-sizing: border-box;
}

.signup-form button:hover {
    background-color: #555;
}

.signup-form a {
    color: #800080;
    text-decoration: none;
}

.signup-form a:hover {
    text-decoration: underline;
}

.note {
    margin-top: 10px;
}
td{
    text-align: left;
}

    </style>
</head>
<body>
    <div class="signup-form">
        <h1>Create User Account</h1>
        <form action="register_user1.php" method="post">
            <table style="border: 3px solid blue;" bgcolor="grey">
                <tr>
                    <td>
            <table style="border: 3px solid blue;" bgcolor="grey">
                <tr>
                    <td>Firstname</td>
                    <td><input type="text" name="first_name" placeholder="First Name" required></td>
                </tr>
                <tr>
                    <td>Lastname</td>
                    <td><input type="text" name="last_name" placeholder="Last Name" required></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="email" name="email" placeholder="Email" required></td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td><input type="text" name="phone_number" placeholder="Phone Number" required></td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username" placeholder="Username" required></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password" placeholder="Password" required></td>
                </tr>
                <tr>
                    <td>Confirm Password</td>
                    <td><input type="password" name="confirm_password" placeholder="Confirm Password" required></td>
                </tr>
                <tr>
                    <td></td>
                    <td><button type="submit" style="border-radius: 50px;">Signup</button></td>
                </tr>
            </table>
        </td>
    </tr>
</table>
        
    </form>
    <?php if (isset($_GET['error'])): ?>
        <p style="color:red;"><?php echo $_GET['error']; ?></p>
    <?php endif; ?>
        <div class="note">
            <p>Already have an account? <a href="login.php">Login</a></p>
        </div>
    </div>
</body>
</html>
