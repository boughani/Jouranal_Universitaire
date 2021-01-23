<?php
namespace PHPMVC\Controllers;

use PHPMVC\Models\privilageModel;
use PHPMVC\Models\userGroupModel;
use PHPMVC\LIB\inputfilter ;
use PHPMVC\LIB\helper ;
use PHPMVC\Models\UserGroupPrivilage;
use PHPMVC\Models\UserModel;
use PHPMVC\Models\UserProfileModel;

class UserController extends AbstractController
{
    use inputfilter ;
    public function adduserAction()
    {
      
        $usergroupe = userGroupModel::getAll() ;
        $this->_data['usergoupes'] = $usergroupe; 
        
        if (!empty($_POST)){

            if ($this->eq_field($_POST['password'],$_POST['cpassword'])){
                
                $user = new userModel() ;
                $user->username = $this->filterString($_POST['username']) ;
                $user->cryptPassword($_POST['password']) ;
                $user->email = $this->filterString($_POST['email']) ;
                $user->usergroup= $_POST['type'] ;
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
        $this->_view() ; 
    }
}
