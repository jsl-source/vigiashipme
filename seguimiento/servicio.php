<?php
class curlRequest{

        var $arreglo=array();

        public function sendPost($n_guia){
            
            //API URL
            $url ="http://jobapi.co/tms_interfase/RestServiceImpl.svc/json/interfaz_detalle_guia" ;
            
            //create a new cURL resource
            $ch = curl_init($url);
            
            //setup request to send json via POST
            $data = array(
               "nro_guia" =>$n_guia,
               "key"=>"ba6a2919380b569a61770415794af105"
            );
            $guia = json_encode($data);
            
            //attach encoded JSON string to the POST fields
            curl_setopt($ch, CURLOPT_POSTFIELDS, $guia);
            
            //set the content type to application/json
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
            
            //return response instead of outputting
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            
            //execute the POST request
            $response = curl_exec($ch);
            
            //close cURL resource
            curl_close($ch);

            if(!$response) 
            {
                return false;
                
            }else{

                 $rastreo=json_decode($response,true);
                 foreach($rastreo as $valor){
                    foreach($valor as $clave1=>$valor1){
                        foreach($valor1 as $valor2){
                            foreach($valor2 as $clave3=>$valor3){
                        
                                $this->arreglo[$clave1][$clave3]=$valor3;
                                
            
                            }
                        }
                    }
                }
            }

            foreach($this->arreglo as $key=>$val){

                if($this->arreglo[$key]['mensaje']=='OK'){

                    switch($this->arreglo[$key]['ESTADO_RUTA' ]){
                        case 'E':
                            $this->arreglo[$key]['ESTADO_RUTA' ]='ENTREGADO';
                        break;
                        case 'D':
                            $this->arreglo[$key]['ESTADO_RUTA' ]='CON NOVEDAD';
                        break;
                        case 'A':
                            $this->arreglo[$key]['ESTADO_RUTA' ]='EN REPARTO';
                        break;
                    }
                    switch($this->arreglo[$key]['TMS_NOVEDADID' ]){
                        case 1:
                            $this->arreglo[$key]['TMS_NOVEDADID' ]='ENTREGA EXITOSA';
                        break;
                        case 2:
                            $this->arreglo[$key]['TMS_NOVEDADID' ]='DIRECCION ERRADA/IMCOMPLETA';
                        break;
                        case 3:
                            $this->arreglo[$key]['TMS_NOVEDADID' ]='DESTINATARIO NO LOCALIZADO';
                        break;
                        case 4:
                            $this->arreglo[$key]['TMS_NOVEDADID' ]='RECHAZADO POR EL DESTINATARIO';
                        break;
                        case 5:
                            $this->arreglo[$key]['TMS_NOVEDADID' ]='CAMBIO DE DIRECCION';
                        break;
                        case 6:
                            $this->arreglo[$key]['TMS_NOVEDADID' ]='CONDICIONES CLIMATICAS ADVERSAS';
                        break;
                        case 7:
                            $this->arreglo[$key]['TMS_NOVEDADID' ]='CONDICIONES DE ORDEN PUBLICO';
                        break;
                        case 8:
                            $this->arreglo[$key]['TMS_NOVEDADID' ]='CONDICIONES EXTERNAS';
                        break;
                        case 9:
                            $this->arreglo[$key]['TMS_NOVEDADID' ]='ENTREGADO AL REMITENTE';
                        break;
                    }
    
                        if($this->arreglo[$key]['MACRO_ZONA_ID']==""){
                            $this->arreglo[$key]['MACRO_ZONA_ID']=0;
                        }
                        if($this->arreglo[$key]['ZONA_TMS_ID']==""){
                            $this->arreglo[$key]['ZONA_TMS_ID']=0;
                        }
                        if($this->arreglo[$key]['MICRO_ZONA_ID']==""){
                            $this->arreglo[$key]['MICRO_ZONA_ID']=0;
                        }
                        if($this->arreglo[$key]['RUTA']==""){
                            $this->arreglo[$key]['RUTA']=0;
                        }
                        if($this->arreglo[$key]['SECUENCIA']==""){
                            $this->arreglo[$key]['SECUENCIA']=0;
                        }

                }else{

                    $this->arreglo[$key]['NRO_GUIA']="La guia consultada no existe.";

                }
                
            }


         }

        function getPost(){

                return $this->arreglo;
        }


}   
       
// $adj=new curlRequest();
// $adj->sendPost();
// print_r($adj->getPost());
    
    
?>



