<?php

    require "Conexion.php";


    class InsertarDatosGuia extends Conexion{

        function __construct()
        {
            parent::__construct();   
        }

        
    
        function InsertaGuia($arreglo_guia){

      

            for($i=0;$i<count($arreglo_guia);$i++){
                    
                $consulta[]="INSERT INTO ".
                "track (ID_CARGA, ".
                "GENERADOR_CARGA, ".
                "ORDEN, ".
                "IDCLIENTE, ".
                "NOMBRE, ".
                "DIRECCION, ".
                "BARRIO, ".
                "CIUDAD, ".
                "DEPARTAMENTO, ".
                "CELULAR, ".
                "PESO, ".
                "VOLUMEN, ".
                "OBSERVACION, ".
                "FECHA_CARGA, ".
                "USUARIO_CARGA, ".
                "MARCA, ".
                "NRO_GUIA, ".
                "NRO_CARGA, ".
                "MICRO_ZONA_ID, ".
                "ZONA_TMS_ID, ".
                "MACRO_ZONA_ID, ".
                "RUTA, ".
                "SECUENCIA, ".
                "FECHA_ASIGNA_RUTA, ".
                "USUARIO_ASIGNA_RUTA, ".
                "NAME, ".
                "FECHA_ASIGNA_NODE, ".
                "USUARIO_ASIGNA_NODO, ".
                "ESTADO_RUTA, ".
                "NRO_CAJA, ".
                "DIRECCION_STANDARIZADA, ".
                "TMS_NOVEDADID, ".
                "VALOR_DECLARADO, ".
                "FECHA_ESTADO, ".
                "USUARIO_ESTADO, ".
                "ADICIONAL_3, ".
                "ADICIONAL_4, ".
                "AL) ".
                "VALUES ( ".
                $arreglo_guia[$i]["ID_CARGA"] .",".
                $arreglo_guia[$i]["GENERADOR_CARGA"].",".
                "'".$arreglo_guia[$i]["ORDEN"]."',".
                "'".$arreglo_guia[$i]["IDCLIENTE"]."',".
                "'".$arreglo_guia[$i]["NOMBRE"]."',".
                "'".$arreglo_guia[$i]["DIRECCION"]."',".
                "'".$arreglo_guia[$i]["BARRIO"]."',".
                "'".$arreglo_guia[$i]["CIUDAD"]."',".
                "'".$arreglo_guia[$i]["DEPARTAMENTO"]."',".
                "'".$arreglo_guia[$i]["CELULAR"]."',".
                "'".$arreglo_guia[$i]["PESO"]."',".
                "'".$arreglo_guia[$i]["VOLUMEN"]."',".
                "'".$arreglo_guia[$i]["OBSERVACION"]."',".
                "'".$arreglo_guia[$i]["FECHA_CARGA"]."',".
                "'".$arreglo_guia[$i]["USUARIO_CARGA"]."',".
                $arreglo_guia[$i]["ERROR"] .",".
                $arreglo_guia[$i]["NRO_GUIA"] .",".
                $arreglo_guia[$i]["NRO_CARGA"] .",".
                $arreglo_guia[$i]["MICRO_ZONA_ID"] .",".
                $arreglo_guia[$i]["ZONA_TMS_ID"] .",".
                $arreglo_guia[$i]["MACRO_ZONA_ID"] .",".
                $arreglo_guia[$i]["RUTA"] .",".
                $arreglo_guia[$i]["SECUENCIA"] .",".
                "'".$arreglo_guia[$i]["FECHA_ASIGNA_RUTA"]."',". 
                "'".$arreglo_guia[$i]["USUARIO_ASIGNA_RUTA"]."',".
                "'".$arreglo_guia[$i]["NAME"]."',". 
                "'".$arreglo_guia[$i]["FECHA_ASIGNA_NODE"]."',". 
                "'".$arreglo_guia[$i]["USUARIO_ASIGNA_NODO"]."',".
                "'".$arreglo_guia[$i]["ESTADO_RUTA"]."',". 
                $arreglo_guia[$i]["NRO_CAJA"] .",". 
                "'".$arreglo_guia[$i]["DIRECCION_STANDARIZADA"]."',".
                "'".$arreglo_guia[$i]["TMS_NOVEDADID"]."',". 
                round($arreglo_guia[$i]["VALOR_DECLARADOR"],0).",". 
                "'".$arreglo_guia[$i]["FECHA_REGISTRO"]."',".
                "'".$arreglo_guia[$i]["USUARIO"]."',".
                "'".$arreglo_guia[$i]["mensaje"]."',".
                "'',".
                "'');";

                $ins=$consulta[$i];
                $resulset=$this->conexion_db->prepare($ins);
                $resulset->execute();
                
                }

        }

        function ObtieneGuia($nro_guia){
            $consulta="select * from track where NRO_GUIA=:s_guia order by FECHA_ESTADO DESC";
            $resulset=$this->conexion_db->prepare($consulta);
            $resulset->execute(array("s_guia"=>$nro_guia));
            $registro=$resulset->fetch(PDO::FETCH_ASSOC); 


            return $registro;
            

        }

        function ErrorSinGuia($nro_guia){


            $registro=array("ID_CARGA"=>0,	"GENERADOR_CARGA"=>0,	"ORDEN"=>'',	"IDCLIENTE"=>'',	"NOMBRE"=>'',	"DIRECCION"=>'',	"BARRIO"=>'',	"CIUDAD"=>'',	"DEPARTAMENTO"=>'',	"CELULAR"=>'',	"PESO"=>'',	"VOLUMEN"=>'',	"OBSERVACION"=>'',	"FECHA_CARGA"=>'',	"USUARIO_CARGA"=>'',	"MARCA"=>0,	"NRO_GUIA"=>' '.$nro_guia. ' no existe. ',	"NRO_CARGA"=>0,	"MICRO_ZONA_ID"=>0,	"ZONA_TMS_ID"=>0,	"MACRO_ZONA_ID"=>0,	"RUTA"=>0,	"SECUENCIA"=>0,	"FECHA_ASIGNA_RUTA"=>'',	"USUARIO_ASIGNA_RUTA"=>'',	"NAME"=>'',	"FECHA_ASIGNA_NODE"=>'',	"USUARIO_ASIGNA_NODO"=>'',	"ESTADO_RUTA"=>'',	"NRO_CAJA"=>'',	"DIRECCION_STANDARIZADA"=>'',	"TMS_NOVEDADID"=>'',	"VALOR_DECLARADO"=>'',	"FECHA_ESTADO"=>'',	"USUARIO_ESTADO"=>'',	"ADICIONAL_3"=>'',	"ADICIONAL_4"=>'',	"AL"=>'');
            return $registro;

        }



    }

   
?>