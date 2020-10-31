<div id="main-index-container">
  <div class="index-header-container">
    <div class="headline text-left translucent-bg-60">
      <div class="mb-5">
        <h1 class="title">CAMPUS SPACE</h1>
        <p class="lead text-white motto translucent-bg-40">More Space, More Info...</p>
      </div>

      <div class="row mr-3">
        <div class="col-sm">
          <a href="<?= site_url('resources'); ?>" class="resources-link"><span class="fas fa-search mr-3 text-black"></span>Explore Resources</a>
        </div>

        <div class="col-sm mt-4 mt-md-0">
          <a href="<?= site_url('download/app'); ?>" class="app-link"><span class="fab fa-android mr-3 text-black"></span>Get the Mobile App</a>
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid section-2 jumbotron mb-0">
    <div class="row">
      <div class="col-sm text-center">
        <span class="d-block fas fa-folder fa-5x"></span>
        <p class="lead text-muted">Save Space</p>
      </div>

      <div class="col-sm text-center mt-5 mt-md-0">
        <span class="d-block fas fa-tasks fa-5x"></span>
        <p class="lead text-muted">Discuss</p>
      </div>

      <div class="col-sm text-center mt-5 mt-md-0">
        <span class="d-block fas fa-clock fa-5x"></span>
        <p class="lead text-muted">Save Time</p>
      </div>
    </div>
  </div>

  <div class="section-3">
    <div class="contents translucent-bg-60 text-center text-white">
      <h1>HOW IT WORKS</h1>
      <hr class="w-75">

      <p class="lead text-muted text-left">
      We give class representatives the oppurtunity to keep class members up to date with resources and useful information in an organised and student friendly manner. At Campus Space, we let you focus on what you're actually interested in. You no longer have to scroll through hundreds of not so useful messages to get updated
      <br><br>
      You're not limited to just your departmental resources, you have access to every other faculty, department and level! Basically, you can access resources for higher levels even before you get there!
      </p>
    </div>
  </div>

  <div class="section-5 container-fluid jumbotron mb-0">
    <div class="row mx-1 mx-md-0 p-4">
      <div class="col-sm text-center">
        <h2><?= $total_departments ?></h2>
        <p class="lead text-muted">Departments</p>
      </div>

      <div class="col-sm text-center mt-5 mt-md-0">
        <h2><?= $total_resources ?></h2>
        <p class="lead text-muted">Resources</p>
      </div>

      <div class="col-sm text-center mt-5 mt-md-0">
        <h2><?= $total_downloads ?></h2>
        <p class="lead text-muted">Downloads</p>
      </div>
    </div>
  </div>

  <div class="section-4 container-fluid mt-5" id="about">
    <div class="row">
      <div class="col-sm logo">
        <div class="inner"></div>
      </div>

      <div class="col-sm text jumbotron m-0 text-white">
        <div class="row">
          <div class="col-2">
            <hr class="bg-white">
          </div>
          <div class="col">
            <h6 class="title-font">what's this about?</h6>
          </div>
        </div>

        <p class="lead text-muted mt-5 text-left">
          Campus Space is a cloud-based socio-academic web application built to provide students and other key players in the learning environment easy access to study materials.
          <br><br>
          This platform aims to improve communication as well as dissemination (sharing) of study materials effectively for the best learning experience!
          <br><br>
          Campus space caters for all academic institutions encompassing trainings, professional and traditional methods of learning. It seeks to bring all study materials in one place for easy access and more sustainable use.
          <br><br>
          The pilot phase for this project is targeted at Ahmadu Bello University, Zaria - Nigeria. It is managed by the STEM Coders Club as part of the plans in place for solving contemproray problems in the society.
          <br><br>
          With many other cloud-based services available, Campus Space is 100% open source; providing access to study files for students globally with no hidden charges to better enhance access and promote effective study habits.
        </p>
      </div>
    </div>
  </div>

  <div class="section-6">
    <div class="contents translucent-bg-60 text-center">
      <h1 class="text-center translucent-bg-60">READY TO EXPLORE?<hr class="w-25"></h1>
      <a href="<?= site_url('resources'); ?>">Explore Resources</a>
    </div>
  </div>

  <div class="container section-7 jumbotron">
      <div class="jumbtron p-3 content">
        <div class="p-4 mx-n3 mt-n3 header">
          <h4 class="text-center text-uppercase title-font">Subscribe for Email Notifications</h4>
        </div>

        <div class="p-3 mt-3">
          <div class="alert alert-warning mb-4 d-none" id="subscription_feedback" style="transition: all 0.3s linear;">
            <p class="lead" id="feedback_text"></p>
          </div>

          <div class="input-group mt-3"> 
              <select id="faculty_select" class="form-control bg-light" name="faculty" required=""><option value="1">Test Faculty</option><option value="2">Another Test Faculty</option></select>          </div>

          <div class="input-group mt-3" id="departments_select_container"> 
              <!-- Departments Select will be inserted automatically via Ajax -->
          <select id="department_select" class="form-control bg-light" name="department" required=""><option value="1">Test Department</option></select></div>

          <div class="input-group mt-3"> 
              <select id="level_select" class="form-control bg-light" name="level" required=""><option value="1">100</option><option value="3">200</option><option value="4">300</option><option value="5">400</option><option value="6">500</option><option value="7">600</option></select>          </div>

          <div class="input-group mt-3"> 
              <input type="text" class="form-control bg-light sub_email" name="email" maxlength="50" value="" placeholder="Enter Email" required="">
          </div>

          <div class="text-center">
            <img class="ajax-loader-indicator mt-4 mb-3 d-block mx-auto" src="<?= base_url('assets/imgs/ajax-loader.gif'); ?>" alt="Adding subscription...">

            <button class="btn btn-success btn-lg mt-2 mt-md-0" id="btn_resources_sub" onclick="sub_for_resources()">
              <span class="fas fa-envelope mr-2"></span>SUBSCRIBE!
            </button>
          </div>
        </div>
      </div>
  </div>
</div>