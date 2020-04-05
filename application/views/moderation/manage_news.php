<div class="mt-5 container-fluid">
    <a href="<?= site_url('moderation/add_news'); ?>" class="btn btn-success btn-lg btn-theme mb-5">
        <span class="fas fa-plus mr-1"></span> Add News/Updates
    </a>

    <?php if ($this->session->flashdata('news_removed')): ?>
		<div class="mb-4 mt-5 alert alert-success lead">
			<?= $this->session->flashdata('news_removed'); ?>
		</div>
    <?php endif; ?>
    
    <div class="mt-5">
        <div class="search-bar card jumbotron mx-auto p-5 shadow shadow-lg">
            <?= form_open('moderation/manage_news', ''); ?>
            <div class="input-group mb-3 row">
                    <div class="col-sm-3 text-left">
                        <label>News Category:</label>
                    </div>
                    <div class="col-sm">
                        <?= get_news_categories_select_all(); ?>
                    </div>
                </div>

                <button type="submit" class="btn btn-lg btn-success btn-theme mt-3">
                    <span class="fas fa-search mr-2"></span> Filter News/Updates
                </button>
            </form>
        </div>

        <?php if (isset($news) && count($news) > 0): ?>
            <?php if (count($news) > 20): ?>
                <div class="text-center mt-5 mb-5"><?= $pagination ?? ''; ?></div>
            <?php endif; ?>

            <div class="mt-5 table-responsive manage-news_item-table">
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>News Title</th>
                            <th>Category</th>
                            <th>Department</th>
                            <th>Level</th>
                            <th colspan="2">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($news as $news_item): ?>
                            <tr>
                                <td><?= $news_item['news_title'] ?></td>
                                <td><?= $news_item['news_category'] ?></td>
                                <td><?= $news_item['news_department'] ?></td>
                                <td><?= $news_item['news_level'] ?></td>
                                <td>
                                    <a href="<?= site_url('moderation/edit_news/' . $news_item['id']); ?>" class="btn btn-success btn-theme btn-block">
                                        <span class="fas fa-edit mr-1"></span> Edit
                                    </a>
                                </td>
                                <td>
                                    <a href="<?= site_url('moderation/remove_news/' . $news_item['id']); ?>" class="btn btn-success btn-theme btn-block">
                                        <span class="fas fa-trash mr-1"></span> Remove
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="text-center mt-5 mb-5"><?= $pagination ?? ''; ?></div>
        
            <?php else: ?>
                <div class="alert alert-info">
                    <p class="lead text-center">Oops! We found no news/updates matching your search data!</p>
                </div>
            <?php endif; ?>
    </div>
</div>