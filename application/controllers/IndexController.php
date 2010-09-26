<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
        $this->view->action = $this->getRequest()->getActionName();
        $this->view->controller = $this->getRequest()->getControllerName();
    }

    public function indexAction()
    {
        $this->view->PAGE_SUBTITLE = "Strona główna";
        $this->view->PAGE_TITLE = "Zend Framework CLEAN APPLICATION";
    }


}

