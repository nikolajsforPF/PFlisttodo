﻿<?php
session_start();
?>
<?php
error_reporting(0);
?>
<html>
<body>
<form action="ListToDoEdit.php" method="POST">
    <style>
        h2, h3
        {
            text-align:center;
        }

        p
        {
            font-size:22px;
            margin-left:150px;
        }

        p1
        {
            font-size:22px;
            margin-left:300px;
        }

        .texts
        {
            font-size:22px;
            margin-left:150px;
        }

        input[type=text]
        {
            margin-left:150px;
            font-size:20px;
            width:200px;
            height:26px;
            border:2px solid black;
        }

        textarea
        {
            margin-left:300px;
            font-size:20px;
            width:776px;
            height:170px;
            border:2px solid black;
        }

        .button4
        {
            width:210px;
            margin-left:874px;
            font-size:20px;
            border-radius:7px;
            border:2px solid black;
        }

        .button4:hover
        {
            background-color:limegreen;
        }

        .button6
        {
            margin-left:300px;
            width:210px;
            font-size:20px;
            border-radius:7px;
            border:2px solid black;
        }
        .button5
        {
            margin-left:180px;
            width:150px;
            font-size:20px;
            border-radius:7px;
            border:2px solid black;
        }

        .button5:hover
        {
            background-color:red;
        }


    </style>
    <script>

    </script>
    <header>
        <h2><br/>
            Darāmo lietu saraksts
        </h2>
        <h3>
            Labot
        </h3>
    </header>
    <div class="texts">
        <p>Virsraksts: </p>
        <input type="text" name="TextboxForFirstText" style="width:780px"
               id="TextboxForFirstText" value="<?php echo $_SESSION['title']; ?>"/>
    </div>
    <div class="texts2"><br/>
        <p1>Apraksts:</p1>
        <br/><br/>
        <input type="text" name="TextboxForSecondText" value="<?php echo $_SESSION['des']; ?>">
    </div>
    <br/>
    <button class="button button6" name="GoBack" type="submit">Doties atpakaļ</button>
    <button class="button button5" name="Delete" type="submit">Dzēst</button>
    <button class="button button4" name="Save" type="submit">Saglabāt</button>
    </input>
    </div>

</form>

</body>
</html>

<?php

    $host = "localhost";
    $username = "root";
    $password = "";
    $db_name = "test";


    // Create connection
    $conn = new mysqli($host,$username, $password,$db_name);

    if (isset($_POST['GoBack']))
    {
        $result = mysqli_query($conn, "SELECT * FROM `thingstodo`");

        header('Location: http://localhost/phpproject1/ListToDo.php');
    }
    if (isset($_POST['Save']))
    {
        $firstText=$_SESSION['title'];
        $secondText=$_SESSION['des'];


        $query = mysqli_query($conn, "INSERT INTO `thingstodo` VALUES ('$firstText','$secondText')");
        $result = mysqli_query($conn, $query) or die("Error " . mysqli_error($conn));



        mysqli_close($conn);
        header('Location: http://localhost/phpproject1/ListToDo.php');
    }
    ?>
    