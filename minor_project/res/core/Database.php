<?php 

/**
 * Databse Connection class
 */
class Database
{
	private $db;
    /**
     * summary
     */
    public static function connect()
    {
        try {
        	$db = new PDO("pgsql:dbname=db;port=5432;host=localhost", "postgres","123456");
        	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
        	echo '<br>Error  : '.$e->getMessage();
        }
        return $db;
    }

    
}


 ?>