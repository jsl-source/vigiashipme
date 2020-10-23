<?php        
 require "servicio.php";
 require "InsertarDatosGuia.php";
 $guia=$_GET['guia'];
 $serv=new curlRequest();
 $serv->sendPost($guia);
 $insDat=new InsertarDatosGuia();
 $registro=$insDat->ObtieneGuia($guia);
 $dataws=$serv->getPost();
 if(!$registro){
      if($dataws[0]['NRO_GUIA']=="La guia consultada no existe."){
           $registro=$insDat->ErrorSinGuia($guia);
           $val=json_encode($registro);
           return $val;
        }else{

            $insDat->InsertaGuia($dataws);
            $registro=$insDat->ObtieneGuia($guia);
            $val=json_encode($registro);
            return $val;
        }
}else{

    $insDat->EliminaGuia($guia);
    $insDat->InsertaGuia($dataws);
    $registro=$insDat->ObtieneGuia($guia);
    $val=json_encode($registro);
    return $val;
}


?>