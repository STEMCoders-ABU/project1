<div class="index-container d-none">
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
            <p class="lead" style="height: 5rem;">Get exclusive access to departmental materials, documents, textbooks and videos.</p>
            <a href="<?= site_url('resources'); ?>" class="btn btn-dark card-btn card-link">Explore</a>
          </div>
        </div>

        <div class="card">
          <img class="img-fluid card-img-top" src="<?= base_url('assets/imgs/index/opp-card.jpg') ?>">
          <div class="card-body">
            <h4 class="card-title">LATEST NEWS/UPDATES</h4>
            <p class="lead" style="height: 5rem;">Stay informed with departmental updates, scholarship oppurtunities, etc.</p>
            <a href="<?= site_url('news'); ?>" class="btn btn-dark card-btn card-link">Explore</a>
          </div>
        </div>

        <div class="card">
          <img class="img-fluid card-img-top" src="<?= base_url('assets/imgs/index/gp-card.jpg') ?>">
          <div class="card-body">
            <h4 class="card-title">GP CALCULATOR</h4>
            <p class="lead" style="height: 5rem;">A handy assesment tool for calculating your GP</p>
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
            <p class="text-muted">Remember those awkward moments when you go online on WhatsApp only to discover about 100 unread messages waiting for you. You've already 
              had your fair share of frustation after the day's long hours of lectures. Now all you care about is getting that peaceful resting time, you probably don't want 
              to go through all those mesages (they're not all that useful anyway), so you take a peek at the last three messages. You're pretty much satisfied now because the last three mesages
              weren't useful just like you presumed (the rest are probably useless too), then you log off.
            </p>
            <p class="text-muted">It's the next day and you're in class as usual (ready to be frustrated again). Something looks different though. The class is quite, the books are recieving much attention as all your classmates are
              trying to revise for the test. Puzzled, you exclaimed: TEST? WHEN? WHERE? HOW?. Unfortunately for you, the test was announced in the WhatsApp group and you failed to read. To make matters worst, past questions, 
              ebooks and even useful materials were also shared but you missed all that and now you're pretty much doomed!
            </p>
            <p class="lead">Ok, that wasn't entirely your fault, following up departmental WhatsApp group messages is a pain. But that's not an excuse to fail! You'll usually end up missing vital info and resources!</p>
            <p class="lead">This is where Campus Space comes in! We give class representatives the oppurtunity to keep class members up to date with resources and useful information in an organised and student friendly manner.
              At Campus Space, we let you focus on what you're actually interested in. You no longer have to scroll through hundreds of not so useful messages to get updated
            </p>
            <p class="lead">You're not limited to just your departmental resources, you have access to every other faculty, department and level! Essentially, you can access resources for higher levels even before you get there!
            </p>
          </div>

          <div class="col-sm text-center">
            <img class="img-fluid img-thumbnail" src="<?= base_url('assets/imgs/index/reading.jpg') ?>">
          </div>
        </div>
    </section>

      <!--SECTION C .. OPPORTUNITIES-->
    <section id="section-c" class="mt-5">
        <h2 class="text-center">LATEST NEWS/UPDATES</h2>
        <p id="sub-header" class="text-center mb-5 mx-2">ASSIGNMENTS | SCHOLARSHIPS | COMPETITIONS | ASSESMENTS | GRANTS | GENERAL NEWS</p>

        <div class="container-fluid">
          <?php if (isset($news) && $news): ?>
            <?php foreach ($news as $news_item): ?>
              <div class="card jumbotron p-0 shadow shadow-sm">
                <div class="row">
                  <div class="col-sm">
                    <img class="img-fluid img-thumbnail" src="<?= base_url('assets/imgs/index/gp-card.jpg') ?>">
                  </div>
                  <div class="col-sm p-5">
                    <div class="pt-3">
                      <h4 class="card-title"><?= $news_item['news_title'] ?></h4>
                    </div>

                    <p class="mt-3"><?= ellipsize($news_item['news_content'], 200); ?></p>
                    <a href="<?= site_url('news/view/' . $news_item['id']); ?>" class="btn btn-dark mt-5 w-100">View Full Story</a>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          <?php else: ?>
            <div class="alert alert-info">
              <p class="lead">No News/Updates to display at this time. Please check again later!</p>
            </div>
          <?php endif; ?>
        </div>
    </section>

    <section class="mt-5 container mb-4">
      <div class="jumbtron p-3 shadow shadow-lg">
        <div class="p-4 bg-dark text-white mx-n3 mt-n3">
          <h4 class="text-center">Subscribe for Email Notifications</h4>
        </div>

        <div class="p-3 mt-3">
          <div class="alert alert-info mb-4 d-none" id="subscription_feedback" style="transition: all 0.3s linear;">
            <p class="lead" id="feedback_text"></p>
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

          <div class="input-group mt-3"> 
              <input type="text" class="form-control bg-light sub_email" name="email" maxlength="50" value="<?= set_value('email'); ?>" placeholder="Enter Email" required>
          </div>

          <div class="text-center">
            <img class="ajax-loader-indicator mt-4 mb-3 d-block mx-auto" src="<?= base_url('assets/imgs/ajax-loader.gif'); ?>" alt="Adding subscription...">

            <button class="btn btn-success btn-theme btn-lg mr-md-3" id="btn_news_sub" onclick="sub_for_news()">
              <span class="fas fa-envelope mr-2"></span> Subscribe for News
            </button>

            <button class="btn btn-success btn-theme btn-lg mt-2 mt-md-0" id="btn_resources_sub" onclick="sub_for_resources()">
              <span class="fas fa-envelope mr-2"></span> Subscribe for Resources
            </button>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>

<div class="text-center mt-5 index-loading-container">
    <img src="<?= base_url('assets/imgs/ajax-loader-spinner.gif'); ?>" alt="Loading..." class="img-fluid resource-loading">
</div>