<?php


namespace PHPMVC\Models;


class userGroupModel extends abstractmodel
{

    public $groupeid;
    public $groupename;


    protected static $tableName = 'usergroupe';

    protected static $tableSchema = array(

        'groupename'    => self::DATA_TYPE_STR
    );

    protected static $primaryKey = 'groupeid';
}