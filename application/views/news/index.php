<div class="res-container mt-5 m-3 border border-dark rounded rounded-lg text-light">
    <div class="p-3 text-light">
        <h4 class="text-center text-light bg-dark p-3 mt-n3 mx-n3 mb-5">News and Updates</h4>
        
        <p class="lead text-center">Choose a Faculty, Department and Level</p>

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm mt-2">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-dark text-light">Faculty</span>                          
                        </div>
                        <?= get_faculties_select('faculty_select'); ?>
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
                    <button id="btn_find_news" class="btn btn-dark btn-lg">
                        Find News <span class="fas fa-arrow-right ml-2"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if (! (isset($news) && $news)) return; ?>

<div class="container resources-index-mfa mb-3">
    <div class="mt-5 m-2 text-dark pt-3 shadow shadow-lg pl-0">
        <h4 class="text-center text-light bg-dark p-3 mt-n3 mb-5">Latest News and Updates</h4>
        
        <ul class="list-group">
            <?php foreach ($news as $news_item): ?>
                <li class="list-group-item list-group-item-light">
                    <h4 class="text-dark"><?= $news_item['news_title']; ?></h4>
                    <div class="ml-3">
                        <div class="mb-2"><span class="fas fa-list mr-2"></span><?= $news_item['news_category']; ?></div>
                        <div class="mb-2"><span class="fas fa-book mr-2"></span><?= $news_item['news_faculty']; ?></div>
                        <div class="mb-2"><span class="fas fa-book mr-2"></span><?= $news_item['news_department']; ?></div>
                        <div class="mb-2"><span class="fas fa-book mr-2"></span><?= $news_item['news_level']; ?></div>
                        
                        <div class="mt-4">
                            <a href="<?= site_url('news/view/' . $news_item['id']); ?>" class="btn btn-dark btn-lg mr-2">Read More</a>
                        </div>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>