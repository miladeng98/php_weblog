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

        $sql = "SELECT * FROM Users WHERE username='$username'";
        $result = mysqli_query($conn,$sql);

        if ($result && mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $random_string = md5(generateRandomString(10));
            $sql = "UPDATE Users SET `token` = '$random_string' WHERE username='$username'";
            $update_result = mysqli_query($conn,$sql);
            //email the link
            
            $message = "reset link has been sent to your email: " . $row['email'] . "<br>";
            $message .= "http://" . $_SERVER['SERVER_NAME'] . "/reset_password.php?token=$random_string";
        }


    }

    ?>
    <form action="forget_password.php" method="post">
   
        <label for="username">username:</label><br>
        <input type="text" id="username" name="username" value="<?php if(array_key_exists('username',$_GET)) echo $_GET['username'];?>" required><br>
       
        <input type="submit" value="reset"><br>
       
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