<div class="mt-5 shadow shadow-lg text-center mx-2 mx-md-5 p-3 p-md-5">
    <h4 class="">Edit Resource</h4>
    <hr class="bg-dark w-25 mb-5">

    <?php if ($this->session->flashdata('resource_modified')): ?>
		<div class="mb-5 alert alert-success">
			<p class="lead"><?= $this->session->flashdata('resource_modified'); ?></p>
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
    
    <?= form_open('moderation/edit_resource/' . $resource['id']); ?>
        
        <div class="input-group mb-3 row">
          <div class="col-sm-3 text-left">
          	<label>Course:</label>
          </div>
          <div class="col-sm">
            <?= get_courses_select($resource['course_id']); ?>
          </div>
        </div>

        <div class="input-group mb-3 row">
          <div class="col-sm-3 text-left">
          	<label for="id">Resource Name:</label>
          </div>
          <div class="col-sm">
	         <input type="text" class="form-control bg-light" name="resource_name" maxlength="50" value="<?php if (set_value('resource_name')) echo set_value('resource_name'); else echo  $resource['title']; ?>" required>
          </div>
        </div>

		<div class="input-group mb-3 row">
          <div class="col-sm-3 text-left">
          	<label>Description:</label>
          </div>
          <div class="col-sm">
            <textarea class="form-control bg-light" name="resource_desc" maxlength="2000" rows="5" 
                placeholder="Describe this resource" required><?php if (set_value('resource_desc')) echo set_value('resource_desc'); else echo  $resource['description']; ?></textarea>
          </div>
        </div>

        <button type="submit" class="btn btn-success btn-lg mt-2 btn-theme">
        	Update Resource <span class="fas fa-arrow-right ml-2"></span>
        </button>
    </form>
</div>