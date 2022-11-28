<?php

class AppController
{

    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    private function render($template, $params)
    {
        extract($params);
        include(__DIR__ . '/../views/' . $template . '.php');
    }

}