<div class="text-center mt-5 shadow shadow-sm container p-4">
    <h4 class="text-primary text-center">RESET PASSWORD</h4>
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

    <?php if ($this->session->flashdata('verification_code_resent')): ?>
        <div class="mb-4 alert alert-success lead">
            <?= $this->session->flashdata('verification_code_resent'); ?>
        </div>
	<?php endif; ?>

    <?= form_open('moderation/reset_password') ?>
        <div class="input-group mb-3 row">
            <div class="col-sm-3">
            <label for="email">Email:</label>
            </div>
            <div class="col-sm">
                <input type="email" class="form-control bg-light" name="email" maxlength="50" value="<?= set_value('email'); ?>" required>
            </div>
        </div>

        <button type="submit" class="btn btn-success btn-theme btn-lg">Reset Password</button>
    </form>
</div>