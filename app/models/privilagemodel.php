<?php


namespace PHPMVC\Models;


class privilageModel extends abstractmodel
{

    public $id;
    public $privilage;
    public $privilagename;

    protected static $tableName = 'privilage';

    protected static $tableSchema = array(
        'privilage'         => self::DATA_TYPE_STR,
        'privilagename'    => self::DATA_TYPE_STR
    );

    protected static $primaryKey = 'id';
}