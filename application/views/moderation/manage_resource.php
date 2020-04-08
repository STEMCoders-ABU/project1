<div class="mt-5 container-fluid">
    <a href="<?= site_url('moderation/add_resource'); ?>" class="btn btn-success btn-lg btn-theme mb-5">
        <span class="fas fa-plus mr-1"></span> Add New Resource
    </a>

    <?php if ($this->session->flashdata('resource_removed')): ?>
		<div class="mb-4 mt-5 alert alert-success lead">
			<?= $this->session->flashdata('resource_removed'); ?>
		</div>
	<?php endif; ?>

    <div class="mt-5">
        <div class="manage-resources-search-bar card jumbotron mx-auto p-5 shadow shadow-lg">
            <?= form_open('moderation/manage_resource', ''); ?>
                <div class="input-group mb-3 row">
                    <div class="col-sm-3 text-left">
                        <label>Category:</label>
                    </div>
                    <div class="col-sm">
                        <?= get_resource_categories_select_all(); ?>
                    </div>
                </div>

                <div class="input-group mb-3 row">
                    <div class="col-sm-3 text-left">
                        <label>Course:</label>
                    </div>
                    <div class="col-sm">
                        <?= get_courses_select_all(); ?>
                    </div>
                </div>

                <button type="submit" class="btn btn-lg btn-success btn-theme float-right mt-3">
                    <span class="fas fa-search mr-2"></span> Filter Resources
                </button>
            </form>
        </div>

        <?php if (isset($resources) && count($resources) > 0): ?>
            <div class="mt-5 table-responsive manage-resource-table">
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
                        <?php foreach ($resources as $resource): ?>
                            <tr>
                                <td><?= $resource['resource_title'] ?></td>
                                <td><?= $resource['resource_category'] ?></td>
                                <td><?= $resource['resource_level'] ?></td>
                                <td><?= $resource['resource_course'] ?></td>
                                <td>
                                    <a href="<?= site_url('moderation/edit_resource/' . $resource['id']); ?>" class="btn btn-success btn-theme btn-block">
                                        <span class="fas fa-edit mr-1"></span> Edit
                                    </a>
                                </td>
                                <td>
                                    <a href="<?= site_url('moderation/remove_resource/' . $resource['id']); ?>" class="btn btn-success btn-theme btn-block">
                                        <span class="fas fa-trash mr-1"></span> Remove
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="text-center w-100 pagination-container">
                <?= $pagination ?? ''; ?>
            </div>
        
            <?php else: ?>
                <div class="alert alert-info">
                    <p class="lead text-center">Oops! We found no resources matching your search data!</p>
                </div>
            <?php endif; ?>
    </div>
</div>