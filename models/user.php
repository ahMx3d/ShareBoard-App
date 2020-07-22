<?php
    class UserModel extends Model
    {
        // Register.
        public function register()
        {
            // Sanitize POST.
            $post = filter_input_array(
                INPUT_POST,
                FILTER_SANITIZE_STRING
            );
            // Encrypt Password.
            if (isset($_POST['password'])) {
                $password = sha1($_POST['password']);
            }

            if (isset($post['submit'])) {
                if ($post['submit']) {

                    // Empty Inputs Check.
                    if (
                        empty($post['name']) ||
                        empty($post['email']) ||
                        empty($post['password'])
                    ) {
                        // Error Message.
                        Messages::setMsg(
                            'All Inputs Are Mendatory',
                            'err'
                        );
                        return;
                    }

                    // Insert Query Statement.
                    $this->query('
                        INSERT INTO
                            `users`
                                (
                                    `name`,
                                    `email`,
                                    `password`
                                )
                        VALUES
                            (
                                :name,
                                :email,
                                :password
                            )
                    ');

                    // Bind Query Values.
                    $this->bind(
                        ':name',
                        $post['name']
                    );
                    $this->bind(
                        ':email',
                        $post['email']
                    );
                    $this->bind(
                        ':password',
                        $password
                    );

                    // Execute Query Statement.
                    $this->execute();

                    // Verify.
                    if ($this->last_insert_id()) {
                        
                        // Redirect.
                        header('Location: ' .ROOT_URL. 'users/login');
                    }
                }
                return;
            }
        }

        // Login.
        public function login()
        {
            // Sanitize POST.
            $post = filter_input_array(
                INPUT_POST,
                FILTER_SANITIZE_STRING
            );
            // Encrypt Password.
            if (isset($_POST['password'])) {
                $password = sha1($_POST['password']);
            }

            if (isset($post['submit'])) {
                if ($post['submit']) {

                    // Login Select Query Statement.
                    $this->query('
                        SELECT
                            *
                        FROM
                            `users`
                        WHERE
                            `email` = :email
                        AND
                            `password` = :password
                    ');

                    // Bind Query Values.
                    $this->bind(
                        ':email',
                        $post['email']
                    );
                    $this->bind(
                        ':password',
                        $password
                    );

                    // Execute Query Statement.
                    $row = $this->singleResult();

                    // Verify Query Statement.
                    if ($row) {
                        // Create Session.
                        $_SESSION['is_logged_in'] = true;
                        $_SESSION['user_data'] = array(
                            'id'    => $row['id'],
                            'name'  => $row['name'],
                            'email' => $row['email']
                        );
                        // Redirect.
                        header('Location: ' .ROOT_URL. 'home/index');
                    } else {
                        Messages::setMsg(
                            'Incorrect Login',
                            'err');
                    }
                }
                return;
            }
        }
    }