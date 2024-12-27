<!DOCTYPE html>
<html>
<head>
    <title>Cookie Handler</title>
</head>
<body>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        setcookie("username", $_POST['username'], time() + (10 * 30), "/");
        echo "<p>cookie set. Reload the page to see the cookie value.</p>";
    }
    if(isset($_COOKIE["username"])) {
        echo "<p>welcome back, " . htmlspecialchars($_COOKIE["username"]). "!</p>";
    }else {
        echo "<p>welcome, guest!</p>";
    }
    ?>
    
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for= "username">Enter your name:</label><br>
        <input type="text" id="username" name="username"><br><br>
        <input type="submit" value="set cookie">
    </form>
</body>
</html>