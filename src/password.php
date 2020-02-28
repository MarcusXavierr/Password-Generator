<?php
    session_start();
    require_once '../vendor/autoload.php';
    use ZxcvbnPhp\Zxcvbn;
    
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

    $password = implode("",$arrayPassword); // Convert array to string

    //Test of Level password
    $passwordTest = new Zxcvbn();

    $strength = $passwordTest->passwordStrength($password);
    $_SESSION['strength'] = $strength['score'];


    $_SESSION['password'] = $password;

    if( ($_POST['length']<1)||
        !isset($_POST['number']) && 
        !isset($_POST['upper']) && 
        !isset($_POST['lower']) && 
        !isset($_POST['symbol']))
        {
            header('Location:../index.php?error');
        }else {
            header('Location:../index.php?password=ok');
        }
?>