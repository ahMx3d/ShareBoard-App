<div>
    <?php if(isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] == true):?>
        <a
            class="btn btn-success btn-share"
            href="<?php echo ROOT_PATH; ?>shares/add">Share Something</a>
    <?php endif;?>
    <?php foreach($viewModel as $item):?>
        <div class="card bg-light p-3 share-card">
            <div class="card-body">
                <h3><?php echo $item['title']; ?></h3>
                <small><?php echo $item['post_date']; ?></small>
                <hr />
                <p><?php echo $item['body']; ?></p>
                <hr />
                <a
                    class="btn btn-secondary"
                    href="<?php echo $item['link']; ?>"
                    target="_blank"
                    rel="external author">Go To Website</a>
            </div>
        </div>
    <?php endforeach;?>
</div>