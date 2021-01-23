<?php
namespace PHPMVC\Controllers;
use PHPMVC\LIB\Helper;
use PHPMVC\LIB\InputFilter;
use PHPMVC\Models\EventesModel;
use PHPMVC\Models\CategrieModel ; 
class EventesController extends AbstractController
{
    use Helper ; 
    use InputFilter ; 
    public function addAction()
    {
    $cats = CategrieModel::getAll() ;
    $this->_data['cats'] =$cats ;
    $this->_view() ; 
        if(!empty($_POST)){
            var_dump($_POST) ; 
            $eventes = new EventesModel() ;  
            $eventes->evenement = $this->filterString($_POST["event"]) ; 
            $eventes->categorie  = $this->filterInt($_POST["cat"]) ; 
            $eventes->dateofadd = date('Y-m-d H:m:s') ;
            $eventes->user_id = $this->_registry->session->u->id; 
            $eventes->done = 0 ; 
            if($eventes->save()){
                $this->messenger->add('eventes et bien ajoute ') ;
                $this->redirect('/eventes/myeve');
            } ; 
        }
    }
    public function defaultAction(){
        $eventes = EventesModel::getAll(); 
        $this->_data['eventes'] =$eventes ; 
        $this->_view() ; 
    }
    public function editAction(){
        $id = $this->_params[0] ; 
        $cats = CategrieModel::getAll() ;
        $this->_data['cats'] =$cats ;
        $evente = EventesModel::getByPk($id) ; 
        $this->_data['evente'] = $evente ; 
        $this->_view(); 
        if(!empty($_POST)){
            $evente->evenement = $this->filterString($_POST["event"]) ; 
            $evente->categorie  = $this->filterInt($_POST["cat"]) ; 
            if($evente->save()){
                $this->messenger->add('eventes et bien ajoute ') ;
                $this->redirect('/eventes/myeve');
            } ; 

        
    }
    }

    public function deleteAction(){
        $id=$_POST["id"] ; 
        $post = EventesModel::getByPk($id) ; 
        if($post->delete()){
                $this->messenger->add("l'evenement est bien supprimer ",$this->messenger::APP_MESSAGE_WARNING) ;
                $this->redirect('/eventes/myeve');
        }

    }
    public function myeveAction(){
        $eventes = EventesModel::getBy(["user_id" =>$this->_registry->session->u->id ]) ;
        $this->_data["eventes"] = $eventes ;
        $this->_view();
    }
}
