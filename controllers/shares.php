<?php
    class Shares extends Controller
    {
        // Index Method.
        public function index()
        {
            // DB Share Object.
            $viewModel = new ShareModel();
            // Invoke Main Controller Method.
            $this->returnView(
                // DB Object Index Method.
                $viewModel->index(),
                // Full View Param Value.
                true
            );
        }

        // Add Method.
        public function add()
        {
            // Session Check
            if (!isset($_SESSION['is_logged_in'])) {
                // Redirect Home.
                header('Location: ' .ROOT_URL. 'shares');
            }

            // DB Share Object.
            $viewModel = new ShareModel();
            // Invoke Main Controller Method.
            $this->returnView(
                // DB Object Add Method.
                $viewModel->add(),
                // Full View Param Value.
                true
            );
        }
    }
    