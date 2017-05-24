<?php 

/**
 * summary
 */
class AdminDao
{
    /**
     * summary
     */
    private $dbcon;
    public function __construct()
    {
        require_once 'Database.php';
        $this->dbcon = Database::connect();
    }
}


 ?>