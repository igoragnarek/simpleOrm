<?php

namespace Model;

use Model\ActiveRecord;

class Article extends ActiveRecord
{
    protected $name;

    protected $text;

    //protected $date;



    protected static function getTableName()
    {
        return 'articles';
    }

    public function getName()
    {
        return $this->name;
    }

    public function getText()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setText($text)
    {
        $this->text = $text;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }
}