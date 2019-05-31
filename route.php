
<?php
require_once 'db.php';



//$li - new connectbd();
//$lil->adbase($param);
class zapros {
public $data;
    public  function forusers($lil)
    {
        $this->data = $lil->selestall();

        foreach ($this->data as $key=>$value) {

                $this->data[$key];
                ?>
                <div class="col-sm-6 col-md-4 text-center bottom blockzap" id="<?php echo $key;?>" onclick="flex();">
                    <div class="head"></div>
                    <div class="tovar"><?php echo $this->data[$key]['tovar_name']; ?></div>
                    <div class="shortop"><?php echo $this->data[$key]['short_text']; ?></div>
                </div>
                <?php

            }

        }
        public function foradmin($lil){
            $this->data = $lil->selestall();

            foreach ($this->data as $key=>$value) {

                $this->data[$key];
                ?>
                <div class="col-sm-6 col-md-4 text-center bottom blockzap" id="<?php echo $key;?>"  onclick="flex();">
                    <div class="head" id="<?php echo $key;?>"></div>
                    <div class="tovar"><?php echo $this->data[$key]['tovar_name']; ?></div>
                    <div class="shortop"><?php echo $this->data[$key]['short_text']; ?></div>
                    <FORM class="delete" action="Deleteinbase.php"method="get"><input type="number" value="<?php echo $key;?>" name="id" hidden>
                    <input type="submit" value="Удалить"></FORM>
                    <FORM class="update" action="update.php"method="get"><input type="number" value="<?php echo $key;?>" name="id" hidden>
                        <input type="text" value="<?php echo $this->data[$key]['tovar_name']; ?>" name="tovar" hidden>
                        <input type="text" value="<?php echo $this->data[$key]['short_text']; ?>" name="shortop" hidden>
                        <input type="text" value="<?php echo $this->data[$key]['long_text']; ?>" name="long_text" hidden>
                        <input type="number" value="<?php echo $this->data[$key]['onsklad']; ?>" name="onsklad" hidden>
                        <input type="number" value="<?php echo $this->data[$key]['zakaz']; ?>" name="zakaz" hidden>
                        <input type="submit" value="Редактировать"></FORM>

                </div>
                <?php

            }

        }

 public function forfull($param, $lil){
     $this->data = $lil->selestall();
     ?>
<div class="col-xs-1 col-md-2"></div>
<div class="col-xs-10 col-md-8">
    <div class="header">Категория->Товар</div>
    <div class="img_fon text-center"><h1>Фото отсутствует</h1></div>
    <div class="tovar_name"><?php echo $this->data[$param]['tovar_name']?></div>
    <div class="long_text"><?php echo $this->data[$param]['long_text']?></div>
    <div class="onsklad">Товары на складе:<?php echo $this->data[$param]['onsklad']?></div>
    <div class="zakaz">Доступно для заказа:<?php echo $this->data[$param]['zakaz']?></div>
</div>
     <div class="col-xs-1 col-md-2"></div>
<?php
 }

public function selectallcategory($lil){
    $this->data = $lil->selectallcategory();
    foreach ($this->data as $key=>$value){
        ?>
        <div class="col-xs-1 col-md-2"></div>
        <div class="name_categor"><?php echo $this->data[$key]['name']?> </div>
        </div>

        <?php


    }

}
    public function selectnamecategory($lil){
        $this->data = $lil->selectallcategory();
        ?>
        <select name="category"> <?php
        foreach ($this->data as $key=>$value){
            ?>
            <option value="<?php echo $this->data[$key]['name']?>"><?php echo $this->data[$key]['name']?></option>


            <?php


        }
?>
</select>
<?php
    }
    public function insert($lil, $param){
        echo $param[0];
        $lil->adbase($param);
        $lil->adbasecategory($param);
    }
    public function dele($lil, $param){
        $lil->dellcat($param);
        $lil->delbase($param);
    }
    public function update($lil, $param){
        $lil->upbase($param);
    }
    public function addcategory($lil, $param){
        $lil->addcategory($param);

    }
}
if (isset($_POST ['insert'])){
    $param= [$_POST['category'], $_POST['name'], $_POST['short'], $_POST['long'], $_POST['number']];
    $lol = new zapros();
    $lol->insert($lil, $param);
};
if (isset($_POST ['del'])){
    $param = $_POST['del'];
    $lol = new zapros();
    $lol->dele($lil, $param);
};
if(isset($_POST ['update'])){
$param = array(
        'id'=>$_POST['id'],
    'tovar_name'=>$_POST['name'],
    'short_text'=>$_POST['short'],
    'long_text'=>$_POST['long'],
    'onsklad'=>$_POST['countonsklad'],
    'zakaz'=>$_POST['zakaz']
);
$lol = new zapros();
$lol->update($lil, $param);
}
if(isset($_POST['addcategori'])){
    $param = array(
        'name'=>$_POST['name'],
        'short_text'=>$_POST['short_text'],
        'long_text'=>$_POST['long_text'],
        'active'=>$_POST['active']
    );
   $lol = new zapros();
   $lol->addcategory($lil, $param);
}
$all = new zapros();
?>