<div class="mt-5 container-fluid text-center">
    
    <div class="search-bar card jumbotron mx-auto p-5 shadow shadow-lg mt-5 container">

        <?php if ($this->session->flashdata('course_added')): ?>
            <div class="mb-4 alert alert-success lead">
                <?= $this->session->flashdata('course_added'); ?>
            </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('profile_modified')): ?>
            <div class="mb-5 alert alert-success">
                <p class="lead"><?= $this->session->flashdata('profile_modified'); ?></p>
            </div>
        <?php endif; ?>
        
        <?php if(validation_errors()): ?>
            <div class="mb-4 alert alert-danger">
                <strong>The following errors occured</strong><br><br>
                <?= validation_errors(); ?>
            </div>
        <?php endif; ?>

        <?php if (isset($custom_error)): ?>
            <div class="mb-4 alert alert-danger">
                <?= $custom_error; ?>
            </div>
        <?php endif; ?>

        <?= form_open('moderation/add_course', ''); ?>
            <div class="input-group mt-3"> 
                <input type="text" class="form-control bg-light" name="course_title" maxlength="60" minlength="4" value="<?= set_value('course_title'); ?>" placeholder="Course Title" required>
            </div>

            <div class="input-group mt-3"> 
                <input type="text" class="form-control bg-light" name="course_code" maxlength="12" minlength="3" value="<?= set_value('course_code'); ?>" placeholder="Course Code" required>
                <div class="input-group-append">
                    <button type="submit" class="btn btn-success btn-theme">
                         Add Course
                    </button>                          
                </div>
            </div>
        </form>
    </div>

    <div class="card mt-5 m-2 m-md-5 p-5 moderation-index-card">
        <a href="<?= site_url('moderation/edit') ?>" class="btn btn-success btn-lg btn-block mb-1">Edit Profile</a>
        <a href="<?= site_url('moderation/add_resource') ?>" class="btn btn-success btn-lg btn-block mb-1">Add Resources</a>
        <a href="<?= site_url('moderation/manage_resource') ?>" class="btn btn-success btn-lg btn-block mb-1">Resource Management</a>
        <a href="<?= site_url('moderation/add_news') ?>" class="btn btn-success btn-lg btn-block mb-1">Add News/Updates</a>
        <a href="<?= site_url('moderation/manage_news') ?>" class="btn btn-success btn-lg btn-block">News/Update Management</a>
    </div>
</div>