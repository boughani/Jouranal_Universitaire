<?php


namespace PHPMVC\Controllers;



use PHPMVC\LIB\Helper;
use PHPMVC\LIB\InputFilter;
use PHPMVC\Models\privilageModel;

class privilageController extends AbstractController
{
    use InputFilter ;
    use Helper ;
    public function defaultAction (){
        $_SESSION['lang']='fr';
        $this->language->load('template.communs') ;
        $this->_data['privilages']  = privilageModel::getAll() ;


        $this->_view();
    }
    public function addAction(){
        var_dump($_POST) ;
        if (isset($_POST['submit'])){
            $privilage = new privilageModel() ;
            $privilage->privilage=$this->filterString($_POST['privilage']);
            $privilage->privilagename=$this->filterString($_POST['privilageName']);
            $privilage->save() ;
            $this->messenger->add('la privilage et bien ajouté ');
            $this->redirect('/privilage/default');
        }
        $this->_view();
    }
    public function editAction(){
        $id = $this->_params[0] ;
        $privilage = privilageModel::getByPK($id) ;
        
        if($privilage ==false ){

            $this->redirect('/privilage/default') ;
        }
      $this->_data['privilage'] = $privilage ;
        if (!empty($_POST)){
            $privilage->privilagename=$this->filterString($_POST['privilageName']) ;
            $privilage->privilage=$this->filterString($_POST['privilage']) ;
            if($privilage->save() ){
                $this->messenger->add('La privilage a ete modéfie Correctement');

            };
        }
        $this->_view();
    }
   public function deleteAction(){
        $id=$_POST["id"] ;
        $privilage=privilageModel::getByPK($id);
        if ($privilage){
            $privilage->delete() ;
            $this->messenger->add("vous avez Suprimer Privilage on success ")  ;
            $this->redirect('/privilage/default');

        }
       $this->messenger->add("La privilage n'est pas suprimer en success  ",$this->messenger::APP_MESSAGE_ERROR)  ;
       $this->redirect('/privilage/default');

    }

}
