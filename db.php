<?php

class connectbd
{
    protected $datab;
    /*Подключаемся к базе*/

    public function __construct($username = "root", $password = "", $host = "localhost", $dbname = "catalog-site")
    {


        try {
            $option = [
                //PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];
            $this->datab = new PDO("mysql:host={$host}; dbname={$dbname}; charset=utf8", $username, $password, $option);
        } catch
        (PDOException $e) {
            throw new Exception($e->getMessage());
            echo 'error';
        }

    }

    public function selestall(){
        $in = $this->datab->query('SELECT * FROM goods');
        $dat = $in->fetchAll(PDO::FETCH_UNIQUE);
        foreach ($dat as $key){
           if(is_array($key) == FALSE){

                unset($dat[$key]);
            }
        }
        return $dat;
    }



    public function upbase($param)
    {
        //UPDATE goods set tovar_name =:tovar_name, short_text =:short_text, long_text =:long_text, onsklad =:onsklad, zakaz =:zakaz WHERE ID=:id')
        echo $param['id'];
$in=$this->datab->prepare("UPDATE goods set tovar_name =:tovar_name, short_text =:short_text, long_text =:long_text, onsklad =:onsklad, zakaz =:zakaz WHERE ID=:id");
$in->execute(array(
    ':id'=>(int)$param['id'],
    ':tovar_name'=>$param['tovar_name'],
    ':short_text'=>$param['short_text'],
    ':long_text'=>$param['long_text'],
    ':onsklad'=>(int)$param['onsklad'],
    ':zakaz'=>(int)$param['zakaz']));
    }
    public function delbase($param)
    {
        echo $param;
    $in=$this->datab->prepare('DELETE FROM goods WHERE id = ?');
    $in->execute(array($param));

    }
    public function dellcat($param){
        $id = $this->datab->prepare('SELECT tovar_name FROM goods WHERE id = ?');
        $id->execute(array($param));
        $delcategory = $this->datab->prepare('DELETE FROM catalog_goods WHERE name_tovar = ?');
        $lol = $id->fetchAll(PDO::FETCH_ASSOC);
        var_dump($lol);
        foreach ($lol as $key=>$value){
             $lol[$key]['tovar_name'];
           $delcategory->execute(array($lol[$key]['tovar_name']));
        }
        $delcategory->execute($key['tovar_name']);
    }
    public function adbase($param)
    {
    $stmt = $this->datab->prepare("INSERT INTO goods (tovar_name, short_text, long_text, onsklad) VALUE (:name, :short_text, :long_text,:onsklad)");
    $stmt->execute(array( ':name'=>$param[1], ':short_text'=>$param[2],':long_text'=>$param[3], ':onsklad'=>$param[4]));

    }
    public function adbasecategory($param){
        $stmt = $this->datab->prepare("INSERT INTO catalog_goods (name_category, name_tovar) VALUE (:name_category, :tovar_name)");
        $stmt->execute(array(':name_category'=>$param[0], ':tovar_name'=>$param[1]));
    }
    public function addcategory($param)
    {
        $stmt = $this->datab->prepare("INSERT INTO category (name, short_text, long_text, active) VALUE (:name, :short_text, :long_text,:active)");
       // var_dump($param);
        $stmt->execute(array(
            ':name'=>$param['name'],
            ':short_text'=>$param['short_text'],
            ':long_text'=>$param['long_text'],
            ':active'=>(int)$param['active']
        ));
    }
    public function selectallcategory(){
        $in = $this->datab->query('SELECT * FROM category');
        $dat = $in->fetchAll(PDO::FETCH_UNIQUE);
        foreach ($dat as $key){
            if(is_array($key) == FALSE){

                unset($dat[$key]);
            }
        }
        return $dat;
    }

}
$lil = new connectbd();
//$lil->selestbase(2);

//$lil->selestall();

?>