<?php


namespace PHPMVC\Models;


class UserProfileModel extends AbstractModel
{
    public $id;
    public $firstname;
    public $lastname;
    public $photo;
    public $phone;
    public $dob;
    protected static $tableName = 'userprofile';

    protected static $tableSchema = array(
        'id'                =>self::DATA_TYPE_INT,
        'firstname'         => self::DATA_TYPE_STR,
        'lastname'          => self::DATA_TYPE_STR,
        'photo'             => self::DATA_TYPE_STR,
        'phone'             => self::DATA_TYPE_INT,
        'dob'               =>self::DATA_TYPE_STR
    );

    protected static $primaryKey = 'id';
}