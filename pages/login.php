<?php

require_once DIR . 'db/connect.php';

// $psw = md5("1234");
// $sql = "INSERT INTO users (user, password) VALUES ('Jonas', '$psw')";
// $stmt = $pdo->query($sql);

$wrongLogin = '';
if(!empty($_POST)) {

    $name = $_POST['name'];
    $psw = md5($_POST['psw']);

    $sql = 'SELECT * FROM users';
    $stmt = $pdo->query($sql);
    while ($row = $stmt->fetch())
    {
        if($row['user'] == $name) {
            if($row['password'] == $psw) {
                $_SESSION['login'] = 1;
                $_SESSION['name'] = $row['user'];
                header('Location: '. $mainUrl . $additionallUrl .'?p=main');
                die;
            }

        }
    }
    $wrongLogin = 'Wrong name or password!';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
    <div class="login">
        <h1>Sveiki. Prisijunkite!</h1>
        <h1>Vardas: Jonas Slaptažodis: 1234</h1>
        <form action="" method="post">
            <label for="name">Vardas:</label>
            <input type="text" name="name">
            <label for="psw">Slaptažodis:</label>
            <input type="password" name="psw">
            <button type="submit">Jungtis</button>
        </form>
        <p style="color: red; font-size: 18px"><?= $wrongLogin ?></p>
    </div>
</body>
</html>