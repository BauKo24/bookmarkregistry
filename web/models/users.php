// models/users.php

<?php

class Users
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }
}