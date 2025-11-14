<?php

session_start(); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reversor de String</title>
</head>
<body>
<form action="reverse.php" method="post">
    <label for="reverse">Enter a string: </label>
    <input type="text" id="reverse" name="reverse" required>
    <button>Submit</button>
    <?php if (isset($_SESSION['reverse']) && strlen($_SESSION['reverse']) > 0): ?>
        <h2>Processed String:</h2>
        <p><?= $_SESSION['reverse'] ?></p>
    <?php endif ?>
</form>
</body>
</html>