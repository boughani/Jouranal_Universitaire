<?php


namespace PHPMVC\Controllers;

use PHPMVC\LIB\Helper;
use PHPMVC\LIB\InputFilter;
use PHPMVC\Models\userModel;

class authenticationcontroller extends AbstractController
{
    use inputfilter  ;
    use Helper ;
    public function signAction(){
        $this->_template->swapTemplate(
            [
                ':view' => ':action_view'
            ]);
        if (!empty($_POST)){
            $user = userModel::authenticate($this->filterString($_POST["username"]) , $this->filterString($_POST['password']),$this->session) ;
            if ($user==false){
                $this->messenger->add('vous avez insirez des information false ', $this->messenger::APP_MESSAGE_ERROR ) ;
            }else{
                $this->messenger->add('vous ete connecte  ') ;
                $this->redirect('/index/default');
            }
        }
        $this->_view();
    }
    public function logoutAction(){
        if ($this->_registry->session->__isset('u')) {
            $this->_registry->session->__unset('u');
        } ; 

        $this->redirect('/index/default');
    }

}