<?php
class Database {
    private static $instance;
    private $connection;

    private function __construct() {
        $servername = '127.0.0.1';
        $username = 'root';
        $password = '';
        $dbname = 'task_db';

            // connection
            $this->connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            /* pour verifier la connexion 
             setAttribute : permet a configurer l'attribut de connexion ou de gestionaire de la base de données "MySQL"
             ATTR_ERRMODE : permet de donner un rapport d'erreur, qui offre 3 possibilités d'utilisation 
             ERRMODE_EXEPTION : permet de maitre une exception au cas d'erreur  (message d'erreur explicite)
             ERRMODE WARNING : permet de maitre une alerte de type warning 
             ERRMODE SILENT : permet d'assigner les codes d'erreurs 
             */
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "success <br>";
    }

    public static function getInstance() {
        /*self est utilisé pour accéder aux éléments statiques de la classe.Il est utilisé à l'intérieur d'une classe pour faire référence à la classe elle-même*/ 
        /*La première fois que getInstance() est appelée, il vérifie si la variable statique self::$instance est déjà définie. Si ce n'est pas le cas, il crée une nouvelle instance de la classe Database avec new self().*/
        if (!self::$instance) {
            // Ensuite, il stocke cette instance nouvellement créée dans la variable statique self::$instance.
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->connection;
    }
}




