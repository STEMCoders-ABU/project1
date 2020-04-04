<div class="mt-5 container-fluid text-center">
    
    <div class="search-bar card jumbotron mx-auto p-5 shadow shadow-lg mt-5 container">
        <?= form_open('moderation/add_course', ''); ?>
            <div class="input-group mb-2"> 
                <select class="form-control bg-light" name="level" required> 
                    <option value="l1">100</option>
                    <option value="l2">200</option>
                    <option value="l3">300</option>
                    <option value="l4">400</option>
                </select>
            </div>

            <div class="input-group mt-3"> 
                <input type="text" class="form-control bg-light" name="search" placeholder="Enter Course Code" required>
                <div class="input-group-append">
                    <button type="submit" class="btn btn-success btn-theme">
                        <span class="fas fa-plus mr-1"></span> Add Course
                    </button>                          
                </div>
            </div>
        </form>
    </div>

    <div class="card mt-5 m-2 m-md-5 p-5 moderation-index-card">
        <a href="<?= site_url('moderation/add_resource') ?>" class="btn btn-success btn-lg btn-block mb-1">Add Resources</a>
        <a href="<?= site_url('moderation/manage_resource') ?>" class="btn btn-success btn-lg btn-block mb-1">Resource Management</a>
        <a href="<?= site_url('moderation/add_news') ?>" class="btn btn-success btn-lg btn-block mb-1">Add News/Updates</a>
        <a href="<?= site_url('moderation/manage_news') ?>" class="btn btn-success btn-lg btn-block">News/Update Management</a>
    </div>
</div>