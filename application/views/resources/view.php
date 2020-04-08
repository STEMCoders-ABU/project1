<div class="container mt-5">
    <?php if (isset($resource) && $resource): ?>
        <?= generate_resource_view($resource['resource_category'], $resource); ?>
    <?php else: ?>
        <div class="alert alert-info lead">
            Oops! We could not find the requested resource. It was probably removed. Please contact us or your class rep for more info.
        </div>
    <?php endif; ?>
</div>