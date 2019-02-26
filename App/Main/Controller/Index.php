<?php
class Main_Controller_Index extends Base_Controller_Abstract
{
    public function indexAction()
    {
        echo 'Мы здесь:<br>';

        $context = Base_Context::getInstance();
        echo 'Запрошенный модуль: ' . $context->getRequest()->getRequestModule() . '<br>';
        echo 'Запрошенный контроллер: ' . $context->getRequest()->getRequestController() . '<br>';
        echo 'Запрошенный экшен: ' . $context->getRequest()->getRequestAction() . '<br><br><br>';


    }
}