<div class="mt-5 container-fluid">
    <a href="<?= site_url('moderation/add_news'); ?>" class="btn btn-success btn-lg btn-theme">
        <span class="fas fa-plus mr-1"></span> Add News/Updates
    </a>

    <div class="mt-5">
        <div class="search-bar card jumbotron mx-auto p-5 shadow shadow-lg">
            <?= form_open('moderation/manage_resource', ''); ?>
            <div class="input-group mb-3 row">
                    <div class="col-sm-3 text-left">
                        <label>News Category:</label>
                    </div>
                    <div class="col-sm">
                        <select name="level" class="custom-select bg-light">
                            <option value="all" selected>All</option>
                            <option value="t1">General Announcement</option>
                            <option value="t2">Emergency</option>
                            <option value="t3">Assignment</option>
                            <option value="t4">Assesment</option>
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-lg btn-success btn-theme float-right mt-3">
                    <span class="fas fa-search mr-2"></span> Filter News/Updates
                </button>
            </form>
        </div>

        <div class="mt-5 table-responsive">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>News Title</th>
                        <th>Category</th>
                        <th colspan="2">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>A Title</td>
                        <td>General Announcements</td>
                        <td>
                            <a href="<?= site_url(); ?>" class="btn btn-success btn-theme btn-block">
                                <span class="fas fa-edit mr-1"></span> Edit
                            </a>
                        </td>
                        <td>
                            <a href="<?= site_url(); ?>" class="btn btn-success btn-theme btn-block">
                                <span class="fas fa-trash mr-1"></span> Remove
                            </a>
                        </td>
                    </tr>

                    <tr>
                        <td>A Title</td>
                        <td>Emergency</td>
                        <td>
                            <a href="<?= site_url(); ?>" class="btn btn-success btn-theme btn-block">
                                <span class="fas fa-edit mr-1"></span> Edit
                            </a>
                        </td>
                        <td>
                            <a href="<?= site_url(); ?>" class="btn btn-success btn-theme btn-block">
                                <span class="fas fa-trash mr-1"></span> Remove
                            </a>
                        </td>
                    </tr>

                    <tr>
                        <td>A Title</td>
                        <td>Assignment</td>
                        <td>
                            <a href="<?= site_url(); ?>" class="btn btn-success btn-theme btn-block">
                                <span class="fas fa-edit mr-1"></span> Edit
                            </a>
                        </td>
                        <td>
                            <a href="<?= site_url(); ?>" class="btn btn-success btn-theme btn-block">
                                <span class="fas fa-trash mr-1"></span> Remove
                            </a>
                        </td>
                    </tr>

                    <tr>
                        <td>A Title</td>
                        <td>Assesment</td>
                        <td>
                            <a href="<?= site_url(); ?>" class="btn btn-success btn-theme btn-block">
                                <span class="fas fa-edit mr-1"></span> Edit
                            </a>
                        </td>
                        <td>
                            <a href="<?= site_url(); ?>" class="btn btn-success btn-theme btn-block">
                                <span class="fas fa-trash mr-1"></span> Remove
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>