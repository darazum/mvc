<?php
class Base_Application
{
    private $_config;
    /** @var Base_Context */
    private $_context;
    /** @var Base_Request */
    private $_request;

    public function __construct($config)
    {
        $this->_config = $config;
    }

    private function _init()
    {
        // это глобальный контекст приложения доступный везде
        $this->_context = Base_Context::getInstance();
    }

    public function run()
    {
        try {
            // инициализируем приложение
            $this->_init();

            // это объект запроса, содержит все данные которые пришли от пользователя
            $this->_request = new Base_Request();

            // помещаем его в контекст, он нам еще пригодится
            $this->_context->setRequest($this->_request);

            // обрабатываем пользовательский запрос
            $this->_request->handle();

            // это диспетчер, он занимается обработкой запроса и получением нужного контроллера
            $dispatcher = new Base_Dispatcher();
            $dispatcher->dispatch();

            // просим диспетчер создать нам объект контроллера
            $controller = $dispatcher->getController();

            // получаем от диспетчера имя вызванного экшена
            $action = $dispatcher->getActionName();

            // вызываем экшен
            $controller->$action();



        } catch (Exception $e) {
            echo 'Произошло исключение: ' . $e->getMessage();
            // обработка исключений самого базового уровня - редирект на 404.html
        }
    }

}