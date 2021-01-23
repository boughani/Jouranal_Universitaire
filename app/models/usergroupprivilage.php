<?php


namespace PHPMVC\Models;


class UserGroupPrivilage extends abstractmodel
{

    public $id;
    public $groupeid;
    public $privilageid;

    protected static $tableName = 'user_groupe_privilage';

    protected static $tableSchema = array(
        'groupeid'         => self::DATA_TYPE_INT,
        'privilageid'    => self::DATA_TYPE_INT
    );

    protected static $primaryKey = 'id';
    public static function getPrivilegesForGroup($groupId)
    {
        $sql = 'SELECT augp.*, aup.privilage FROM ' . self::$tableName . ' augp';
        $sql .= ' INNER JOIN privilage aup ON aup.id = augp.privilageid';
        $sql .= ' WHERE augp.groupeid = ' . $groupId;
        $privileges =  self::get($sql);
        
        $extractedUrls = [];
        if(false !== $privileges) {
            foreach ($privileges as $privilege) {
                
                $extractedUrls[] = $privilege->privilage;
            }
        }
        return $extractedUrls;
       
    }
   
}