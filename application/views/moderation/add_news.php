<div class="mt-5 shadow shadow-lg text-center mx-2 mx-md-5 p-3 p-md-5">
    <h4 class="">Add News/Update</h4>
    <hr class="bg-dark w-25 mb-5">

    <?php if ($this->session->flashdata('news_added')): ?>
		<div class="mb-5 alert alert-success">
			<p class="lead"><?= $this->session->flashdata('news_added'); ?></p>
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
    
    <?= form_open_multipart('moderation/add_news'); ?>
        
        <div class="input-group mb-3 row">
          <div class="col-sm-3 text-left">
          	<label for="id">News Title:</label>
          </div>
          <div class="col-sm">
	         <input type="text" class="form-control bg-light" name="news_title" maxlength="200" value="<?= set_value('news_title'); ?>" required>
          </div>
        </div>

		<div class="input-group mb-3 row">
          <div class="col-sm-3 text-left">
          	<label>News Category:</label>
          </div>
          <div class="col-sm">
            <?= get_news_categories_select(); ?>
          </div>
        </div>

		    <div class="input-group mb-3 row">
          <div class="col-sm-3 text-left">
          	<label>Content:</label>
          </div>
          <div class="col-sm">
            <textarea class="form-control bg-light" name="news_content" maxlength="5000" rows="5" 
                placeholder="Write the content... (5000 characters maximum)"    required><?= set_value('news_content'); ?></textarea>
          </div>
        </div>

        <button type="submit" class="btn btn-success btn-lg mt-2 btn-theme">
        	Add News/Update <span class="fas fa-arrow-right ml-2"></span>
        </button>
    </form>
</div>