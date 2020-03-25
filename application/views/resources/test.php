<div class="resources-siderbar-wrapper ml-n3 mr-n3">
    <!-- Sidebar -->
    <nav id="resources-sidebar" class="shadow shadow-lg">
        <div class="resources-sidebar-header">
            <h3>Resources Menu</h3>
        </div>

        <ul class="list-unstyled components">
            <li class="active">
                <a href="#materialsMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Materials</a>
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
                <a href="#">Handouts</a>
            </li>

            <li>
                <a href="#textbooksMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Textbooks</a>
                <ul class="collapse list-unstyled" id="textbooksMenu">
                    <li>
                        <a href="#">Textbook 1</a>
                    </li>
                    <li>
                        <a href="#">Textbook 2</a>
                    </li>
                    <li>
                        <a href="#">Textbook 3</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#">Videos</a>
            </li>
            <li>
                <a href="#">Ebooks</a>
            </li>
        </ul>
    </nav>

    <button type="button" id="resources-sidebar-collapse" class="btn btn-light shadow shadow-lg m-1">
        <span></span>
        <span></span>
        <span></span>
    </button>

    <!-- Contents -->
    <div id="resources-content">
        <!-- Main Contents -->
        <div class="mt-5" id="resources-main-contents">
            
            <!-- Search Bar -->
            <div class="search-bar card jumbotron mx-auto p-5 shadow shadow-lg">
                <?= form_open('resources/search', ''); ?>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text category">Category</span>                          
                        </div> 
                        <select class="form-control bg-light" name="category" required> 
                            <option value="materials">Materials</option>
                            <option value="documents">Documents</option>
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
        </div>
    </div>
</div>