<?php
namespace PHPMVC\Controllers;

use PHPMVC\Models\privilageModel;
use PHPMVC\Models\userGroupModel;
use PHPMVC\LIB\inputfilter ;
use PHPMVC\LIB\helper ;
use PHPMVC\Models\UserGroupPrivilage;

class usergroupController extends AbstractController
{
    use inputfilter ;
    use helper ;
    private $_addRoles=[
    'groupename'=>'req'
] ;
    public function defaultAction()
    {
        $ugroup= userGroupModel::getAll() ;
        $this->_data['ugroup'] = $ugroup ;
        $this->_view();
    }
    public function addAction(){
        $prvgs=[] ;
        $privilages = privilageModel::getAll() ;
       $this->_data['privilages'] =$privilages ;
        $this->_view();
       if(isset($_POST['submit']) && $this->isValid($this->_addRoles, $_POST)){
            $prvgs = $_POST['prvgs'] ;
            $groupename =  $_POST['groupename'] ;
            $usergroup = new userGroupModel()  ;
            $usergroup->groupename=$groupename ;
            if($usergroup->save()){
                foreach ($prvgs as $priviliage ){
                    $ugp = new UserGroupPrivilage() ;
                    $ugp->groupeid =$this->filterInt($usergroup->groupeid) ;
                    $ugp->privilageid  =$priviliage ;
                    $ugp->save() ;
                }
                $this->messenger->add('le groupe name a ete bien ajoute ') ;
                $this->redirect('/usergroup/default');

            }else{
                $this->messenger->add('le nest pas ajoute ',APP_MESSAGE_ERROR ) ;
                $this->redirect('/usergroup/default');
            }


       }

    }
    public function deleteAction(){
        $id=$_POST['id'] ;
        $usergroupeprivilages= UserGroupPrivilage::getBy(['groupeid'=>$id]) ;
        if (!empty($usergroupeprivilages)) {
          foreach ($usergroupeprivilages as $usergroupeprivilage){
              $usergroupeprivilage->delete() ;
          }
        }

        $usergroup= userGroupModel::getByPK($id) ;
        if ($usergroup->delete()){
            $this->messenger->add('le groupe de utilisateur est bien supp') ;
            $this->redirect('/usergroup/default');
        }


    }
}
