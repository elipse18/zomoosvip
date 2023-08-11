
 

 <?php
    class Conectar{
        public static function conexion(){
            try{
                $conexion = new PDO('mysql:host=localhost; dbname=zomosvip;port=3306', 'datasis', '');
                $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $conexion->exec("SET CHARACTER SET UTF8");
            }catch(Exception $e){
               echo("Error al conectar " . $e->getMessage());
                echo "Linea del error " . $e->getLine();
            }
            return $conexion;
        }
    }


    // class Conexion {
    //     private $host ="localhost";
    //     private $user = "datasis";
    //     private $password = "";
    //     private $db = "zomosvip";
    //     private $conect;
    
    //     public function __contruct(){
    //         $connection = "mysql:host=".$this->host.";dbname=".$this->db.";charset=utf8";
    
    //         try{
    //             $this->conect = new PDO($connection,$this->user,$this->password);
    //             $this->conect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXECPTION); 
    
    //         }catch(Exeption $e){
    //             $this->conect ='Error de conexcion';
    //             echo "ERROR:". $e->getMessage();
    //         }
    //     }
    //  } 