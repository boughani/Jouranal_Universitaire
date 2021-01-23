<?php
namespace PHPMVC\LIB;
use PHPMVC\Lib\Registry;
use PHPMVC\LIB\Template\Template;

class FrontController
{
    use Helper;

    const NOT_FOUND_ACTION = 'notFoundAction';
    const NOT_FOUND_CONTROLLER = 'PHPMVC\Controllers\\NotFoundController';

    private $_controller = 'index';
    private $_action = 'default';
    private $_params = array();

    private $_registry;
    private $_template;
    private $_authentication;

    public function __construct(Template $template, Registry $registry,Authentication $auth)
    {
        $this->_template = $template;
        $this->_registry = $registry;
        $this->_authentication = $auth;


        $this->_parseUrl();
    }

    private function _parseUrl()
    {
        $url = explode('/', trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'), 3);
        if(isset($url[0]) && $url[0] != '') {
            $this->_controller = $url[0];
        }
        if(isset($url[1]) && $url[1] != '') {
            $this->_action = $url[1];
        }
        if(isset($url[2]) && $url[2] != '') {
            $this->_params = explode('/', $url[2]);
        }
    }

    public function dispatch()
    {
        $controllerClassName = 'PHPMVC\Controllers\\' . ucfirst($this->_controller) . 'Controller';
        $actionName = $this->_action . 'Action';
        $h=$this->_authentication->nolgin($this->_controller, $this->_action); 
       
        if ($this->_authentication->nolgin($this->_controller, $this->_action)){
            if ($this->_authentication->isAuthorized() && $this->_controller == 'inscription' && $this->_action == 'signup'){
                isset($_SERVER['HTTP_REFERER']) ? $this->redirect($_SERVER['HTTP_REFERER']) : $this->redirect('/');
            }
        }
        else{
        // Check if the user is authorized to access the application
        if(!$this->_authentication->isAuthorized()) {
            if($this->_controller != 'authentication' && $this->_action != 'sign') {
                $this->redirect('/authentication/sign');
            }
        } else {
            // deny access to the auth/login
            if($this->_controller == 'authentication' && $this->_action == 'sign') {
                isset($_SERVER['HTTP_REFERER']) ? $this->redirect($_SERVER['HTTP_REFERER']) : $this->redirect('/');
            }
            // Check if the user has access to specific url
            if((bool) CHECK_FOR_PRIVILEGES === true) {
                if(!$this->_authentication->hasAccess($this->_controller, $this->_action))
                {
                    $this->redirect('/access/accessdenied');
                }
            }
        }

        }
        if(!class_exists($controllerClassName) || !method_exists($controllerClassName, $actionName)) {
            $controllerClassName = self::NOT_FOUND_CONTROLLER;
            $this->_action = $actionName = self::NOT_FOUND_ACTION;
        }

        $controller = new $controllerClassName();
        $controller->setController($this->_controller);
        $controller->setAction($this->_action);
        $controller->setParams($this->_params);
        $controller->setTemplate($this->_template);
        $controller->setRegistry($this->_registry);
        $controller->$actionName();
    }
}