<?php

namespace Model;

use Db\Db;

abstract class ActiveRecord
{
    protected $id;

    public static function getById($id)
    {
        $db = new Db;
        $entity = $db->query(
            "SELECT * FROM " . static::getTableName() . " WHERE id = :id ",
            [':id' => $id],
            static::class
        );

        return $entity ? $entity[0] : null;
    }

    public function save()
    {
        if (isset($this->id)) {
            $this->update();
        } else {
            $this->insert();
        }
    }

    private function update()
    {
        $arrProp = $this->getProperties();

        $sql =  "UPDATE " . static::getTableName() . " SET " . $arrProp['name'] . " WHERE id = " . $this->id;

        $db = new Db;
        $db->query($sql, $arrProp["value"], static::class);
    }

    private function insert()
    {
        $arrProp = $this->getPropertiesIns();

        $sql = "INSERT INTO `" . static::getTableName() . "` (" . $arrProp['name'] . ") VALUES (" . $arrProp['nameInsVal'] . ");";

        $db = new Db;
        $db->query($sql, $arrProp["value"], static::class);
        $this->id = $db->getLastInsertId();
    }

    public function delete()
    {
        $sql = "DELETE FROM " . static::getTableName() . " WHERE id = :id";
        $param = ["id" => "$this->id"];
        
        $db = new Db;
        $db->query($sql, $param, static::class);

        $this->id = null;
    }

    private function getProperties()
    {
        $data = get_object_vars($this);

        $name  = [];
        $value = [];

        foreach($data as $key => $val){
            $pdoKey = ":$key";

            $name[]         = "$key = $pdoKey";
            $value[$pdoKey] = $val;

        }

        $strName     = implode(', ', $name);
        $arrProp = ["name" => $strName, "value" => $value];

        return $arrProp;
    }

    public function getPropertiesIns()
    {
        $data = get_object_vars($this);
        unset($data['id']);

        $name = [];
        $nameVal = [];

        foreach($data as $key => $val){
            $pdoKey = ":$key";
            $value[$pdoKey] = $val;

            $name[]      = "`$key`";
            $nameVal[]      = ":$key";

        }

        $strName  = implode(', ', $name);
        $strNameInsVal  = implode(', ', $nameVal);

        $arrProp = ["value" => $value, "name" => $strName, "nameInsVal" => $strNameInsVal];

        return $arrProp;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    abstract static protected function getTableName();
}

