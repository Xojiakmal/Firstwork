<?php
session_start();

$_SESSION['son'] = null;

if (!isset($_POST['son1'])) {
    $_POST['son1'] = 1;
}
$_POST['son1']++;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <form action="README.md" method="POST">
            <h3>Summa kiriting</h3>
            <input type="number" name="pul">
            <button type="submit" name="tugma" value="k">Kiritish</button>
        </form>
    </div>
</body>
</html>
