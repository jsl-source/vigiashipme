<?php
   class Conexion{

        protected $conexion_db;

        function __construct()
        {
            try{
                $this->conexion_db=new PDO('mysql:host=localhost; dbname=ascqobmy_vigiashipme','root','');
                $this->conexion_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->conexion_db->exec("SET CHARACTER SET utf8");
                return $this->conexion_db;
            }catch(Exception $e){
                echo "Error en la linea " . $e->getLine();
            }
            
        }

   }
   

?>
