<?php
    class Users extends Controller
    {
        // Registeration.
        protected function register()
        {
            // Session Check
            if (isset($_SESSION['is_logged_in'])) {
                // Redirect Home.
                header('Location: ' .ROOT_URL. 'home/index');
            }
            
            $viewModel = new UserModel();
            $this->returnView(
                $viewModel->register(),
                true
            );
        }

        // Login.
        protected function login()
        {
            // Session Check
            if (isset($_SESSION['is_logged_in'])) {
                // Redirect Home.
                header('Location: ' .ROOT_URL. 'home/index');
            }

            $viewModel = new UserModel();
            $this->returnView(
                $viewModel->login(),
                true
            );
        }
        
        // Logout.
        public function logout()
        {
            session_unset($_SESSION['is_logged_in']);
            session_unset($_SESSION['user_data']);
            session_destroy();

            // Redirect.
            header('Location: ' .ROOT_URL. 'home/index');
        }
    }
    