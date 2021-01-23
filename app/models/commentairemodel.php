<?php


namespace PHPMVC\Models;


class CommentaireModel extends AbstractModel
{
    public $id;
    public $article;
    public $content;
    public $writter;
   
   

    protected static $tableName = 'commentaire';

    protected static $tableSchema = array(
        'article'             => self::DATA_TYPE_INT,
        'content'           => self::DATA_TYPE_STR,
        'writter'           =>self::DATA_TYPE_INT
        
    );
    protected static $primaryKey = 'id';
    
    public static function getCommentArticleUser($id ){
        $req = 'select commentaire.content,commentaire.id , users.username ,commentaire.writter from '. static::$tableName . ' , users where article =  '.$id .' and commentaire.writter = users.id '  ; 
        $comments = self::get($req) ; 
        return $comments ; 
        
    }
}