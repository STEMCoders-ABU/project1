<div class="text-center mt-5 shadow shadow-sm container p-4">
	<h4 class="text-center text-primary">Reset Password</h4>
	<hr class="bg-primary mb-5 w-25">

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

	<?= form_open('moderation/finish_password_reset') ?>
        <input type="hidden" value="<?= $email; ?>" name="email">
        <div class="input-group mb-3 row">
          <div class="col-sm-3">
          	<label for="npassword">New Password:</label>
          </div>
          <div class="col-sm">
	         <input type="password" class="form-control bg-light" name="npassword"required>
          </div>
        </div>

        <div class="input-group mb-3 row">
          <div class="col-sm-3">
          	<label for="cpassword">Confirm Password:</label>
          </div>
          <div class="col-sm">
	         <input type="password" class="form-control bg-light" name="cpassword"required>
          </div>
        </div>

        <button type="submit" class="btn btn-success btn-theme btn-lg mt-2 mr-5">
        	Reset <span class="fas fa-arrow-right ml-2"></span>
        </button>
    </form>
</div>