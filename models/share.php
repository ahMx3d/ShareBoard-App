<?php
    class ShareModel extends Model
    {
        // Index Method.
        public function index()
        {
            // Select Query Statement.
            $this->query('
                SELECT
                    *
                FROM
                    `shares`
                ORDER BY
                    `post_date`
                DESC
            ');
            // Fetch Query Statement.
            $rows = $this->resultSet();
            return $rows;
        }

        // Add Method.
        public function add()
        {
            // Sanitize POST
            $post = filter_input_array(
                INPUT_POST,
                FILTER_SANITIZE_STRING
            );

            if (isset($post['submit'])) {
                if ($post['submit']) {

                    // Empty Inputs Check.
                    if (
                        empty($post['title']) ||
                        empty($post['body']) ||
                        empty($post['link'])
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
                            `shares`
                                (
                                    `title`,
                                    `body`,
                                    `link`,
                                    `user_id`
                                )
                        VALUES
                            (
                                :title,
                                :body,
                                :link,
                                :user_id
                            )
                    ');

                    // Bind Query Values.
                    $this->bind(
                        ':title',
                        $post['title']
                    );
                    $this->bind(
                        ':body',
                        $post['body']
                    );
                    $this->bind(
                        ':link',
                        $post['link']
                    );
                    $this->bind(
                        ':user_id',
                        1
                    );

                    // Execute Query Statement.
                    $this->execute();

                    // Verify.
                    if ($this->last_insert_id()) {
                        
                        // Redirect.
                        header('Location: ' .ROOT_URL. 'shares');
                    }
                }
                return;
            }
        }
    }
    