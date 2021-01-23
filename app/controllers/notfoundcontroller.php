<?php

namespace PHPMVC\Controllers;

class NotFoundController extends AbstractController
{
    public function notFoundAction()
    {
        $this->_view();
    }
    public function accessdaniedAction(){
        echo"<h1>Access Danied </h1>" ; 
    }
}