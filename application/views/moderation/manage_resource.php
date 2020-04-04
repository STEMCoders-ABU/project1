<div class="mt-5 container-fluid">
    <a href="<?= site_url('moderation/add_resource'); ?>" class="btn btn-success btn-lg btn-theme">
        <span class="fas fa-plus mr-1"></span> Add New Resource
    </a>

    <div class="mt-5">
        <div class="search-bar card jumbotron mx-auto p-5 shadow shadow-lg">
            <?= form_open('moderation/manage_resource', ''); ?>
            <div class="input-group mb-3 row">
                    <div class="col-sm-3 text-left">
                        <label>Level:</label>
                    </div>
                    <div class="col-sm">
                        <select name="level" class="custom-select bg-light">
                            <option value="all" selected>All</option>
                            <option value="l1">100</option>
                            <option value="l2">200</option>
                            <option value="l3">300</option>
                            <option value="l4">400</option>
                        </select>
                    </div>
                </div>

                <div class="input-group mb-3 row">
                    <div class="col-sm-3 text-left">
                        <label>Category:</label>
                    </div>
                    <div class="col-sm">
                        <select name="level" class="custom-select bg-light">
                            <option value="all" selected>All</option>
                            <option value="materials">Materials</option>
                            <option value="documents">Documents</option>
                            <option value="documents">Textbooks</option>
                            <option value="videos">Videos</option>
                        </select>
                    </div>
                </div>

                <div class="input-group mb-3 row">
                    <div class="col-sm-3 text-left">
                        <label>Course:</label>
                    </div>
                    <div class="col-sm">
                        <select name="level" class="custom-select bg-light">
                            <option value="all" selected>All</option>
                            <option value="c1">COSC101</option>
                            <option value="c2">COSC202</option>
                            <option value="c3">COSC303</option>
                            <option value="c4">COSC404</option>
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-lg btn-success btn-theme float-right mt-5">
                    <span class="fas fa-search mr-2"></span> Filter Resources
                </button>
            </form>
        </div>

        <div class="mt-5 table-responsive">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Resource Title</th>
                        <th>Category</th>
                        <th>Level</th>
                        <th>Course</th>
                        <th colspan="2">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>A Title</td>
                        <td>Materials</td>
                        <td>100</td>
                        <td>COSC101</td>
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
                        <td>Documents</td>
                        <td>200</td>
                        <td>COSC201</td>
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
                        <td>Textbooks</td>
                        <td>300</td>
                        <td>COSC301</td>
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
                        <td>Videos</td>
                        <td>400</td>
                        <td>COSC401</td>
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