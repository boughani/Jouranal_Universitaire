<?php


namespace PHPMVC\Models;


class CategrieModel extends AbstractModel
{
    public $id;
    public $name;


    protected static $tableName = 'categorie';

    protected static $tableSchema = array(
        'name'         => self::DATA_TYPE_STR
    );

    protected static $primaryKey = 'id';

}