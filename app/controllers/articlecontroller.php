<?php


namespace PHPMVC\Controllers;

use PHPMVC\LIB\Helper;
use PHPMVC\LIB\InputFilter;
use PHPMVC\lib\FileUpload ;
use PHPMVC\Models\ArticleModel;
use PHPMVC\Models\CategrieModel;
use PHPMVC\Models\CommentaireModel ; 

class articlecontroller extends AbstractController
{
    use inputfilter ;
    use Helper ;
    public function defaultAction()
    {
        $article = ArticleModel::getAll() ;
        $this->_data['articles'] = $article;
        $this->_view();
    }
    public function addAction(){
        $cats = CategrieModel::getAll() ;
        $this->_data['cats'] =$cats ;
        $uploadError = false;
        if (!empty($_POST)){

            $article = new ArticleModel() ;
            $article->title = $this->filterString($_POST['title']);
            $article->content = $_POST['content'] ;
            $article->dofadd = date('Y-m-d H:m:s') ;
            $article->writter = $this->_registry->session->u->id;
            $article->categorie = $this->filterInt($_POST['cat']) ;
             if(!empty($_FILES['img']['name'])){
                 $uploader = new FileUpload($_FILES['img']);
                 try {
                    $uploader->upload() ;
                    $article->img = $uploader->getFileName() ;
                 }catch(\Exception $e){
                     $this->messenger->add($e->getMessage(), $this->messenger::APP_MESSAGE_ERROR);
                     $uploadError = true;
                 }

             };
            if ($uploadError === false && $article->save()){
                $this->messenger->add('article et bien ajoute') ;
                $this->redirect('/article');
            }else{
                $this->messenger->add('Une erreur lors de creation de l\'article',$this->messenger::APP_MESSAGE_ERROR) ;
            }
        }
        $this->_view();
    }
    public function editAction(){
        $id = $this->_params[0] ;
        $uploadError=false ;
        $article = ArticleModel::getByPK($id) ;
        $this->_data['article'] = $article ;
        $cats = CategrieModel::getAll() ;
        $this->_data['cats'] =$cats ;
        if (!empty($_POST)){
            $article->title = $this->filterString($_POST['title']);
            $article->content = $_POST['content'] ;
            $article->categorie = $this->filterInt($_POST['cat']) ;
            if (!empty($_FILES["img"]['name'])){
                $file=IMAGES_UPLOAD_STORAGE.DS.$article->img ;
                unlink($file) ;
                $uploader = new FileUpload($_FILES['img']);
                try {
                    $uploader->upload() ;
                    $article->img = $uploader->getFileName() ;
                }catch(\Exception $e){
                    $this->messenger->add($e->getMessage(), $this->messenger::APP_MESSAGE_ERROR);
                    $uploadError = true;
                }

            }
            if ($uploadError === false && $article->save()){
                $this->messenger->add('article et bien modifier') ;
                $this->redirect('/article');
            }else{
                $this->messenger->add('Une erreur lors de de modification  de l\'article',$this->messenger::APP_MESSAGE_ERROR) ;
            }
        }
        $this->_view();
    }
    public function showAction(){
        $id = $this->_params[0] ; 
        $article = ArticleModel::getByPK($this->filterInt($id)) ; 
        
       
       
        $categorie = CategrieModel::getByPK($article->categorie) ;
        if(isset($_POST['com'])){
            $com = new CommentaireModel() ; 
            $com->writter = $this->_registry->session->u->id;
            $com->article = $this->_params[0]  ; 
            $com->content=$_POST['com'] ; 
            if($com->save()){
                $this->messenger->add('votre commentaire est ajoute ') ;
            }
        } 
        $allcoms=CommentaireModeL::getCommentArticleUser($id) ; 
        $this->_data['article'] = $article;
        $this->_data['categorie'] = $categorie;
        $this->_data['allcoms'] = $allcoms; 
       
        $this->_view();
    }
    public function myartsAction(){
        $article = ArticleModel::getBy(["writter" =>$this->_registry->session->u->id ]) ;
        $this->_data["articles"] = $article ;
        $this->_view();
    }
    public function artcomdelAction()
    {
            $id = $this->_params[0]; 
            $comment = CommentaireModeL::getByPK($id); 
            if($comment->delete()){
                $this->messenger->add('votre commentaire est Supprimer  ') ;
                isset($_SERVER['HTTP_REFERER']) ? $this->redirect($_SERVER['HTTP_REFERER']) : $this->redirect('/');
            }
    }

}
