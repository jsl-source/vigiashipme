<?php

    $guia=$_GET['guia'];

    try{
        //$base=new PDO('mysql:host=localhost; dbname=ascqobmy_vigiashipme','ro','Jhon2020*');
        $base=new PDO('mysql:host=localhost; dbname=ascqobmy_vigiashipme','root','');
        $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $base->exec("SET CHARACTER SET utf8");
  
        $sql="select * from track where NRO_GUIA=:s_guia";

        $resultado=$base->prepare($sql);
        $resultado->execute(array("s_guia"=>$guia)); 
        
        $registro=$resultado->fetch(PDO::FETCH_ASSOC);  
  

        if(!$registro){

            $registro= array('resp'=>"Guía no registrada.");
            echo json_encode($registro);

        }else{
            
            echo json_encode($registro);
            
        }

    }catch(Exception $e){

        die('Error: ' . $e->getMessage());

    }finally{

        $base=null;

    }

    sleep(3);


?>