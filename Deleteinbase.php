<?php $num = $_GET['id'];?>
<form action="route.php" method="post">
    <input type="number" name="del" value="<?php echo $num;?>"/><br>
    <input type="submit" value="Удалить">
</form>
