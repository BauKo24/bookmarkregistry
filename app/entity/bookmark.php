<?php

namespace app\entity;

class Bookmark
{
    private $id;
    private $name;
    private $url;
    private $id_user;

    public function getName($name)
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getUrl($url)
    {
        return $this->url;
    }

    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    public function getIDU($id_user)
    {
        return $this->id_user;
    }

    public function setIDU($id_user)
    {
        $this->name = $id_user;

        return $this;
    }

    public function getId()
    {
        return $this->id;
    }
}