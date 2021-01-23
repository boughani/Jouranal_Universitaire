<?php


namespace PHPMVC\Models;


class EventesModel extends AbstractModel
{
    public $id;
    public $evenement;
    public $dateofadd;
    public $categorie ; 
    public $done ; 
    public $user_id;


    protected static $tableName = 'eventes';

    protected static $tableSchema = array(
        'evenement'         => self::DATA_TYPE_STR  ,
        'dateofadd'         => self::DATA_TYPE_STR , 
        'categorie'         => self::DATA_TYPE_INT, 
        'done'              => self::DATA_TYPE_INT,
        'user_id'           => self::DATA_TYPE_INT
    );

    protected static $primaryKey = 'id';

} 