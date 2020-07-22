<?php
    abstract class Controller
    {
        // Class Global Properties.
        protected $request;     // URL HTTP Request.
        protected $action;     // HTTP Request Action.

        // Constructor.
        public function __construct($action, $request)
        {
            // Assign Properties.
            $this->action   = $action;
            $this->request  = $request;
        }

        // Execute Action.
        public function executeAction()
        {
            return $this->{$this->action}();
        }

        // Return View.
        public function returnView($viewModel, $fullView)
        {
            // Assign View Path With Action.
            $view = 'views\\' .get_class($this). '\\' .$this->action. '.php';
            
            // Full View Check.
            if ($fullView) {
                // Reqire Main File.
                require('views\main.php');
            } else {
                // Require Assign View Path.
                require($view);
            }
            
        }
    }
    