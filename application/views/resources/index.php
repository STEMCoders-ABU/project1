<div class="res-container mt-5 m-3 shadow shadow-lg border border-dark rounded rounded-lg text-light">
    <div class="p-3 text-light">
        <h4 class="text-center mt-2">Resources</h4>
        <hr class="bg-light w-25 mb-5 mt-n1">

        <p class="lead text-center">Choose a Faculty, Department and Level</p>

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm mt-2">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-dark text-light">Faculty</span>                          
                        </div>
                        <select class="form-control bg-light" name="faculty" required> 
                            <option value="fac1">Physical Sciences</option>
                            <option value="fac2">Engineering</option>
                            <option value="fac3">Medicine</option>
                            <option value="fac4">Education</option>
                        </select>
                    </div>
                </div>

                <div class="col-sm mt-2">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-dark text-light">Department</span>                          
                        </div>
                        <select class="form-control bg-light" name="department" required> 
                            <option value="fac1">Computer Science</option>
                            <option value="fac2">Mathematics</option>
                            <option value="fac3">Statistics</option>
                            <option value="fac4">Physics</option>
                        </select>
                    </div>
                </div>

                <div class="col-sm mt-2">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-dark text-light">Level</span>                          
                        </div>
                        <select class="form-control bg-light" name="level" required> 
                            <option value="fac1">100</option>
                            <option value="fac2">200</option>
                            <option value="fac3">300</option>
                            <option value="fac4">400</option>
                            <option value="fac4">500</option>
                            <option value="fac4">600</option>
                        </select>
                    </div>
                </div>

                <div class="col-sm-2 mt-4 mt-md-0">
                    <a href="<?= site_url('resources/resource'); ?>" class="btn btn-dark btn-lg">
                        Find Resources <span class="fas fa-arrow-right ml-2"></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="mt-5 jumbotron m-2 text-dark p-4">
        <h4 class="text-center mt-2">Most Frequenty Accessed</h4>
        <hr class="bg-dark w-25 mb-5 mt-n1">

        <ul class="list-group">
            <li class="list-group-item list-group-item-light">
                <h4 class="text-dark">Resource Title</h4>
                <div class="ml-3">
                    <div class="mb-2"><span class="fas fa-list mr-2"></span>Category</div>
                    <div class="mb-2"><span class="fas fa-book mr-2"></span>Faculty</div>
                    <div class="mb-2"><span class="fas fa-book mr-2"></span>Department</div>
                    <div class="mb-2"><span class="fas fa-book mr-2"></span>Course</div>

                    <div class="mt-4">
                        <a href="" class="btn btn-dark mr-2">View</a>
                        <a href="" class="btn btn-dark">Download</a>
                    </div>
                </div>
            </li>

            <li class="list-group-item list-group-item-light">
                <h4 class="text-dark">Resource Title</h4>
                <div class="ml-3">
                    <div class="mb-2"><span class="fas fa-list mr-2"></span>Category</div>
                    <div class="mb-2"><span class="fas fa-book mr-2"></span>Faculty</div>
                    <div class="mb-2"><span class="fas fa-book mr-2"></span>Department</div>
                    <div class="mb-2"><span class="fas fa-book mr-2"></span>Course</div>

                    <div class="mt-4">
                        <a href="" class="btn btn-dark mr-2">View</a>
                        <a href="" class="btn btn-dark">Download</a>
                    </div>
                </div>
            </li>

            <li class="list-group-item list-group-item-light">
                <h4 class="text-dark">Resource Title</h4>
                <div class="ml-3">
                    <div class="mb-2"><span class="fas fa-list mr-2"></span>Category</div>
                    <div class="mb-2"><span class="fas fa-book mr-2"></span>Faculty</div>
                    <div class="mb-2"><span class="fas fa-book mr-2"></span>Department</div>
                    <div class="mb-2"><span class="fas fa-book mr-2"></span>Course</div>

                    <div class="mt-4">
                        <a href="" class="btn btn-dark mr-2">View</a>
                        <a href="" class="btn btn-dark">Download</a>
                    </div>
                </div>
            </li>
        </ul>
    </div>