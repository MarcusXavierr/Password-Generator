<?php
    session_start();
    require_once '../vendor/autoload.php';
    use ZxcvbnPhp\Zxcvbn;
    //var_dump($_POST);
    $letters = [
    'q','w','e','r','t','y','u','i',
    'o','p','a','s','d','f','g','h','j',
    'k','l','z','x','c','v','b','n','m'
    ];

    $symbols = [
    '@','!','#','$','%','&','*','/','|','+'
    ];

    $numbers = [
    '0','1','2','3','4','5','6','7','8','9'
    ];

    for ($i = 1; $i<=$_POST['length'];$i++){
        $type = rand(0,3);
        //I used 'if' instead of 'switch' because 
        //I think that the code is more organized like this 
        if($type == 0 && isset($_POST['lower'])){   
            $character = $letters[rand(0,25)];
            echo $character;
            $arrayPassword[] = $character;

        }
        else if ($type == 1 && isset($_POST['upper'])){
            $character = $letters[rand(0,25)];
            echo $upperCharacter = strtoupper($character);
            $arrayPassword[] = $upperCharacter;
        }
        else if ($type == 2 && isset($_POST['symbol'])){
            $character = $symbols[rand(0,9)];
            echo $character;
            $arrayPassword[] = $character;
        }
        else if ($type == 3 && isset($_POST['number'])){
            $character = $numbers[rand(0,9)];
            echo $character;
            $arrayPassword[] = $character; 
        } else {
            $i --;
        }

    }


    echo "<br>";
    var_dump($arrayPassword);
    echo "<br>";
    $password = implode("",$arrayPassword);

    //Test
    $passwordTest = new Zxcvbn();

    $strength = $passwordTest->passwordStrength($password);
    echo $strength['score'];

    echo "<pre>";
    var_dump($_POST);
    echo  "</pre>";

    $_SESSION['password'] = $password;
    header('Location:../index.php?password=ok');

?>