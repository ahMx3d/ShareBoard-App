<?php
    class Bootstrap
    {
        // Class Global Properties.
        private $controller;    // HTTP Request Controller.
        private $action;        // HTTP Request Action.
        private $request;       // URL HTTP Request.

        // Constructor
        public function __construct($request)
        {
            // Assign HTTP Request.
            $this->request = $request;

            // HTTP Controller Check.
            if ($this->request['controller'] == '') {
                // Assign Controller Default Value.
                $this->controller = 'home';
            } else {
                // Assign Controller URL.
                $this->controller = $this->request['controller'];
            }

            // HTTP Action Check.
            if ($this->request['action'] == '') {
                // Assign Action Default Value.
                $this->action = 'index';
            } else {
                // Assign Action URL Value.
                $this->action = $this->request['action'];
            }
        }

        // Create Controller.
        public function createController()
        {
            // Class Existance Check.
            if (class_exists($this->controller)) {
                // Create Parent(s) Class Array.
                $parents = class_parents($this->controller);

                // Class Extend Check.
                if (in_array('Controller', $parents)) {
                    // Class Method Check.
                    if (method_exists($this->controller, $this->action)) {
                        return new $this->controller($this->action, $this->request);
                    } else {
                        // Method Not Exist Error Message.
                        echo '<h1>Method not exist</h1>';
                        return;
                    }
                } else {
                    // Base Controller Not Found Error Message.
                    echo '<h1>Base controller not found</h1>';
                    return;
                }
            } else {
                // Controller Class Not Exist Error Message.
                echo '<h1>Controller class not exist</h1>';
                return;
            }
        }
    }
    