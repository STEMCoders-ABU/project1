<div class="container mt-5">
    <div class="mt-5 shadow shadow-lg mb-5">
        <div class="p-3 mt-3">
          <div class="alert alert-info mb-4 d-none" id="phone_feedback" style="transition: all 0.3s linear;">
            <p class="lead" id="feedback_text">
            </p>
          </div>

          <div class="input-group mt-3"> 
              <?= get_faculties_select('faculty_select'); ?>
          </div>

          <div class="input-group mt-3" id="departments_select_container"> 
              <!-- Departments Select will be inserted automatically via Ajax -->
          </div>

          <div class="input-group mt-3"> 
              <?= get_levels_select('level_select'); ?>
          </div>

          <div class="mt-5">
            <button class="btn btn-success btn-theme btn-lg mr-3" onclick="get_moderator_data()">
                <span class="fas fa-user mr-2"></span> Get Rep Contact
            </button>

            <img class="ajax-loader-indicator" src="<?= base_url('assets/imgs/ajax-loader.gif'); ?>" alt="Adding subscription...">
          </div>

          <a href="https://stemcoders.com.ng/index#contact" class="btn btn-dark btn-lg btn-block mt-3">
            <span class="fas fa-phone mr-2"></span> Contact STEM Coders Club
          </a>
        </div>
    </div>
</div>