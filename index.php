<?php
        $lowercase = array("a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z");
        $uppercase = array("A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z");
        $numbers = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
        $symbols = array("!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "-", "_", "+", "=", "[", "]", "{", "}", "|", ";", ":", "<", ">", "?", ".", ",");

        $bool_lowercase = false;
        $bool_uppercase = false;
        $bool_numbers = false;
        $bool_symbols = false;

        $password = "";
        $length = 10;

        if(isset($_POST['submit'])){
            $length = $_POST['length'];
            if(isset($_POST['lowercase'])){
                $bool_lowercase = true;
            }
            if(isset($_POST['uppercase'])){
                $bool_uppercase = true;
            }
            if(isset($_POST['numbers'])){
                $bool_numbers = true;
            }
            if(isset($_POST['symbols'])){
                $bool_symbols = true;
            }

            for ($i=0; $i < $length; $i++) { 
                $selectedArray = selectArray();
                switch ($selectedArray) {
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
        }

        function selectArray(){
            global $bool_lowercase, $bool_uppercase, $bool_numbers, $bool_symbols;
            $random_array = mt_rand(1,4);

            if($random_array == 1){
                if($bool_lowercase){
                    return $random_array;
                } else {
                    return selectArray();
                }
            } else if($random_array == 2){
                if($bool_uppercase){
                    return $random_array;
                } else {
                    return selectArray();
                }
            } else if($random_array == 3){
                if($bool_numbers){
                    return $random_array;
                } else {
                    return selectArray();
                }
            } else if($random_array == 4){
                if($bool_symbols){
                    return $random_array;
                } else {
                    return selectArray();
                }
            }
        }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Generator</title>
</head>
<body>
    <form method="post">
        Password Length (max. 2048):
        <input type="text" name="length" required>
        <br>
        Include lowercase characters:
        <input type="checkbox" name="lowercase">
        <br>
        Include uppercase characters:
        <input type="checkbox" name="uppercase">
        <br>
        Include numbers:
        <input type="checkbox" name="numbers">
        <br>
        Include symbols:
        <input type="checkbox" name="symbols">
        <br>

        <input type="submit" name="submit" value="Generate my password">
        <br><br><br>
        Your password:
        <br>
        <textarea name="password" cols="30" rows="10" id="passField"><?php echo $password; ?></textarea>
        <br>
        <input type="button" value="Copy" onclick="copyText()">
    </form>

    <script>
        function copyText() {
        var copy = document.getElementById("passField");
        copy.select();
        document.execCommand("copy");
        }
    </script>
</body>
</html>