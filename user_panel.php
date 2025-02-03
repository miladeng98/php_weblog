<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>welcome to panel</title>
    <link rel="stylesheet" href="/statics/styles.css">
    <script src="/statics/functions.js"></script>
    
</head>
<?php
session_start();
// var_dump($username);
// die;
if (isset($_SESSION['is_logged']) === true) {
?>
<body>
    <header>
        <h1>Welcome to the panel</h1>
        <nav>
            <ul>
                <li><a href="#home">Panel</a></li>
                <li><a href="#about">Write</a></li>
                <li><a href="#services">posts</a></li>
                <li><a href="#">Settings</a></li>
                <li>(<?php echo $_SESSION['username']?>) <a href="#" onclick="deleteAllCookies();redirect('/login.php');">log out</a></li>

            </ul>
        </nav>
    </header>

    <main>
        <section id="home">
            <h2>Home</h2>
            <p>This is the home section of your website. You can add more content here.</p>
        </section>

        <section id="about">
            <h2>About</h2>
            <p>This is the about section. Describe yourself or your website here.</p>
        </section>

        <section id="services">
            <h2>Services</h2>
            <p>List your services here. You can provide details about what you offer.</p>
        </section>

        <section id="contact">
            <h2>Contact</h2>
            <p>Provide contact information here. You can also add a contact form.</p>
        </section>
    </main>
<?php } else { ?>
    <p> redirecting to login page </p>
    <script>
        setTimeout(function() {
                window.location.href = "/login.php"; // Change this URL to your desired destination
                document.body.innerHTML = "<p>redirected to login page</p>";
            }, 3000);
    </script>
    
<?php } ?>
    <footer>
        <p>&copy; 2025 Your Website Name. All rights reserved.</p>
    </footer>
</body>
</html>
