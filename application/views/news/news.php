<?php if (isset($error)): ?>
    <div class="alert alert-info mt-5 mx-5">
        <p class="lead text-center">Oops! We found no news/update matching your search data!</p>
        <p class="lead text-center">No news/update was uploaded with such configuration. Please contact your class rep for more info.</p>
    </div>

    <?php return; ?>
<?php endif; ?>

<div class="resources-wrapper pr-2 d-none">
    <!-- Sidebar -->
    <nav id="resources-sidebar" class="shadow shadow-lg">
        <div class="resources-sidebar-header">
            <h3>News Menu</h3>
        </div>

        <ul class="list-unstyled components">
            <?php foreach ($sidebar_contents as $sidebar_content): ?>
                <?php if (! $sidebar_content['contents']): continue; ?>
                <?php endif; ?>
                <?php $header = $sidebar_content['header']; ?>
                <li <?php if ($header == $category . 's') echo 'class="active"'; ?>>
                    <a href="<?= site_url('news/news/' . $faculty_id . '/' . $department_id 
                        . '/' . $level_id . '/' . $sidebar_content['category_id']); ?>"><?= $header; ?></a>
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
                <?= form_open('news/search/' . $faculty_id . '/' . $department_id . '/' . $level_id . '/' . $category_id . '/null'); ?>
                    <div class="input-group mb-2">
                        <?= get_news_categories_select(); ?>
                    </div>

                    <div class="input-group mt-3"> 
                        <input type="text" class="form-control bg-light" name="keyword" placeholder="Enter keyword" required>
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
                    <h4 class="text-center">News [<?= $category . 's' ?>]</h4>
                </div>

                <div class="p-3">
                    <!-- News Group -->
                    <?php if ($news): ?>
                        <?php foreach ($news as $news_items): ?>
                            <?= generate_news_card($news_items); ?>
                        <?php endforeach; ?>
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
                        <h4 class="text-center res-header">Latest News for <?= $category . 's' ?></h4>
                    </div>

                    <div>
                        <?php foreach ($latest_news as $latest_news_item): ?>
                            <div class="p-3 bg-light mt-3">
                                <div class="d-inline">
                                    <span class="fas fa-arrow-right mr-4"></span>
                                </div>
                                <div class="d-inline">
                                    <h5 class="d-inline"><?= $latest_news_item['news_title']; ?></h5>
                                    <div class="ml-5 mt-2">
                                        <div class="d-block text-muted"><span class="fas fa-calendar mr-2"></span>Posted On <?= $latest_news_item['date_added']; ?></div>
                                        <div class="mt-3">
                                            <a href="<?= site_url('news/view/' . $latest_news_item['id']); ?>" class="btn btn-dark btn-sm mr-2">Read More</a>
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
                    <h4 class="text-center">Comments for <?= $category . 's' ?></h4>
                </div>

                <div id="category-comments-container">
                    <?php if (isset($category_comments) && $category_comments): ?>
                            <?php foreach ($category_comments as $comment): ?>
                                <?= generate_comment_markup($comment); ?>
                            <?php endforeach; ?>
                    <?php else: ?>
                        <p class="lead text-center p-3 no-comment">No category comments yet! Write comments below</p>
                    <?php endif; ?>
                </div>
                
                <div class="p-3" style="margin-top: 4rem">
                    <div class="input-group mt-3"> 
                        <input id="category-comment-author" type="text" class="form-control" name="author" placeholder="Enter Display Name" maxlength="20" required>
                    </div>

                    <div class="form-group mt-3"> 
                        <textarea id="category-comment" rows="3" class="form-control" name="comment" placeholder="Your Message" maxlength="500" required></textarea>
                    </div>

                    <button id="btn-submit-category-comment" class="btn btn-success btn-lg mr-5 btn-theme"
                        onclick="add_news_category_comment(<?= $department_id . ',' . $level_id . ',' . $category_id; ?>)">
                        <span class="fas fa-comment mr-1"></span> Comment
                    </button>

                    <img class="ajax-loader-indicator" src="<?= base_url('assets/imgs/ajax-loader.gif'); ?>" alt="Adding Comment...">
                </div>

            </div>
        </div>
    </div>
</div>

<div class="text-center mt-5 resource-loading-container">
    <img src="<?= base_url('assets/imgs/ajax-loader-spinner.gif'); ?>" alt="Loading..." class="img-fluid resource-loading">
</div>