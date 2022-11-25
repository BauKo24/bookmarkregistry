// models/bookmarks.php

<?php

class Bookmarks
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }
}