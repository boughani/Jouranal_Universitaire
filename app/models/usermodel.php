<?php


namespace PHPMVC\Models;


class userModel extends AbstractModel
{
    public $id;
    public $username;
    public $email;
    public $passwd;
    public $usergroup;

    protected static $tableName = 'users';

    protected static $tableSchema = array(
        'username'         => self::DATA_TYPE_STR,
        'email'            => self::DATA_TYPE_STR,
        'passwd'         => self::DATA_TYPE_STR,
        'usergroup'        =>self::DATA_TYPE_INT
    );

    protected static $primaryKey = 'id';
    public function cryptPassword($password)
    {
        $this->passwd = crypt($password, APP_SALT);
    }
    public static function authenticate ($username, $password, $session)
    {
        $password = crypt($password, APP_SALT) ;
        $sql = 'SELECT *, (SELECT groupename FROM usergroupe WHERE usergroupe.groupeid = ' . self::$tableName . '.usergroup) groupename FROM ' . self::$tableName . ' WHERE username = "' . $username . '" AND passwd = "' .  $password . '"';
        $foundUser = self::getOne($sql);
       
        if(false !== $foundUser) {

            $foundUser->profile = UserProfileModel::getByPK($foundUser->id);

            $foundUser->privileges = UserGroupPrivilage::getPrivilegesForGroup($foundUser->usergroup);
            $q=UserGroupPrivilage::getPrivilegesForGroup($foundUser->usergroup);
            $session->u = $foundUser;
            return 1;
        }
        return false;
    }
}