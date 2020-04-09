<div class="mt-5 container-fluid text-center">
    
    <div class="search-bar card jumbotron mx-auto p-5 mt-5 container">

        <?php if ($this->session->flashdata('flash_message')): ?>
            <div class="mb-4 alert alert-success lead">
                <?= $this->session->flashdata('flash_message'); ?>
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

        <?= form_open('admin/add_faculty', ''); ?>
            <div class="input-group mt-3"> 
                <input type="text" class="form-control bg-light" name="faculty_name" maxlength="60" minlength="4" value="<?= set_value('faculty_name'); ?>" placeholder="Enter Faculty Name" required>
                <div class="input-group-append">
                    <button type="submit" class="btn btn-success btn-theme">
                        <span class="fas fa-plus mr-1"></span> Add Faculty
                    </button>                          
                </div>
            </div>
        </form>

        <?= form_open('admin/update_faculty', 'class="mt-5"'); ?>
            <div class="input-group mt-3"> 
                <?= get_faculties_select(); ?>
            </div>

            <div class="input-group mt-3"> 
                <input type="text" class="form-control bg-light" name="faculty_name" maxlength="60" minlength="4" value="<?= set_value('faculty_name'); ?>" placeholder="Update Faculty Name" required>
                <div class="input-group-append">
                    <button type="submit" class="btn btn-success btn-theme">
                        <span class="fas fa-edit mr-1"></span> Update Faculty
                    </button>                          
                </div>
            </div>
        </form>

        <?= form_open('admin/remove_faculty', 'class="mt-5"'); ?>
            <div class="input-group mt-3"> 
                <?= get_faculties_select(); ?>
                <div class="input-group-append">
                    <button type="submit" class="btn btn-success btn-theme">
                        <span class="fas fa-trash mr-1"></span> Remove Faculty
                    </button>                          
                </div>
            </div>
        </form>

        <?= form_open('admin/add_department', 'class="mt-5"'); ?>
            <div class="input-group mt-3"> 
                <?= get_faculties_select(); ?>
            </div>

            <div class="input-group mt-3"> 
                <input type="text" class="form-control bg-light" name="department_name" maxlength="60" minlength="4" value="<?= set_value('department_name'); ?>" placeholder="Enter Department Name" required>
                <div class="input-group-append">
                    <button type="submit" class="btn btn-success btn-theme">
                        <span class="fas fa-plus mr-1"></span> Add Department
                    </button>                          
                </div>
            </div>
        </form>

        <?= form_open('admin/update_department', 'class="mt-5 update-dept-form"'); ?>
            <div class="input-group mt-3"> 
                <?= get_faculties_select('faculty_select'); ?>
            </div>

            <div class="input-group mt-3" id="departments_select_container"> 
                <!-- Departments Select will be inserted automatically via Ajax -->
            </div>

            <div class="input-group mt-3"> 
                <input type="text" class="form-control bg-light" name="department_name" maxlength="60" minlength="4" value="<?= set_value('department_name'); ?>" placeholder="Enter Department Name" required>
                <div class="input-group-append">
                    <button type="submit" class="btn btn-success btn-theme">
                        <span class="fas fa-edit mr-1"></span> Update Department
                    </button>                          
                </div>
            </div>
        </form>
    </div>

    <div class="card jumbotron mx-auto p-5 mt-5 container">
        <?= form_open('admin/add_moderator', 'class="mt-5 add-mod-form"'); ?>
            <div class="input-group mt-3"> 
                <?= get_faculties_select('faculty_select'); ?>
            </div>

            <div class="input-group mt-3" id="departments_select_container2"> 
                <!-- Departments Select will be inserted automatically via Ajax -->
            </div>

            <div class="input-group mt-3"> 
                <?= get_levels_select(); ?>
            </div>

            <div class="input-group mt-3"> 
                <input type="text" class="form-control bg-light" name="username" maxlength="12" minlength="4" value="<?= set_value('username'); ?>" placeholder="Username" required>
            </div>

            <div class="input-group mt-3"> 
                <input type="text" class="form-control bg-light" name="email" maxlength="50" value="<?= set_value('email'); ?>" placeholder="Email" required>
            </div>

            <div class="input-group mt-3"> 
                <input type="text" class="form-control bg-light" name="full_name" maxlength="50" value="<?= set_value('full_name'); ?>" placeholder="Full Name" required>
            </div>

            <div class="input-group mt-3"> 
                <select name="gender" class="form-control bg-light">
                    <option value="Male" selected>Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>

            <div class="input-group mt-3"> 
                <input type="number" class="form-control bg-light" name="phone" maxlength="11" value="<?= set_value('phone'); ?>" placeholder="Phone Number" required>
            </div>

            <div class="input-group mt-3"> 
                <input type="password" class="form-control bg-light" name="password" maxlength="70" placeholder="Password" required>
            </div>

            <button type="submit" class="btn btn-success btn-theme btn-lg mt-5 pull-left">
               Add Moderator <span class="fas fa-arrow-right ml-2"></span> 
            </button>
        </form>
    </div>
</div>