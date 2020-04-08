<div class="resources-siderbar-wrapper pr-2">
    <!-- Sidebar -->
    <nav id="resources-sidebar" class="shadow shadow-lg">
        <div class="resources-sidebar-header">
            <h3>Resources Menu</h3>
        </div>

        <ul class="list-unstyled components">
            <?php foreach ($sidebar_contents as $sidebar_content): ?>
                <?php if (! $sidebar_content['contents']): continue; ?>
                <?php endif; ?>
                <?php $header = $sidebar_content['header']; ?>
                <li <?php if ($header == $category . 's') echo 'class="active"'; ?>>
                    <a href="#<?= $header; ?>" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><?= $header; ?></a>
                    <ul class="collapse list-unstyled" id="<?= $header; ?>">
                        <?php $existing_courses = []; ?>
                        <?php foreach ($sidebar_content['contents'] as $course): ?>
                            <?php if (array_key_exists($course['course_id'], $existing_courses)): ?>
                                <?php continue; ?>
                            <?php else: ?>
                                <?php $existing_courses[$course['course_id']] = $course['course']; ?>
                            <?php endif; ?>
                            <li>
                                <a href="<?= site_url('resources/resource/' . $faculty_id . '/' . $department_id 
                                   . '/' . $level_id . '/' . $sidebar_content['category_id'] . '/' . $course['course_id'] ); ?>" class="sidebar_course_link"><?= $course['course']; ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>

    <!-- Contents -->
    <div id="resources-content">
        <button type="button" id="resources-sidebar-collapse" class="btn btn-light shadow shadow-lg m-1">
            <span></span>
            <span></span>
            <span></span>
        </button>
        
        <!-- Main Contents -->
        <div class="mt-5" id="resources-main-contents">
            
            <!-- Search Bar -->
            <div class="search-bar card jumbotron mx-auto p-5 shadow shadow-lg">
                <?= form_open('resources/search', ''); ?>
                    <div class="input-group mb-2">
                        <?= get_resource_categories_select(); ?>
                    </div>

                    <div class="input-group mt-3"> 
                        <input type="text" class="form-control bg-light" name="search" placeholder="Enter keyword" required>
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-success">
                                <span class="fas fa-search mr-1"></span> Search
                            </button>                          
                        </div>
                    </div>
                </form>
            </div>

            <div class="shadow shadow-lg mb-5">
                <div class="jumbotron p-4 bg-dark text-white" style="margin-top: 6rem">
                    <h4 class="text-center"><?= $course_code; ?> Resources [<?= $category . 's' ?>]</h4>
                </div>

                <div class="p-3">
                    <!-- Resources Group -->
                    <?php if ($resources): ?>
                        <?php $max_cols = 3; $size = count($resources); ?>
                        <?php if ($size <= $max_cols): $remainder = $max_cols - $size; ?>
                            <div class="card-deck mb-md-4">
                                <?php for ($i=0; $i < $size; $i++): ?>
                                    <?php $resource = array_shift($resources); ?>
                                    <?php if ($resource): echo generate_resource_card($category, $resource); ?>
                                    <?php else: echo generate_hidden_card(); ?>
                                    <?php endif; ?>
                                <?php endfor; ?>
                                <?php for ($i=0; $i < $remainder; $i++): echo generate_hidden_card(); ?>
                                <?php endfor; ?>
                            </div>
                        <?php else: ?>
                            <?php if ($size % $max_cols == 0): ?>
                                <?php for ($i=0; $i < $size; $i += $max_cols): ?>
                                    <div class="card-deck mb-md-4">
                                        <?php for ($j=0; $j < $max_cols; $j++) echo generate_resource_card($category, array_shift($resources)); ?>
                                    </div>
                                <?php endfor; ?>
                            <?php else: ?>
                                <?php $remainder = $size % $max_cols; $new_size = $size - $remainder; ?>
                                <?php for ($i=0; $i < $new_size; $i += $max_cols): ?>
                                    <div class="card-deck mb-md-4">
                                        <?php for ($j=0; $j < $max_cols; $j++) echo generate_resource_card($category, array_shift($resources)); ?>
                                    </div>
                                <?php endfor; ?>

                                <div class="card-deck mb-md-4">
                                    <?php for ($i=0; $i < $max_cols; $i++): ?>
                                        <?php $resource = array_shift($resources); ?>
                                        <?php if ($resource): echo generate_resource_card($category, $resource); ?>
                                        <?php else: echo generate_hidden_card(); ?>
                                        <?php endif; ?>
                                    <?php endfor; ?>
                                    </div>
                            <?php endif; ?>
                        <?php endif; ?> 
                    <?php else: ?>
                        <div class="alert alert-info">
                            <p class="lead text-center">Oops! We found no resources matching your search data!</p>
                        </div>
                    <?php endif; ?>
                    <div class="text-center w-100 pagination-container">
                        <?= $pagination ?? ''; ?>
                    </div>
                </div>
            </div>

            <!-- Frequently Accessed Resources -->
            <div class="shadow shadow-lg" style="margin-top: 10rem">
                <div class="jumbotron p-3 pb-4">
                    <div class="jumbotron p-4 bg-dark text-white mx-n3 mt-n3">
                        <h4 class="text-center">Similar Resources for <?= $course_code; ?> [<?= $category . 's' ?>]</h4>
                    </div>

                    <div>
                        <?php foreach ($freq_resources as $freq_resource): ?>
                            <div class="p-3 bg-light mt-3">
                                <div class="d-inline">
                                    <span class="fas fa-arrow-right mr-4"></span>
                                </div>
                                <div class="d-inline">
                                    <h5 class="d-inline"><?= $freq_resource['resource_title']; ?></h5>
                                    <div class="ml-5 mt-2">
                                        <div class="d-block"><span class="fas fa-download mr-2"></span><?= $freq_resource['resource_downloads']; ?> Downloads</div>
                                        <div class="mt-3">
                                            <a href="<?= site_url('resources/view/' . $freq_resource['id']); ?>" class="btn btn-dark btn-sm mr-2">View</a>
                                            <a href="<?= site_url('download/resource/' . $freq_resource['id']); ?>" class="btn btn-dark btn-sm">Download</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                </div>
            </div>

            <!-- Comments -->
            <div class="jumbotron p-3 shadow shadow-lg" style="margin-top: 10rem">
                <div class="jumbotron p-4 bg-dark text-white mx-n3 mt-n3">
                    <h4 class="text-center">Comments for <?= $course_code; ?> [<?= $category . 's' ?>]</h4>
                </div>

                <div id="category-comments-container">
                    <?php if (isset($category_comments) && $category_comments): ?>
                            <?php foreach ($category_comments as $comment): ?>
                                <?= generate_comment_markup($comment); ?>
                            <?php endforeach; ?>
                    <?php else: ?>
                        <p class="lead text-center p-3">No category comments yet! Write comments below</p>
                    <?php endif; ?>
                </div>
                
                <div class="bg-ligh p-3" style="margin-top: 4rem">
                    <div class="input-group mt-3"> 
                        <input id="category-comment-author" type="text" class="form-control" name="author" placeholder="Enter Display Name" maxlength="20" required>
                    </div>

                    <div class="form-group mt-3"> 
                        <textarea id="category-comment" rows="3" class="form-control" name="comment" placeholder="Your Message" maxlength="500" required></textarea>
                    </div>

                    <button id="btn-submit-category-comment" class="btn btn-success btn-lg mr-5 btn-theme"
                        onclick="add_category_comment(<?= $department_id . ',' . $level_id . ',' . $category_id . ',' . $course_id; ?>)">
                        <span class="fas fa-comment mr-1"></span> Comment
                    </button>

                    <img class="ajax-loader-indicator" src="<?= base_url('assets/imgs/ajax-loader.gif'); ?>" alt="Adding Comment...">
                </div>

            </div>
        </div>
    </div>
</div>