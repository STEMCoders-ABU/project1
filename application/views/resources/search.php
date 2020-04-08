<?php if (isset($error)): ?>
    <div class="alert alert-info mt-5 mx-5">
        <p class="lead text-center">Oops! We found no resources matching your search data!</p>
        <p class="lead text-center">No resource was uploaded with such configuration. Please contact your class rep for more info.</p>
    </div>

    <?php return; ?>
<?php endif; ?>

<div class="container mt-5">
    <div class="shadow shadow-lg mb-5">
        <div class="jumbotron p-4 bg-dark text-white" style="margin-top: 6rem">
            <h4 class="text-center"><?= $course_code; ?> Search [<?= $category . 's' ?>]</h4>
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
</div>