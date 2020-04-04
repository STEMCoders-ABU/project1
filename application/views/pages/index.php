<div class="index-header">
  <div class="translucent-bg-50 text-center headline">
    <h1 class="index-header-title">Campus Space</h1>

    <?php if (!$this->session->has_userdata('logged')): ?>
      <div class="mt-5 auth-container">
        <a href="<?= site_url('moderation/login'); ?>" class="btn btn-outline-light btn-lg mr-5 shadow shadow-sm" id="login">Sign In</a>
        <a href="<?= site_url('resources'); ?>" class="btn btn-success btn-lg shadow shadow-sm btn-theme" id="register">Explore Resources</a>
      </div>
    <?php endif; ?>
  </div>
</div>

<div class="index-contents">
  <section id="section-a">
    <div class="card-deck">
      <div class="card">
        <img class="img-fluid card-img-top" src="<?= base_url('assets/imgs/index/res-card.jpeg') ?>">
        <div class="card-body">
          <h4 class="card-title">RESOURCES</h4>
          <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sapiente, assumenda!</p>
          <a href="<?= site_url('resources'); ?>" class="btn btn-dark card-btn card-link">Explore</a>
        </div>
      </div>

      <div class="card">
        <img class="img-fluid card-img-top" src="<?= base_url('assets/imgs/index/opp-card.jpg') ?>">
        <div class="card-body">
          <h4 class="card-title">LATEST OPPORTUNITIES</h4>
          <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sapiente, assumenda!</p>
          <a href="#" class="btn btn-dark card-btn card-link">Explore</a>
        </div>
      </div>

      <div class="card">
        <img class="img-fluid card-img-top" src="<?= base_url('assets/imgs/index/gp-card.jpg') ?>">
        <div class="card-body">
          <h4 class="card-title">GP CALCULATOR</h4>
          <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sapiente, assumenda!</p>
          <a href="#" class="btn btn-dark card-btn card-link">Explore</a>
        </div>
      </div>
    </div>
  </section>

  <!--SECTION B .. INFO-->
  <section id="section-b" class="container-fluid jumbotron">
      <div class="row">
        <div class="col-sm">
          <h2 class="mb-5 text-center">WHAT DIFFERENCE DOES IT MAKE?</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam consectetur natus quibusdam excepturi facere ducimus?</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam consectetur natus quibusdam excepturi facere ducimus?</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam consectetur natus quibusdam excepturi facere ducimus?</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam consectetur natus quibusdam excepturi facere ducimus?</p>
        </div>

        <div class="col-sm text-center">
          <img class="img-fluid img-thumbnail" src="<?= base_url('assets/imgs/index/reading.jpg') ?>">
        </div>
      </div>
  </section>

    <!--SECTION C .. OPPORTUNITIES-->
  <section id="section-c" class="mt-5">
      <h2 class="text-center">LATEST OPPORTUNITIES</h2>
      <p id="sub-header" class="text-center mb-5">LOCAL SCHOLARSHIPS | ABROAD SCHOLARSHIPS | SEMINARS | WORKSHOPS | GRANTS | COMPETITIONS</p>

      <div class="container-fluid">
        <div class="card jumbotron p-0 shadow shadow-sm">
          <div class="row">
            <div class="col-sm">
              <img class="img-fluid" src="<?= base_url('assets/imgs/index/gp-card.jpg') ?>">
            </div>
            <div class="col-sm p-5">
              <div class="pt-3">
                <h4 class="card-title">NEWS TITLE</h4>
              </div>

              <p class="mt-3">A brief info about the oppurtunity!</p>
              <p class="mt-3">A brief info about the oppurtunity!</p>
              <a href="#" class="btn btn-dark mt-5 w-100">View Story</a>
            </div>
          </div>
        </div>

        <div class="card jumbotron p-0 shadow shadow-sm">
          <div class="row">
            <div class="col-sm">
              <img class="img-fluid" src="<?= base_url('assets/imgs/index/gp-card.jpg') ?>">
            </div>
            <div class="col-sm p-5">
              <div class="pt-3">
                <h4 class="card-title">NEWS TITLE</h4>
              </div>

              <p class="mt-3">A brief info about the oppurtunity!</p>
              <p class="mt-3">A brief info about the oppurtunity!</p>
              <a href="#" class="btn btn-dark mt-5 w-100">View Story</a>
            </div>
          </div>
        </div>

        <div class="card jumbotron p-0 shadow shadow-sm">
          <div class="row">
            <div class="col-sm">
              <img class="img-fluid" src="<?= base_url('assets/imgs/index/gp-card.jpg') ?>">
            </div>
            <div class="col-sm p-5">
              <div class="pt-3">
                <h4 class="card-title">NEWS TITLE</h4>
              </div>

              <p class="mt-3">A brief info about the oppurtunity!</p>
              <p class="mt-3">A brief info about the oppurtunity!</p>
              <a href="#" class="btn btn-dark mt-5 w-100">View Story</a>
            </div>
          </div>
        </div>
      </div>
  </section>
</div>