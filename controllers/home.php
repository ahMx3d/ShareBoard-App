<?php
    class Home extends Controller
    {
        public function index()
        {
            $viewModel = new homeModel();
            $this->returnView($viewModel->index(), true);
        }
    }
    