<div class="mt-5 container">
    <div class="shadow shadow-lg p-4">
        <?php if(validation_errors()): ?>
            <div class="mb-4 alert alert-danger">
                <strong>The following errors occured:</strong><br><br>
                <?= validation_errors(); ?>
            </div>
        <?php endif; ?>

        <?php if (isset($custom_error)): ?>
            <div class="mb-4 alert alert-danger">
                <?= $custom_error; ?>
            </div>
        <?php endif; ?>

        <?= form_open('moderation/edit', 'class="mt-5 add-mod-form mt-n3"'); ?>
            <div class="input-group mt-3"> 
                <input type="text" class="form-control bg-light" name="email" maxlength="50" value="<?php if (set_value('email')) echo set_value('email'); else echo  $moderator_data['email']; ?>" placeholder="Email" required>
            </div>

            <div class="input-group mt-3"> 
                <input type="text" class="form-control bg-light" name="full_name" maxlength="50" value="<?php if (set_value('full_name')) echo set_value('full_name'); else echo  $moderator_data['full_name']; ?>" placeholder="Full Name" required>
            </div>

            <div class="input-group mt-3"> 
                <select name="gender" class="form-control bg-light">
                    <option value="Male" <?php if ($moderator_data['gender'] == 'Male')  echo 'selected'; ?>>Male</option>
                    <option value="Female" <?php if ($moderator_data['gender'] == 'Female')  echo 'selected'; ?>>Female</option>
                </select>
            </div>

            <div class="input-group mt-3"> 
                <input type="number" class="form-control bg-light" name="phone" minlength="11" maxlength="11" value="<?php if (set_value('phone')) echo set_value('phone'); else echo  $moderator_data['phone']; ?>" placeholder="Phone Number" required>
            </div>

            <div class="input-group mt-3"> 
                <input type="password" class="form-control bg-light" name="password" maxlength="70" placeholder="Password" required>
            </div>

            <button type="submit" class="btn btn-success btn-theme btn-lg mt-5 pull-left">
                Update Profile <span class="fas fa-arrow-right ml-2"></span> 
            </button>
        </form>
    </div>
</div>