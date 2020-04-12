<?php if (isset($error)): ?>
    <div class="alert alert-info mt-5 mx-5">
        <p class="lead text-center">Oops! We found no news/update matching your search data!</p>
        <p class="lead text-center">No news/update was uploaded with such configuration. Please contact your class rep for more info.</p>
    </div>

    <?php return; ?>
<?php endif; ?>

<div class="container mt-5">
    <div class="shadow shadow-lg mb-5">
        <div class="jumbotron p-4 bg-dark text-white" style="margin-top: 6rem">
            <h4 class="text-center">Search [<?= $category . 's' ?>]</h4>
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
</div>