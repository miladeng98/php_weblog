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
    include 'db.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];

        try {
            $sql = "INSERT INTO `Users` ( username, email, password ) VALUES ( '$username', '$email', '$password');";
            $result = mysqli_query($conn,$sql);
        
            if ($result === true) {
                header('Location: login.php?msg=you have registered successfully, pleas login');
            }
        } catch(mysqli_sql_exception $e) {
            $message = $e->getMessage();
        }
    }
    ?>
    <form action="register.php" method="post">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br>
        <input type="submit" value="register"><br>
        <lable>you've already have an account?</lable><a href='login.php'>  login now!</a>
    </form>


    <?php
    if (isset($message)) {
        echo "<p>$message</p>";
    }
    ?>

</body>


<footer>
        <p>&copy; 2025 Your Website Name. All rights reserved.</p>
    </footer>
</body>
</html>