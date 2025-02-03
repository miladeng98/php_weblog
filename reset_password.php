<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>welcome to panel</title>
    <link rel="stylesheet" href="/statics/styles.css">
    
</head>
<body>
    <h2>forget password</h2>
    <?php
    include 'db.php';
    include 'functions.php';

    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "UPDATE Users SET password= '$password' WHERE username= '$username'";
        $result = mysqli_query($conn,$sql);

        if ($result === true) {
            $sql = "UPDATE Users SET `token` = 'NULL' WHERE username='$username'";
            $token_null = mysqli_query($conn,$sql);
            header('Location: login.php?msg=the new password has been set successfully');
        }


    }
    
    if (array_key_exists('token',$_GET)) {
        $token = $_GET['token'];

        $sql = "SELECT * FROM Users WHERE token= '$token'";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $token_result = true;
        }
    }

    if (isset($token_result) === true) { ?>
    <form action="reset_password.php" method="post">
        <input type="hidden" id="username" name="username" value="<?php echo $row['username']; ?>" >
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br>
        <input type="submit" value="reset the password"><br>
        
        
    </form>


    <?php } else {  
        echo "provided token is not valid or expired!";
    } 
    ?>
    





    
</body>


<footer>
    <p>&copy; 2025 Your Website Name. All rights reserved.</p>
</footer>
</body>
</html>