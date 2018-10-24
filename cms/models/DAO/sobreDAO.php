<?php

//Ações do banco
class sobreDAO {

    //minha classe construtor
    public function __construct(){

    }


    public function insert($classSobre){
        $sql = "insert into ........values ()";
        //mysql_query($sql);
        //$PDO->execute($sql)
        //var_dump = echo para um objeto
        echo($classSobre->titulo);
        echo($classSobre->texto);
    }

     public function selectId(){

    }

     public function selectAll(){

    }

     public function delete(){

    }

     public function update(){

    }

}

?>
