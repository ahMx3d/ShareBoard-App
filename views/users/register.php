<?php ob_start();?>
    <br />  
    <div class="card add-card">
        <h5 class="card-header h5">User Registeration</h5>
        <div class="card-body">
            <form
                action="<?php echo ROOT_PATH; ?>users/register"
                method="POST">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input
                            type="text"
                            class="form-control"
                            id="name"
                            name="name"
                            placeholder="Enter Name" />
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input
                            type="email"
                            class="form-control"
                            id="email"
                            name="email"
                            placeholder="Enter Email" />
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input
                            type="password"
                            class="form-control"
                            id="password"
                            name="password"
                            autocomplete="new-password"
                            placeholder="Enter Password" />
                    </div>
                    <input
                        type="submit"
                        class="btn btn-primary"
                        name="submit"
                        id="submit"
                        value="Register" />
            </form>
        </div>
    </div>
<?php ob_end_flush();?>