<div class="container mt-5">
    <?php if (isset($resource) && $resource): ?>
        <?= generate_resource_view($resource['resource_category'], $resource); ?>

            <!-- Comments -->
            <div class="jumbotron p-3 shadow shadow-lg" style="margin-top: 8rem">
                <div class="jumbotron p-4 bg-dark text-white mx-n3 mt-n3">
                    <h4 class="text-center">Comments</h4>
                </div>

                <div id="category-comments-container">
                    <?php if (isset($comments) && $comments): ?>
                            <?php foreach ($comments as $comment): ?>
                                <?= generate_comment_markup($comment); ?>
                            <?php endforeach; ?>
                    <?php else: ?>
                        <p class="lead text-center p-3 no-comment">No resource comments yet! Write comments below</p>
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
                        onclick="add_resource_comment(<?= $resource['id']; ?>)">
                        <span class="fas fa-comment mr-1"></span> Comment
                    </button>

                    <img class="ajax-loader-indicator" src="<?= base_url('assets/imgs/ajax-loader.gif'); ?>" alt="Adding Comment...">
                </div>
            </div>
    <?php else: ?>
        <div class="alert alert-info lead">
            Oops! We could not find the requested resource. It was probably removed. Please contact us or your class rep for more info.
        </div>
    <?php endif; ?>
</div>