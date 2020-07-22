<?php ob_start();?>
    <br />  
    <div class="card add-card">
        <h5 class="card-header h5">Share Something</h5>
        <div class="card-body">
            <!-- <h5 class="card-title">Special title treatment</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="#!" class="btn btn-primary">Go somewhere</a> -->
            <form
                action="<?php echo ROOT_PATH; ?>shares/add"
                method="POST">
                <fieldset>
                    <legend class="text-center">Add New Share</legend>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input
                            type="text"
                            class="form-control"
                            id="title"
                            name="title"
                            placeholder="Enter Title" />
                    </div>
                    <div class="form-group">
                        <label for="body">Body</label>
                        <textarea
                            class="form-control"
                            id="body"
                            name="body"
                            rows="3"
                            placeholder="Enter Body"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="link">Link</label>
                        <input
                            type="text"
                            class="form-control"
                            id="link"
                            name="link"
                            placeholder="Enter Link" />
                    </div>
                    <input
                        type="submit"
                        class="btn btn-primary"
                        name="submit"
                        id="submit"
                        value="Create Share" />
                    <a
                        class="btn btn-danger"
                        href="<?php echo ROOT_PATH; ?>shares">Cancel</a>
                </fieldset>
            </form>
        </div>
    </div>
<?php ob_end_flush();?>