<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    session_start();

    $user = $_POST['user'];
    $pass = $_POST['pass'];

    if($user == "admin" && $pass == "stxlii123"){
        $_SESSION['login'] = true;
        header("Location: list.php");
    } else {
        echo "<script>alert('Login gagal!');history.back();</script>";
    }
    ?>

</body>
</html>