<?php


namespace PHPMVC\Controllers;

    use PHPMVC\LIB\Helper;
    use PHPMVC\LIB\InputFilter;
    use PHPMVC\Models\CategrieModel;

class categoriecontroller extends AbstractController
{
    use Helper ;
    use inputfilter ;
    public function defaultAction(){
        $this->_data["categories"] = CategrieModel::getAll() ;
        $this->_view();
    }
    public function addAction(){
        if (!empty($_POST)){
            $categorie= new CategrieModel() ;
            $categorie->name= $this->filterString($_POST['categorie']) ;
            if ($categorie->save()){
                $this->messenger->add('la categorie et bien ajouté');
                $this->redirect('/categorie/default');
            }
        }
        $this->_view();
    }
    public function editAction (){
        $id= $this->_params[0] ;
        $categorie= CategrieModel::getByPK($this->filterInt($id)) ;
        if ($categorie){
        $this->_data['categorie'] = $categorie ;
        if (!empty($_POST)){
                $categorie->name = $_POST['categorie']  ;
                if ($categorie->save()){
                    $this->messenger->add('La catagorie est bien ajoute ') ;
                    $this->redirect('/categorie/default');
                }
        }
        }else{
            $this->redirect('/categorie/default/');
        }
        $this->_view();
    }
    public function deleteAction(){
            $id=$_POST['id'] ;
            $categorie =CategrieModel::getByPK($this->filterInt($id)) ;
            if($categorie){
                if ($categorie->delete()){
                    $this->messenger->add('la categorie est bien suprime ') ;
                    $this->redirect('/categorie/default/');
                }
            }
    }

}
