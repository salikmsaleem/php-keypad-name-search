<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keypad Example</title>
    <style>
        table {
            margin: 0 auto;
        }

        button {
            height: 100px;
            width: 120px;
            margin: 2px;
            font-size: 30px;
            font-weight: bold;
            border-radius: 20px;
        }

        p {
            font-size: 11px;
            margin: 0px;
            color: rgb(66, 66, 65);
        }

        .area {
            height: 100px;
            border: 1px solid black;
            background-color: rgb(201, 189, 171);
            color: white;
            text-align: center;
            font-weight: bolder;
            font-size: 70px;
        }

        div {
            height: 100vh;
        }
    </style>
</head>

<body>
    <form method="POST">
        <table>
            <tr class="area">
                <td colspan="3" id="nnn" style="border-radius:20px;"></td>
            </tr>
            <tr>
                <td><button>1<p>...</p></button></td>
                <td><button type="button" onclick="main('2')">2<p>abc</p></button></td>
                <td><button type="button" onclick="main('3')">3<p>def</p></button></td>
            </tr>
            <tr>
                <td><button type="button" onclick="main('4')">4<p>ghi</p></button></td>
                <td><button type="button" onclick="main('5')">5<p>jkl</p></button></td>
                <td><button type="button" onclick="main('6')">6<p>mno</p></button></td>
            </tr>
            <tr>
                <td><button type="button" onclick="main('7')">7<p>pqrs</p></button></td>
                <td><button type="button" onclick="main('8')">8<p>tuv</p></button></td>
                <td><button type="button" onclick="main('9')">9<p>wxyz</p></button></td>
            </tr>
            <tr>
                <td><button  onclick="reset()">AC<p>---</p></button></td>
                <td><button>0<p>...</p></button></td>
                <td><button type="button" onclick="backspace()">C<p>---</p></button></td>
            </tr>
            <tr>
                <td colspan="3"><input type="hidden" name="numeric" id="numeric">
                    <button type="submit" style="width: 300px; margin-left:40px;border-radius:20px;" onclick="search()">Search</button>
                </td>
            </tr>
        </table>

    </form>

    <?php
    $arr = [
        "Mohsin","hassan","Ahmed","hasnain","Salik","Taha","abdul rehman","farhan","Noman","Aqsa","aliza","waaania","Maham","Aliza","Ali","mazhar","Sir Mohsin","Sir Haseeb","Sir Arsalan"];
    $Chars = [2 => "abc",
        3 => "def",4 => "ghi",5 => "jkl",6 => "mno",7 => "pqrs",8 => "tuv", 9 => "wxyz" ];
    $found_Name = "";
    if (isset($_POST['numeric']) && $_POST['numeric'] != "") {

        $num = $_POST['numeric'];



        $found_Names = [];
        foreach ($arr as $name) {
            $count = 0;
            $name = strtolower($name);

            for ($i = 0; $i < strlen($name); $i++) {
                $char = $name[$i];
                for ($j = 0; $j < strlen($num); $j++) {
                    $new1 = $num[$j];
                    $new1 = $Chars[$new1];


                    for ($k = 0; $k < strlen($new1); $k++) {
                        $new2 = $new1[$k];
                        if ($char == $new2) {
                            $count++;
                            break;
                        }
                    }
                    if ($char == $new2) {
                        break;
                    }
                }
                if ($count == strlen((string)$num)) {
                    $found_Names[] = $name;
                    break;
                }
            }
        }
        foreach ($found_Names as $key => $value) {
            $found_Name .= $key + 1 . ") $value" . "<br>";
        }
    }



    ?>


    <div>
        <h2>Data Found:</h2><?php echo $found_Name; ?>
    </div>


    <script>
        function main(value) {
            let display = document.getElementById('nnn');
            display.innerHTML += value;
            document.getElementById('numeric').value = display.innerHTML;
        }

        function reset() {
            let display = document.getElementById('nnn');
            display.innerHTML = "";
            document.getElementById('numeric').value = "";
        }

        function backspace() {
            let display = document.getElementById('nnn');
            display.innerHTML = display.innerHTML.slice(0, -1);
            document.getElementById('numeric').value = display.innerHTML;
        }

        function search() {
            let display = document.getElementById('nnn');
            document.getElementById('numeric').value = display.innerHTML;
        }
    </script>


</body>

</html>