<?php
    // Buffer Output
    ob_start();
    // Start Session.
    session_start();

    // Include Config.
    require('config.php');

    // Include Messages.
    require('libs\messages.lib.php');
    // Include Bootstrap.
    require('libs\Bootstrap.lib.php');
    // Include Main Controller.
    require('libs\Controller.lib.php');
    // Include Main Model.
    require('libs\Model.lib.php');

    // Include Home Controller.
    require('controllers\home.php');
    // Include Users Controller.
    require('controllers\users.php');
    // Include Shares Controller.
    require('controllers\shares.php');

    // Include Home Model.
    require('models\home.php');
    // Include User Model.
    require('models\user.php');
    // Include Share Model.
    require('models\share.php');

    // Create Bootstrap Object.
    $route = new Bootstrap($_GET);
    // Create Object Controller.
    $ctrl = $route->createController();
    // Controller Check.
    if ($ctrl) {
        $ctrl->executeAction();
    }
    
    // Flush Output
    ob_end_flush();