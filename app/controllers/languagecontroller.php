<?php
namespace PHPMVC\Controllers;
use PHPMVC\LIB\Helper;

class LanguageController extends AbstractController
{

    use Helper;

    public function defaultAction()
    {
        if($_SESSION['lang'] == 'fr') {
            $_SESSION['lang'] = 'en';
        } else {
            $_SESSION['lang'] = 'fr';
        }
        $this->redirect($_SERVER['HTTP_REFERER']);
    }
}