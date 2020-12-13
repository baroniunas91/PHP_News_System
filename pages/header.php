<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accounts list</title>
    <link rel="stylesheet" href="./assets/css/jquery.datetimepicker.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
    <div class="header">
        <p class="employee"><?= $_SESSION['name']?> prisijungęs</p>
        <div class="links">
            <form action="" method="get">
                <button class="header-button" type="submit" name="logout" value="1">Atsijungti</button>
            </form>
        </div>
    </div>