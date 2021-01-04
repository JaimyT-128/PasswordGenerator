<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Generator</title>
</head>
<body>
    <!-- <form method="post">
        Password Length (max. 2048):
        <input type="text" name="" id="">
        Include lowercase characters:
        <input type="checkbox" name="" id="">
        Include uppercase characters:
        <input type="checkbox" name="" id="">
        Include numbers:
        <input type="checkbox" name="" id="">
        Include symbols:
        <input type="checkbox" name="" id="">

        <input type="submit" value="Generate my password">

        Your new password:
        <input type="text" name="" id="">
        <input type="button" value="Copy">

        Previous passwords:
        Download json
    </form> -->
    <?php
        $lowercase = array("a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z");
        $uppercase = array("A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z");
        $numbers = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
        $symbols = array("!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "-", "_", "+", "=", "[", "]", "{", "}", "|", ";", ":", "<", ">", "?", ".", ",");

        $password = "";
        $length = 10;

        for ($i=0; $i < $length; $i++) { 
            $random_array = mt_rand(1,4);
            switch ($random_array) {
                case 1:
                    $password = $password . $lowercase[mt_rand(0,(count($lowercase) - 1))];
                    break;
                case 2:
                    $password = $password . $uppercase[mt_rand(0,(count($uppercase) - 1))];
                    break;
                case 3:
                    $password = $password . $numbers[mt_rand(0,(count($numbers) - 1))];
                    break;
                case 4:
                    $password = $password . $symbols[mt_rand(0,(count($symbols) - 1))];
                    break;
                default:
                    echo "Internal error.";
                    break;
                
            }
            
        }

        echo $password;
        echo "<br>";
        echo strlen($password);
    ?>
</body>
</html>