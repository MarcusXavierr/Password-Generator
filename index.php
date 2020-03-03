<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/teste.css">
    <link rel="stylesheet" href="bower_components/bulma/css/bulma.css">
    <title>Password Generator</title>
</head>
<body>
<section class="section">
    <div class="container">
        <h1 class="title has-text-centered">Password Generator</h1>
        <form action="src/password.php" method="post">
        <p class="has-text-centered is-size-5">Options of the password</p><br><hr>
            <input class=" normal input " type="number" name="length" id="length" placeholder="Select the length of the password">
            <input type="checkbox" name="upper" id="" value="yes">
            <label for="">Include uppercase letters</label><br>
            <input type="checkbox" name="lower" id="" value="yes">
            <label for="">Include lowercase letters</label><br>
            <input type="checkbox" name="number" id="" value="yes">
            <label for="">Include numbers</label><br>
            <input type="checkbox" name="symbol" id="" value="yes">
            <label for="">Include symbols</label><br>
            <button type="submit" class="button is-primary is-light is-medium is-fullwidth">Generate password</button>
        </form>
        <div >
            <?php
                if(isset($_GET['password']) && $_GET['password'] == 'ok'){?>
                <p class="is-size-4 has-text-centered has-text-success ">Your password is created!</p>
                <div class="is-inline-flex is column is-three-fifths">
                    <input type="text" id="password-output" class="input is-medium " value="<?echo $_SESSION['password']?>">
                    <button onclick="copyText()" class="button is-primary is-light is-medium">Copy text</button><br>
                </div>
                <p class="is-family-monospace">Password security level: <?echo $_SESSION['strength']?></p>
                <div >
                    <progress class="level progress is-large <?echo $_SESSION['strength-css']?>" value="<?echo $_SESSION['strength-progress-bar']?>" max="100"><?echo $_SESSION['strength']?></progress>
                </div>
            <?}?>  
        </div>
                <?php
                if(isset($_GET['error'])){?>
                    <p class="is-size-4 has-text-centered has-text-danger ">Please select select your password settings and password length and try again</p>
                <?}?>
        </div>
    </section>

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