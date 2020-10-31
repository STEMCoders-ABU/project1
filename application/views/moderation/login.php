<div class="text-center mt-5 container p-4 mod-login-container">
	<h4 class="text-center header mx-n4 mt-n4">Sign In to Account</h4>
	
    <div class="mb-5 alert alert-info">
        <p class="lead">Please note, only class reps are required to sign in! <strong>No account is required for normal students to access the resources.</strong></p>
    </div>

	<?php if ($this->session->flashdata('password_reset')): ?>
		<div class="mb-4 alert alert-success lead">
			<?= $this->session->flashdata('password_reset'); ?>
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

	<?= form_open('moderation/login') ?>
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
	         <input type="password" class="form-control bg-light" name="password"required>
          </div>
        </div>

        <button type="submit" class="btn btn-success btn-lg btn-theme mt-2 mr-5">
        	Sign In <span class="fas fa-arrow-right ml-2"></span>
        </button>

		<a href="<?= site_url('moderation/reset_password'); ?>" class="ml-2 ml-md-3">Forgot Password?</a>
    </form>
</div>