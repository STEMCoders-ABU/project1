<div class="res-container mt-5 m-3 border border-dark rounded rounded-lg text-light">
    <div class="p-3 text-light">
        <h4 class="text-center text-light bg-dark p-3 mt-n3 mx-n3 mb-5">Resources</h4>
        
        <p class="lead text-center">Choose a Faculty, Department and Level</p>

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm mt-2">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-dark text-light">Faculty</span>                          
                        </div>
                        <?= get_faculties_select(); ?>
                    </div>
                </div>

                <div class="col-sm mt-2">
                    <div class="input-group mb-3" id="departments_select_container">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-dark text-light">Department</span>                          
                        </div>
                        <!-- Departments Select will be inserted automatically via Ajax -->
                    </div>
                </div>

                <div class="col-sm mt-2">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-dark text-light">Level</span>                          
                        </div>
                        <?= get_levels_select(); ?>
                    </div>
                </div>

                <div class="col-sm-2 mt-4 mt-md-0">
                    <button id="btn_find_resources" class="btn btn-dark btn-lg">
                        Find Resources <span class="fas fa-arrow-right ml-2"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container resources-index-mfa mb-3">
    <div class="mt-5 m-2 text-dark pt-3 shadow shadow-lg pl-0">
        <h4 class="text-center text-light bg-dark p-3 mt-n3 mb-5">Most Frequenty Accessed</h4>
        
        <ul class="list-group">
            <?php foreach ($resources as $resource): ?>
                <li class="list-group-item list-group-item-light">
                    <h4 class="text-dark"><?= $resource['resource_title']; ?></h4>
                    <div class="ml-3">
                        <div class="mb-2"><span class="fas fa-list mr-2"></span><?= $resource['resource_category']; ?></div>
                        <div class="mb-2"><span class="fas fa-book mr-2"></span><?= $resource['resource_faculty']; ?></div>
                        <div class="mb-2"><span class="fas fa-book mr-2"></span><?= $resource['resource_department']; ?></div>
                        <div class="mb-2"><span class="fas fa-book mr-2"></span><?= $resource['resource_level']; ?></div>
                        <div class="mb-2"><span class="fas fa-book mr-2"></span><?= $resource['resource_course']; ?></div>

                        <div class="mt-4">
                            <a href="<?= site_url('resources/view/' . $resource['id']); ?>" class="btn btn-dark mr-2">View</a>
                            <a href="<?= site_url('download/resource/' . $resource['id']); ?>" class="btn btn-dark">Download</a>
                        </div>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>