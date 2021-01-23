<?php


namespace PHPMVC\Controllers;


class accesscontroller extends AbstractController
{
    
    public function accessdeniedAction(){
        echo 'Vous pas le droit d\'access a cette page ' ;
        header('Location:/index'); 
    }
}
