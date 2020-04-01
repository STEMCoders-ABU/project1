<div class="mt-5 shadow shadow-lg text-center mx-2 mx-md-5 p-3 p-md-5">
    <h4 class="">Add a Resource</h4>
    <hr class="bg-dark w-25 mb-5">

    <?php if ($this->session->flashdata('resource_added')): ?>
		<div class="mb-5 alert alert-success">
			<p class="lead"><?= $this->session->flashdata('resource_added'); ?></p>
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
    
    <?= form_open_multipart('moderation/add_resource'); ?>
        <div class="input-group mb-3 row">
          <div class="col-sm-3 text-left">
          	<label>Level:</label>
          </div>
          <div class="col-sm">
            <select name="level" class="custom-select bg-light">
                <option value="l1" selected>100</option>
                <option value="l2">200</option>
                <option value="l3">300</option>
            </select>
          </div>
        </div>

        <div class="input-group mb-3 row">
          <div class="col-sm-3 text-left">
          	<label>Course:</label>
          </div>
          <div class="col-sm">
            <select name="course" class="custom-select bg-light">
                <option value="c1" selected>COSC101</option>
                <option value="c2">COSC102</option>
                <option value="c3">COSC103</option>
            </select>
          </div>
        </div>

        <div class="input-group mb-3 row">
          <div class="col-sm-3 text-left">
          	<label for="id">Resource Name:</label>
          </div>
          <div class="col-sm">
	         <input type="text" class="form-control bg-light" name="resource_name" maxlength="50" value="<?= set_value('resource_name'); ?>" required>
          </div>
        </div>

		<div class="input-group mb-3 row">
          <div class="col-sm-3 text-left">
          	<label>Resource Type:</label>
          </div>
          <div class="col-sm">
            <select name="resource_type" class="custom-select bg-light">
                <option value="video" selected>Video</option>
                <option value="txtBook">Textbook</option>
                <option value="document">Document</option>
                <option value="material">Material</option>
            </select>
          </div>
        </div>

		<div class="input-group mb-3 row">
          <div class="col-sm-3 text-left">
          	<label>Description:</label>
          </div>
          <div class="col-sm">
            <textarea class="form-control bg-light" name="resource_desc" maxlength="2000" rows="5" 
                placeholder="Describe this resource"    required><?= set_value('resource_desc'); ?></textarea>
          </div>
        </div>

		<div class="input-group mb-3 row">
          <div class="col-sm-3 text-left">
          	<label>Resource File:</label>
          </div>
          <div class="col-sm">
		  	<div class="custom-file">
			  <input type="file" class="custom-file-input bg-light" id="resource_file" name="resource_file" required>
			  <label class="custom-file-label">Choose Resource File</label>
			</div>
          </div>
        </div>

        <button type="submit" class="btn btn-success btn-lg mt-2 btn-theme">
        	Add Resource <span class="fas fa-arrow-right ml-2"></span>
        </button>
    </form>
</div>