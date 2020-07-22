<?php
    class Messages
    {
        // Set Message.
        public static function setMsg($text, $type)
        {
            if ($type == 'err') {
                $_SESSION['err'] = $text;
            } else {
                $_SESSION['succ'] = $text;
            }
        }

        // Run Message.
        public static function runMsg()
        {
            // Error Message.
            if (isset($_SESSION['err'])) {
                echo '
                    <br />
                    <div class="alert alert-danger">
                    ' .$_SESSION['err']. '
                    </div>
                ';
                unset($_SESSION['err']);
            }

            // Success Message.
            if (isset($_SESSION['succ'])) {
                echo '
                    <br />
                    <div class="alert alert-success">
                    ' .$_SESSION['succ']. '
                    </div>
                ';
                unset($_SESSION['succ']);
            }
        }
    }
    