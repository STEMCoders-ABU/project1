<div class="text-center mt-5 shadow shadow-sm container p-4">
	<h4 class="text-center bg-dark mx-n4 mt-n4 p-3 text-white mb-5">Sign In to Account</h4>
	
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

	<?= form_open('admin/login') ?>
		<div class="input-group mb-3 row">
          <div class="col-sm-3">
          	<label>Username:</label>
          </div>
          <div class="col-sm">
	         <input type="text" class="form-control bg-light" name="username" maxlength="12" minlength="4" value="<?= set_value('username'); ?>" required>
          </div>
        </div>

        <div class="input-group mb-3 row">
          <div class="col-sm-3">
          	<label for="password">Password:</label>
          </div>
          <div class="col-sm">
	         <input type="password" class="form-control bg-light" name="password" required>
          </div>
        </div>

        <button type="submit" class="btn btn-success btn-lg btn-theme mt-2 mr-5">
        	Sign In <span class="fas fa-arrow-right ml-2"></span>
        </button>
    </form>
</div>