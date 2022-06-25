<?php
require_once __DIR__."/Shop.php";

$shop = new Shop();
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LAB2</title>
    <script src = "script.js"></script>
</head>
<body>
<form action="" method="post">
    <input type="submit" value="Производители" name="vendor"><br>

</form>
<br>
<form action="" method="post">
    <input type="submit" value="Отсутствующие товары" name="items"><br>

</form>
<br>
<form action="" method="post">
    <input placeholder="Min price:" type="text" name="minPrice">
    <input placeholder="Max price:" type="text" name="maxPrice">
    <input type="submit" value="Найти"><br>

</form>

<button onclick="LoadData()">Загрузить</button>
<button onclick="SaveData()">Сохранить</button>

<div id="savedContent"></div>

<?php
if (isset($_POST["vendor"])) {
    $shop->vendor();
} elseif (isset($_POST["items"])) {
    $shop->absent();
} elseif (isset($_POST["minPrice"])) {
    $shop->price();
}
?>
</body>
</html>
