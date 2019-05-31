<?php
$arr = array(
    "id" => $_GET['id'],
    "tovar" => $_GET['tovar'],
    "shortop" => $_GET['shortop'],
    "long_text" => $_GET['long_text'],
    "onskladt" => $_GET['onsklad'],
    "zakaz" => $_GET['zakaz'],
);
echo $arr['zakaz'];
?>
<form action="route.php" method="post">
    <input type="hidden"  name="update" "/><br>
    <input type="number" name="id" value="<?php echo $arr['id'];?>">
    Наименование товара: <input type="text" name="name" value="<?php echo $arr['tovar'];?>"/><br>
    Крткое описание: <input type="text" name="short" value="<?php echo $arr['shortop'];?>"/><br>
    Полное описание: <input type="text" name="long" value="<?php echo $arr['long_text'];?>"/><br>
    Количесто на складе: <input type="number" name="countonsklad" value="<?php echo $arr['onskladt'];?>"/><br>
    Возможность заказать: <input type="number" name="zakaz" value="<?php echo $arr['zakaz'];?>"/><br>
    <input type="submit" value="Отправить"/>
</form>
