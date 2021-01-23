<?php


namespace PHPMVC\Controllers;


use PHPMVC\Models\userGroupModel;
use PHPMVC\Models\userModel;
use PHPMVC\LIB\InputFilter ;
use PHPMVC\Models\UserProfileModel;

class inscriptioncontroller extends AbstractController
{
    use inputfilter ;

    public function signupAction(){

        if (!empty($_POST)){

            if ($this->eq_field($_POST['password'],$_POST['cpassword'])){

                $user = new userModel() ;
                $user->username = $this->filterString($_POST['username']) ;
                $user->cryptPassword($_POST['password']) ;
                $user->email = $this->filterString($_POST['email']) ;
                $user->usergroup=20 ;
                if ($user->save()){
                    $userprofile= new UserProfileModel() ;
                    $userprofile->id= $user->id   ;
                    $userprofile->firstname = $this->filterInt($_POST['firstname']) ;
                    $userprofile->lastname = $this->filterString($_POST['lastname']) ;
                    $userprofile->phone= $this->filterString($_POST['phone']) ;
                    $dob= new  \DateTime($_POST['dob']) ;
                    $dob = $dob->format('Y-m-d');
                    $userprofile->dob =$dob ;
                    $userprofile->photo = 'img/photoprifile' ;
                    if ($userprofile->save(false)){
                        $this->messenger->add("vous avez bien inscrire ") ;
                    }

                }
            }else{
                $this->messenger->add('password confirmation incorrect ',$this->messenger::APP_MESSAGE_ERROR )  ;


            }


        }

        $this->_view();
    }
}