<?php

    require_once('functions.php');

    $name = $subject = "";
    $nameErr = $subjectErr = "";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //sanitize
        $name = clean_input($_POST['name']);
        $subject = clean_input($_POST['subject']);

        if(empty($name)){
            $nameErr = "Name is required.";
        }

        if(empty($subject)){
            $subjectErr = "Subject is required.";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Forms</title>
    <style>
        .error{
            color: red;
        }
    </style>
</head>
<body>
    <h2>Form Processing</h2>
    <form action="" method="post">
        <span class="error">* required field</span>
        <br>
        Name: <input type="text" name="name" id="name" value="<?= $name ?>"><span class="error">* <?= $nameErr ?></span>
        <br><br>
        Subject: <input type="text" name="subject" id="subject" value="<?= $subject ?>"><span class="error">* <?= $subjectErr ?></span>
        <br><br>
        <input type="submit" value="Save" id="save">
    </form>

    <h2>Your Input:</h2>
    Name: <?= $name ?>
    <br>
    Subject: <?= $subject ?>
</body>
</html>