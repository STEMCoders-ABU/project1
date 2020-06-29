    </main>

    <footer id="generic-footer">
      <div class="scroll-to-top scroll-to-top-invisible">
        <span class="fas fa-arrow-up"></span>
      </div>

      <div class="row">
        <div class="col-sm">
          <a class="brand" href="<?php echo site_url() ?>">
            <span class="fas fa-tools mr-2"></span><h4 class="d-inline align-bottom title-font logo-text">Campus</h4><h4 class="logo-text-2">Space</h4>
          </a>
          <p class="lead text-muted">More Info, More Space</p>

          <img src="<?= base_url('assets/imgs/stemlogo.jpg') ?>" alt="STEM Coders Logo" class="img-fluid footer-logo">
        </div>

        <div class="col-sm text-white mt-4 mt-md-0">
          <h4 class="text-left">LINKS</h4>

          <div class="links mt-5">
            <a href="<?php echo site_url('contact') ?>"><span class="fas fa-arrow-right mr-2"></span>Contact Us</a>
            <a href="<?php echo site_url('#about') ?>"><span class="fas fa-arrow-right mr-2"></span>About Us</a>
            <a href="https://stemcoders.com.ng"><span class="fas fa-arrow-right mr-2"></span>STEM Coders Club</a>
            <a href="https://abu.edu.ng"><span class="fas fa-arrow-right mr-2"></span>Ahmadu Bello University</a>
          </div>
        </div>

        <div class="col-sm text-white mt-4 mt-md-0">
          <h4 class="text-left">STAY IN TOUCH</h4>

          <div class="mt-5 text-muted">
            <span class="fab fa-facebook fa-3x mr-2"></span>
            <span class="fab fa-whatsapp fa-3x mr-2"></span>
            <span class="fab fa-twitter fa-3x"></span>
          </div>
        </div>
      </div>

      <div class="mt-5 copyright">
        <p class="lead text-muted">&copy; <?= date('Y'); ?> STEM Coders Club. All Rights Reserved</p>
      </div>
    </footer>
</div>

<script src="<?php echo base_url('assets/js/jquery-3.4.1.js') ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/scripts.js') ?>"></script>

</body>
</html>
