<?php
require_once 'route.php';
require_once 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Главная</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/js/bootstrap.min.js" rel="script/js">
    <link href="style.css" rel="stylesheet">
    <script src="query.js"></script>
</head>
<body>
<div class="container-fluid">
    <div class="row" id="header">

        <div class="col-xs-2 col-md-1">
            <img id="logo" src="logo2.png" class="img-responsive"/>
        </div>
        <div class="col-xs-10 col-md-11">
            <h1> <p class="text-center"> Интеренет магазин компьютерных комплетующих</p></h1>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-2 col-md-3">

        </div>
        <div class="col-xs-8 col-md-6">
            <nav class="navbar navbar-inverse">
                <div class="container">
                    <ul class="nav navbar-nav center-block">
                        <li class="active"><a href="admin.php">Главная<span class="sr-only">(current)</span></a></li>
                        <li><a href="categorii.php">Категории</a></li>
                        <li><a href="#">Отзывы</a></li>
                        <li><a href="#">О нас</a></li>
                    </ul>
                </div>
        </div>
    </div>
</div>
</nav>
<div class="row">

    <div class="col-sm-6 col-md-4 text-center bottom blockzap">
    <a href="addbase.php">
            <img src="plus.png" id="addimage"/>

    </a>
        добавить товар
    </div>
    <div class="col-sm-6 col-md-4 text-center bottom blockzap">
        <a href="addcategori.php">
            <img src="plus.png" id="addimage"/>
        </a>
        Добавить категорию
    </div>
    <?php
    $all->foradmin($lil);

    ?>


</div>
</div>
<script>
    var flex = function () {
        $(this).ready(function () {
            $('.blockzap').click(function () {
                var d = $(this).attr("id");
                $(location).attr('href','Polnoeopisanie.php?id='+d);
            })


        })


    }
</script>
</body>



</html>
