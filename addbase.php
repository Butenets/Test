<?php
require_once 'route.php';
require_once 'db.php';
?>
<form action="route.php" method="post">
    <input type="hidden"  name="insert" "/><br>
    <?php
    $all->selectnamecategory($lil);?>
    Наименование товара: <input type="text" name="name"/><br>
    Крткое описание: <input type="text" name="short"/><br>
    Полное описание: <input type="text" name="long"/><br>
    Количесто на складе: <input type="number" name="number"/><br>
    <input type="submit" value="Отправить"/>
</form>