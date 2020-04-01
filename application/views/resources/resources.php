<div class="resources-siderbar-wrapper pr-2">
    <!-- Sidebar -->
    <nav id="resources-sidebar" class="shadow shadow-lg">
        <div class="resources-sidebar-header">
            <h3>Resources Menu</h3>
        </div>

        <ul class="list-unstyled components">
            <li class="active">
                <a href="#materialsMenu" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle">Materials</a>
                <ul class="collapse list-unstyled" id="materialsMenu">
                    <li>
                        <a href="#">COSC101</a>
                    </li>
                    <li>
                        <a href="#">COSC102</a>
                    </li>
                    <li>
                        <a href="#">COSC103</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#textbooksMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Textbooks</a>
                <ul class="collapse list-unstyled" id="textbooksMenu">
                    <li>
                        <a href="#">COSC101</a>
                    </li>
                    <li>
                        <a href="#">COSC102</a>
                    </li>
                    <li>
                        <a href="#">COSC103</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#documentsMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Documents</a>
                <ul class="collapse list-unstyled" id="documentsMenu">
                    <li>
                        <a href="#">COSC101</a>
                    </li>
                    <li>
                        <a href="#">COSC102</a>
                    </li>
                    <li>
                        <a href="#">COSC103</a>
                    </li>
                </ul>
            </li>

            <li>
            <a href="#videosMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Videos</a>
                <ul class="collapse list-unstyled" id="videosMenu">
                    <li>
                        <a href="#">COSC101</a>
                    </li>
                    <li>
                        <a href="#">COSC102</a>
                    </li>
                    <li>
                        <a href="#">COSC103</a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>

    <!-- Contents -->
    <div id="resources-content">
        <button type="button" id="resources-sidebar-collapse" class="btn btn-light shadow shadow-lg m-1">
            <span></span>
            <span></span>
            <span></span>
        </button>
        
        <!-- Main Contents -->
        <div class="mt-5" id="resources-main-contents">
            
            <!-- Search Bar -->
            <div class="search-bar card jumbotron mx-auto p-5 shadow shadow-lg">
                <?= form_open('resources/search', ''); ?>
                    <div class="input-group mb-2">
                        <!--<div class="input-group-prepend">
                            <span class="input-group-text category">Category</span>                          
                        </div>--> 
                        <select class="form-control bg-light" name="category" required> 
                            <option value="materials">Materials</option>
                            <option value="documents">Documents</option>
                            <option value="documents">Textbooks</option>
                            <option value="videos">Videos</option>
                        </select>
                    </div>

                    <div class="input-group mt-3"> 
                        <input type="text" class="form-control bg-light" name="search" placeholder="Enter keyword" required>
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-success">
                                <span class="fas fa-search mr-1"></span> Search
                            </button>                          
                        </div>
                    </div>
                </form>
            </div>

            <div class="jumbotron p-4" style="margin-top: 6rem">
                <h4 class="text-center">COSC101 Resources</h4>
            </div>

            <!-- Resources Group -->
            <div class="card-deck mb-md-4">
                <div class="card">
                    <img src="<?= base_url('assets/imgs/resources/headers/book.jpg'); ?>" alt="Materials Image" class="img-fluid card-img-top"
                        style="height: 40vh">
                    <div class="card-header">
                        <h4>Material Title</h4>
                    </div>
                    <div class="card-body">
                        <p class="lead text-muted">
                            A brief description A brief description A brief description A brief description 
                        </p>

                        <div class="mt-5">
                            <a href="" class="btn btn-dark btn-lg btn-block">View</a>
                            <a href="" class="btn btn-dark btn-lg btn-block">Download</a>
                        </div>
                    </div>
                </div>
                
                <div class="card">
                    <div class="embed-responsive embed-responsive-16by9" style="height: 40vh">
                        <iframe  class="embed-responsive-item" src="<?php echo base_url('assets/imgs/comments/video.ogv'); ?>" allowfullscreen></iframe>
                     </div>
                    <div class="card-header">
                        <h4>Video Title</h4>
                    </div>
                    <div class="card-body">
                        <p class="lead text-muted">
                            A brief description A brief description A brief description A brief description 
                        </p>

                        <div class="mt-5">
                            <a href="" class="btn btn-dark btn-lg btn-block">View</a>
                            <a href="" class="btn btn-dark btn-lg btn-block">Download</a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="card-deck">
                <div class="card">
                    <img src="<?= base_url('assets/imgs/resources/headers/pdf.jpg'); ?>" alt="Textbooks Image" class="img-fluid card-img-top"
                        style="height: 40vh">
                    <div class="card-header">
                        <h4>Textbook Title</h4>
                    </div>
                    <div class="card-body">
                        <p class="lead text-muted">
                            A brief description A brief description A brief description A brief description 
                        </p>

                        <div class="mt-5">
                            <a href="" class="btn btn-dark btn-lg btn-block">View</a>
                            <a href="" class="btn btn-dark btn-lg btn-block">Download</a>
                        </div>
                    </div>
                </div>
                
                <div class="card">
                    <img src="<?= base_url('assets/imgs/resources/headers/documents.jpg'); ?>" alt="Documents Image" class="img-fluid card-img-top"
                        style="height: 40vh">
                    <div class="card-header">
                        <h4>Document Title</h4>
                    </div>
                    <div class="card-body">
                        <p class="lead text-muted">
                            A brief description A brief description A brief description A brief description 
                        </p>

                        <div class="mt-5">
                            <a href="" class="btn btn-dark btn-lg btn-block">View</a>
                            <a href="" class="btn btn-dark btn-lg btn-block">Download</a>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Frequently Accessed Resources -->
            <div class="mt-5">
                <div class="jumbotron p-3">
                    <h4 class="alex-font text-center">Frequently Accessed Resources</h4>
                    <hr class="bg-dark w-25 mb-5">

                    <div>
                        <div class="p-3 bg-light mt-3">
                            <div class="d-inline">
                                <span class="fas fa-arrow-right mr-4"></span>
                            </div>
                            <div class="d-inline">
                                <h5 class="d-inline">Resource Title</h5>
                                <div class="ml-5 mt-2">
                                    <div class="d-block"><span class="far fa-comments mr-2"></span> 13k comments</div>
                                    <div class="mt-2">
                                        <a href="" class="btn btn-dark btn-sm">View</a>
                                        <a href="" class="btn btn-dark btn-sm">Download</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="p-3 bg-light mt-3">
                            <div class="d-inline">
                                <span class="fas fa-arrow-right mr-4"></span>
                            </div>
                            <div class="d-inline">
                                <h5 class="d-inline">Resource Title</h5>
                                <div class="ml-5 mt-2">
                                    <div class="d-block"><span class="far fa-comments mr-2"></span> 13k comments</div>
                                    <div class="mt-2">
                                        <a href="" class="btn btn-dark btn-sm">View</a>
                                        <a href="" class="btn btn-dark btn-sm">Download</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="p-3 bg-light mt-3">
                            <div class="d-inline">
                                <span class="fas fa-arrow-right mr-4"></span>
                            </div>
                            <div class="d-inline">
                                <h5 class="d-inline">Resource Title</h5>
                                <div class="ml-5 mt-2">
                                    <div class="d-block"><span class="far fa-comments mr-2"></span> 13k comments</div>
                                    <div class="mt-2">
                                        <a href="" class="btn btn-dark btn-sm">View</a>
                                        <a href="" class="btn btn-dark btn-sm">Download</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="p-3 bg-light mt-3">
                            <div class="d-inline">
                                <span class="fas fa-arrow-right mr-4"></span>
                            </div>
                            <div class="d-inline">
                                <h5 class="d-inline">Resource Title</h5>
                                <div class="ml-5 mt-2">
                                    <div class="d-block"><span class="far fa-comments mr-2"></span> 13k comments</div>
                                    <div class="mt-2">
                                        <a href="" class="btn btn-dark btn-sm">View</a>
                                        <a href="" class="btn btn-dark btn-sm">Download</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Comments -->
            <div class="mt-5 jumbotron p-3">
                <h4 class="alex-font text-center">Category Comments</h4>
                <hr class="bg-dark w-25 mb-5">

                <div class="p-3 bg-light mt-3 container-fluid">
                    <div class="row">
                        <div class="col-sm-2">
                            <img src="<?= base_url('assets/imgs/avatar.png'); ?>" alt="Avatar" class="img-fluid" style="height: 20vh">
                        </div>

                        <div class="col-sm mt-3 p-md-0 pt-md-2">
                            <h4>Display Name</h4>
                            <small class="text-mute"><span class="far fa-calendar mr-2"></span>31-01-2020</small>

                            <p class="lead mt-3 text-muted">
                                This person said something about this resource category....
                            </p>
                        </div>
                    </div>
                </div>

                <div class="p-3 bg-light mt-3 container-fluid">
                    <div class="row">
                        <div class="col-sm-2">
                            <img src="<?= base_url('assets/imgs/avatar.png'); ?>" alt="Avatar" class="img-fluid" style="height: 20vh">
                        </div>

                        <div class="col-sm mt-3 p-md-0 pt-md-2">
                            <h4>Display Name</h4>
                            <small class="text-mute"><span class="far fa-calendar mr-2"></span>31-01-2020</small>

                            <p class="lead mt-3 text-muted">
                                This person said something about this resource category....
                            </p>
                        </div>
                    </div>
                </div>

                <div class="p-3 bg-light mt-3 container-fluid">
                    <div class="row">
                        <div class="col-sm-2">
                            <img src="<?= base_url('assets/imgs/avatar.png'); ?>" alt="Avatar" class="img-fluid" style="height: 20vh">
                        </div>

                        <div class="col-sm mt-3 p-md-0 pt-md-2">
                            <h4>Display Name</h4>
                            <small class="text-mute"><span class="far fa-calendar mr-2"></span>31-01-2020</small>

                            <p class="lead mt-3 text-muted">
                                This person said something about this resource category....
                            </p>
                        </div>
                    </div>
                </div>

                <div class="p-3 bg-light mt-3 container-fluid">
                    <div class="row">
                        <div class="col-sm-2">
                            <img src="<?= base_url('assets/imgs/avatar.png'); ?>" alt="Avatar" class="img-fluid" style="height: 20vh">
                        </div>

                        <div class="col-sm mt-3 p-md-0 pt-md-2">
                            <h4>Display Name</h4>
                            <small class="text-mute"><span class="far fa-calendar mr-2"></span>31-01-2020</small>

                            <p class="lead mt-3 text-muted">
                                This person said something about this resource category....
                            </p>
                        </div>
                    </div>
                </div>

                <div class="bg-ligh p-3" style="margin-top: 9rem">
                    <?= form_open('resources/add_comment'); ?>
                        <div class="input-group mt-3"> 
                            <input type="text" class="form-control" name="name" placeholder="Display Name" required>
                        </div>

                        <div class="form-group mt-3"> 
                            <textarea rows="3" class="form-control" name="message" placeholder="Your Message" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-success btn-lg" style="background: seagreen;">
                            <span class="fas fa-comment mr-1"></span> Comment
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>