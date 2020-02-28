<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/index.css">
    <style>body{background-image: url("images/background-image.gif")}</style>
    <title>Password Generator</title>
</head>
<body>
    <div class="form">
        <h1>Password Generator</h1>
        <form action="src/password.php" method="post">
        <label for="">Options of the password</label><br><hr>
            <input type="number" name="length" id="length">
            <label for="">Select the length of the password</label><br>
            
            <input type="checkbox" name="upper" id="" value="yes">
            <label for="">Include uppercase letters</label><br>
            <input type="checkbox" name="lower" id="" value="yes">
            <label for="">Include lowercase letters</label><br>
            <input type="checkbox" name="number" id="" value="yes">
            <label for="">Include numbers</label><br>
            <input type="checkbox" name="symbol" id="" value="yes">
            <label for="">Include symbols</label><br>
            <button type="submit">Generate password</button>
        </form>

        <div class="password">
            <?php
                if(isset($_GET['password']) && $_GET['password'] == 'ok'){?>
                <input type="text" id="password-output"  value="<?echo $_SESSION['password']?>">
                <button onclick="copyText()">Copy text</button>
                <?}?>
        </div>
    </div>

    <script>
    function copyText() {
    var copyText = document.getElementById("password-output");
    copyText.select(); 
    copyText.setSelectionRange(0, 99999);
    document.execCommand("copy");
  }
    </script>
</body>
</html>