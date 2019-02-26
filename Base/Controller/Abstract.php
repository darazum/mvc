<?php
class Base_Controller_Abstract
{
    public $tpl;

    /** @var Base_View */
    public $view;

    function __construct()
    {
        $request = Base_Context::getInstance()->getRequest();
        $this->tpl = strtolower($request->getRequestAction()) . '.phtml';

        session_start();
        if (isset($_SESSION['user_id'])) {
            $userModel = User_Model_DB::getModelById($_SESSION['user_id']);
            $this->view->user = $userModel;
        }
    }
}