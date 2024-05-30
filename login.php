<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="css/login.css">
    <style>
        body {
    font-family: 'Comic Sans MS', cursive, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    font-weight: bolder;
}

.login-form {
    background-color: #fff;
    border: 2px solid #000;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    padding: 20px;
    width: 300px;
    text-align: center;
}

.login-form h1 {
    color: #0000ff;
}

.login-form input[type="text"],
.login-form input[type="password"] {
    width: 80%;
    padding: 10px;
    margin: 10px 0;
    border: 2px solid #0000ff;
    box-sizing: border-box;
    background-color: white;
    color: black;
}

.login-form button {
    width: 50%;
    padding: 10px;
    border: 2px solid #0000ff;
    background-color: #444;
    color: #fff;
    cursor: pointer;
    box-sizing: border-box;
}

.login-form button:hover {
    background-color: #555;
}

.login-form a {
    color: #800080;
    text-decoration: none;
}

.login-form a:hover {
    text-decoration: underline;
}

.note {
    margin-top: 10px;
}
</style>
</head>
<body>
    <div class="login-form">
        <h1>Login Form</h1>
        <form action="authenticate.php" method="post">
            <table bgcolor="grey" style="border: 3px solid blue;">
                <tr><td>
                <table style="border: 3px solid blue;">
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username" required></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password" required></td>
                </tr>
                <tr>
                    <td></td>
                    <td><button type="submit" style="border-radius: 55px">Login</button></td>
                </tr>
                </table></td></tr>
            </table>
            
        </form>
        <div class="note">
            <p style="color: blue;">Don't have an account? <a href="register_user.php">Sign Up</a></p>
        </div>
    </div>
</body>
</html>
