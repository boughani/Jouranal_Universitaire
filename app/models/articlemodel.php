<?php


namespace PHPMVC\Models;


class ArticleModel extends AbstractModel
{
    public $id;
    public $title;
    public $content;
    public $dofadd;
    public $writter;
    public $categorie;
    public $img;

    protected static $tableName = 'article';

    protected static $tableSchema = array(
        'title'             => self::DATA_TYPE_STR,
        'content'           => self::DATA_TYPE_STR,
        'dofadd'            => self::DATA_TYPE_STR,
        'writter'           =>self::DATA_TYPE_INT,
        'categorie'         =>self::DATA_TYPE_INT ,
        'img'               =>self::DATA_TYPE_STR
    );
    protected static $primaryKey = 'id';
    public static function getNewArticle(){
        $sql = 'select * from '.self::$tableName.' LIMIT 10' ; 
        
        return self::get($sql) ; 
    }
    public function extract(){
        if(strlen($this->content) >20 ){
            return substr($this->content , 0 , 300 ) . '...' ; 
        }else{
            return $this->content . '...' ; 
        }
    }
}