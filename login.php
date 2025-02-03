<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>welcome to panel</title>
    <link rel="stylesheet" href="/statics/styles.css">
    
</head>
<body>
    <h2>Login Form</h2>
    

    <?php
    session_start();
    include 'db.php';
    // Step 2: Handle form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // get user input
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        // Dummy credentials for demonstration
        $sql = "SELECT * FROM Users WHERE username='$username' AND password='$password'";
        $result = mysqli_query($conn,$sql);
        if ($result && mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['is_logged'] = true;
            $_SESSION['username'] = $row['username'];
            $_SESSION['user_id'] = $row['user_id'];
            header("location: user_panel.php");
        } else {
            $error_message = "invalid username or password<br> if you cannot remember you password, then <a href='forget_password.php?username=$username'>click here</a> to reset your password";
            $username = $_POST['username'];
        }
    }
    ?>
    <form action="login.php" method="post">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Login"><br>
        <lable>don't have an account?</lable><a href='register.php'>  register now!</a><br>
        
    </form>
    <?php
    if (array_key_exists('msg', $_GET)) {
        $message = $_GET['msg'];
    }  
    if (isset($message)) {
        echo "<p>$message</p>";
    }
    if (isset($error_message)) {
        echo "<p>$error_message</p>";
    }
    

    ?>


</body>


<footer>
        <p>&copy; 2025 Your Website Name. All rights reserved.</p>
    </footer>
</body>
</html>