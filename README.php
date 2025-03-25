<?php
session_start();

function kirish(){
    if ($_POST['birinchi'] == 'K') {
        $_SESSION["aa001aa"] = $_POST["First_money"];
        array_pop($_POST);
    }
}
function kiritish(){
    $_SESSION['aa001aa'] = $_SESSION['aa001aa'] + $_POST['pul'];
}
function yechish(){
    $_SESSION['aa001aa'] = $_SESSION['aa001aa'] - $_POST['pul'];
}
function chek(){
    $a = fopen("chek.txt", 'a');
    if ($_POST['tugma'] == 'k') {
        $_SESSION['nomer']++;
        fwrite($a, "\n");
        fwrite($a, $_SESSION['nomer']."-Sana:".date("d.m.Y H:i:s")."\n"."Hisobga qo'shilgan pul:".$_POST['pul']."$\n"."Hisobda pul qoldi:".$_SESSION['aa001aa']."$\n");
        fclose($a);
    }else{
        $_SESSION['nomer']++;
        fwrite($a, "\n");
        fwrite($a, $_SESSION['nomer']."-Sana:".date("d.m.Y H:i:s")."\n"."Hisobdan yechilgan pul:".$_POST['pul']."$\n"."Hisobda pul qoldi:".$_SESSION['aa001aa']."$\n");
        fclose($a);
    }
}
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
        <?
        kirish();
        if (!isset($_SESSION['aa001aa'])) {?>
            <form action="" method="POST">
                <h1>Hisobingizda qancha pul bo'lsin</h1>
                <input type="number" name="First_money">
                <button type="submit" name="birinchi" value="K">Kiritish</button>
            </form>
        <?}else{
            if (isset($_POST['pul']) and $_POST["tugma"] == "k" and !isset($_SESSION['son']) and $_POST['pul'] > 0) {
                kiritish();
                chek();
                $_SESSION['son'] = 'on';
            }elseif(isset($_POST['pul']) and $_POST["tugma"] == "y" and ($_SESSION['aa001aa'] >= $_POST["pul"] and !isset($_SESSION['son']) and $_POST['pul'] > 0)) {
                yechish();
                chek();
                $_SESSION['son'] = 'on';
            }?>
            <div class="">
                <h3>Hisobingizda</h3>
                <?=$_SESSION["aa001aa"]?>
            </div>
            <div class="">
                <form action="kiritish.php" method="POST">
                    <button type="submit">Pul kiritish</button>
                    <input type="hidden" name="son1" value="<?$_POST['son1']?>">
                </form>
                <form action="yechish.php" method="POST">
                    <button type="submit">Pul yechish</button>
                    <input type="hidden" name="son1" value="<?$_POST['son1']?>">
                </form>
            </div>
        <?}?>
    </div>
</body>
</html>
