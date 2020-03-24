<div class="wrapper ml-n3 mr-n3">

  <!-- sidebar design -->
  <nav id="sidebar">
    <div class="sidebar-header">
        <h3>Resources</h3>
    </div>
    <ul class="list-unstyled components">
      <li class="active">
        <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Materials</a>
          <ul class="collapse list-unstyled" id="homeSubmenu">
              <li>
                  <a href="#">cosc101</a>
              </li>
              <li>
                  <a href="#">cosc102</a>
              </li>
              <li>
                  <a href="#">cosc211</a>
              </li>
              <li>
                  <a href="#">cosc212</a>
              </li>
          </ul> 
      </li>
      
      <li>
          <a href="#">handout</a>
      </li>
      
      <li>
          <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Textbooks</a>
          <ul class="collapse list-unstyled" id="pageSubmenu">
              <li>
                  <a href="#">textbk1</a>
              </li>
              <li>
                  <a href="#">textbk2</a>
              </li>
              <li>
                  <a href="#">textbk3</a>
              </li>
              <li>
                  <a href="#">textbk4</a>
              </li>
          </ul> 
      </li>
      
      <li>
          <a href="#">Videos</a>
      </li>
      <li>
          <a href="#">Documents</a>
      </li>
    </ul>
  </nav>
  <!-- end of sidebar design -->   


  <div id="content" class="container">
    <!-- toggle nav -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">  
        <button type="button" id="sidebarCollapse" class="btn btn-info">
          <i class="fa fa-align-left mr-2"></i> <span>Menu</span>
        </button>
      </div>
    </nav>
      <!-- end of toggle nav -->

           <!-- entire page contents container --> 
            <div class="container">

              <!-- search box -->
            <div class="row mt-3 mb-3">

            <div class="col-sm-8">

              <div class="card">
                <div class="card-body shadow shadow-sm">
                      <div class="input-group mt-2 mb-2">
                          <div class="input-group-prepend w-75">
                              <span class="input-group-text">categories</span>   
                                  <select class="form-control bg-light" name="faculty" required>
                                      <option value="" selected="selected">-select--</option> 
                                      <option value="ADM">Materials</option>
                                      <option value="AGR">Documents</option>
                                      <option value="ART"> Videos</option>
                                </select>                          
                          </div> 
                    </div>

                  <div class="input-group">
                    <input type="text" class="form-control bg-light" name="search" placeholder="Search">
                        <div class="input-group-append">
                            <button class="btn btn-success" type="submit">Go</button>
                        </div>
                 </div>
              </div>
            </div>
            
              
            </div>
          
         </div>
         <!-- end search box -->


         <!-- row for frequently visited and search displayed-->
         <div class="row">
          <div class="col-sm-11 mx-auto">
            <hr class="bg-dark w-75 mt-3 mb-3">


            <!-- search found/not found display box -->
            <div class="card">
              <div class="card-body shadow p-5">
                 <div class="row mt-1">
                       <div class="col-3">
                           <img class="img-fluid" src="<?php echo base_url('assets/imgs/default_post_img.png'); ?>" />
                       </div>
                       <div class="col text-secondary">
                           <h6>The course tittle geos here</h6>
                           <div class="d-block mr-1 mr-md-3"><i class="far fa-user mr-1">
                                </i><small>The cours code : cosc 101</small>
                             </div>

                            <div class="d-block mr-1 mr-md-3"><i class="far fa-user mr-1">
                                 </i><small>Resources type: pdf</small>
                             </div>

                            <div class="d-block mr-1 mr-md-3"><i class="far fa-user mr-1">
                                 </i><small>read more...</small>
                             </div>
                            
                       </div>
                        <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fa fa-download"></i> <span>download</span>
                    </button>

                   </div>
              </div>
            </div>
            <!--  end of search found/not found display box -->

            <!-- begining of cards for all frequent resources -->
              <div class="card p-2 mt-3">
                       
                 <div class="card-header text-light text-center bg-dark">
                        <i class="far fa-user mr-1"></i>frequently visited
                        <hr class="w-50 bg-success">
                  </div>


                    <!-- begining of card for all avaliable resourses -->
                <div class="card-body shadow">
                        <div class="row mt-1">

                    <div class="col-sm-4 mb-3">
                       <div class="card">
                         <img class="img-fluid" src="<?php echo base_url('assets/imgs/default_post_img.png'); ?>" />
                         <div class="card-body mb-0">
                            <h4 class="card-title">
                              introduction to programing
                            </h4>                               
                         </div>

                           <div class="card-text ml-2"><small>
                             some text about this resources goes here
                             some text about this resources goes here </small>
                           </div>
                        <div class="text-dark p-2">
                          <div class="d-inline mr-2 mr-md-3"><i class="fa fa-download mr-1"></i><small>50</small></div>
                          <div class="d-inline mr-2 mr-md-3"><i class="fa fa-folder mr-1"></i><small>General</small></div>
                          <div class="d-inline mr-2 mr-md-3"><i class="fa fa-comments mr-1"></i><small>100</small></div>
                        </div> 
                       </div>
                     </div>  


                      <div class="col-sm-4 mb-3">
                       <div class="card">
                         <img class="img-fluid" src="<?php echo base_url('assets/imgs/default_post_img.png'); ?>" />
                         <div class="card-body mb-0">
                            <h4 class="card-title">
                              introduction to programing
                            </h4>                               
                         </div>

                           <div class="card-text ml-2"><small>
                             some text about this resources goes here
                             some text about this resources goes here </small>
                           </div>
                        <div class="text-dark p-2">
                          <div class="d-inline mr-2 mr-md-3"><i class="fa fa-download mr-1"></i><small>50</small></div>
                          <div class="d-inline mr-2 mr-md-3"><i class="fa fa-folder mr-1"></i><small>General</small></div>
                          <div class="d-inline mr-2 mr-md-3"><i class="fa fa-comments mr-1"></i><small>100</small></div>
                        </div> 
                       </div>
                     </div> 

                     <div class="col-sm-4 mb-3">
                       <div class="card">
                         <img class="img-fluid" src="<?php echo base_url('assets/imgs/default_post_img.png'); ?>" />
                         <div class="card-body mb-0">
                            <h4 class="card-title">
                              introduction to programing
                            </h4>                               
                         </div>

                           <div class="card-text ml-2"><small>
                             some text about this resources goes here
                             some text about this resources goes here </small>
                           </div>
                        <div class="text-dark p-2">
                          <div class="d-inline mr-2 mr-md-3"><i class="fa fa-download mr-1"></i><small>50</small></div>
                          <div class="d-inline mr-2 mr-md-3"><i class="fa fa-folder mr-1"></i><small>General</small></div>
                          <div class="d-inline mr-2 mr-md-3"><i class="fa fa-comments mr-1"></i><small>100</small></div>
                        </div> 
                       </div>
                     </div> 

                     <div class="col-sm-4 mb-3">
                       <div class="card">
                         <img class="img-fluid" src="<?php echo base_url('assets/imgs/default_post_img.png'); ?>" />
                         <div class="card-body mb-0">
                            <h4 class="card-title">
                              introduction to programing
                            </h4>                               
                         </div>

                           <div class="card-text ml-2"><small>
                             some text about this resources goes here
                             some text about this resources goes here </small>
                           </div>
                        <div class="text-dark p-2">
                          <div class="d-inline mr-2 mr-md-3"><i class="fa fa-download mr-1"></i><small>50</small></div>
                          <div class="d-inline mr-2 mr-md-3"><i class="fa fa-folder mr-1"></i><small>General</small></div>
                          <div class="d-inline mr-2 mr-md-3"><i class="fa fa-comments mr-1"></i><small>100</small></div>
                        </div> 
                       </div>
                     </div> 

                     <div class="col-sm-4 mb-3">
                       <div class="card">
                         <img class="img-fluid" src="<?php echo base_url('assets/imgs/default_post_img.png'); ?>" />
                         <div class="card-body mb-0">
                            <h4 class="card-title">
                              introduction to programing
                            </h4>                               
                         </div>

                           <div class="card-text ml-2"><small>
                             some text about this resources goes here
                             some text about this resources goes here </small>
                           </div>
                        <div class="text-dark p-2">
                                <div class="d-inline mr-2 mr-md-3"><i class="fa fa-download mr-1"></i><small>50</small></div>
                                <div class="d-inline mr-2 mr-md-3"><i class="fa fa-folder mr-1"></i><small>General</small></div>
                                <div class="d-inline mr-2 mr-md-3"><i class="fa fa-comments mr-1"></i><small>100</small></div>
                        </div> 
                       </div>
                     </div> 

                     <div class="col-sm-4 mb-3">
                       <div class="card">
                         <img class="img-fluid" src="<?php echo base_url('assets/imgs/default_post_img.png'); ?>" />
                         <div class="card-body mb-0">
                            <h4 class="card-title">
                              introduction to programing
                            </h4>                               
                         </div>

                           <div class="card-text ml-2"><small>
                             some text about this resources goes here
                             some text about this resources goes here </small>
                           </div>
                        <div class="text-dark p-2">
                          <div class="d-inline mr-2 mr-md-3"><i class="fa fa-download mr-1"></i><small>50</small></div>
                          <div class="d-inline mr-2 mr-md-3"><i class="fa fa-folder mr-1"></i><small>General</small></div>
                          <div class="d-inline mr-2 mr-md-3"><i class="fa fa-comments mr-1"></i><small>100</small></div>
                        </div> 
                       </div>
                     </div> 

                     <div class="col-sm-4 mb-3">
                       <div class="card">
                         <img class="img-fluid" src="<?php echo base_url('assets/imgs/default_post_img.png'); ?>" />
                         <div class="card-body mb-0">
                            <h4 class="card-title">
                              introduction to programing
                            </h4>                               
                         </div>

                           <div class="card-text ml-2"><small>
                             some text about this resources goes here
                             some text about this resources goes here </small>
                           </div>
                        <div class="text-dark p-2">
                          <div class="d-inline mr-2 mr-md-3"><i class="fa fa-download mr-1"></i><small>50</small></div>
                          <div class="d-inline mr-2 mr-md-3"><i class="fa fa-folder mr-1"></i><small>General</small></div>
                          <div class="d-inline mr-2 mr-md-3"><i class="fa fa-comments mr-1"></i><small>100</small></div>
                        </div> 
                       </div>
                     </div> 

                     <div class="col-sm-4 mb-3">
                       <div class="card">
                         <img class="img-fluid" src="<?php echo base_url('assets/imgs/default_post_img.png'); ?>" />
                         <div class="card-body mb-0">
                            <h4 class="card-title">
                              introduction to programing
                            </h4>                               
                         </div>

                           <div class="card-text ml-2"><small>
                             some text about this resources goes here
                             some text about this resources goes here </small>
                           </div>
                        <div class="text-dark p-2">
                          <div class="d-inline mr-2 mr-md-3"><i class="fa fa-download mr-1"></i><small>50</small></div>
                          <div class="d-inline mr-2 mr-md-3"><i class="fa fa-folder mr-1"></i><small>General</small></div>
                          <div class="d-inline mr-2 mr-md-3"><i class="fa fa-comments mr-1"></i><small>100</small></div>
                        </div> 
                       </div>
                     </div> 

                     <div class="col-sm-4 mb-3">
                       <div class="card">
                         <img class="img-fluid" src="<?php echo base_url('assets/imgs/default_post_img.png'); ?>" />
                         <div class="card-body mb-0">
                            <h4 class="card-title">
                              introduction to programing
                            </h4>                               
                         </div>

                           <div class="card-text ml-2"><small>
                             some text about this resources goes here
                             some text about this resources goes here </small>
                           </div>
                        <div class="text-dark p-2">
                          <div class="d-inline mr-2 mr-md-3"><i class="fa fa-download mr-1"></i><small>50</small></div>
                          <div class="d-inline mr-2 mr-md-3"><i class="fa fa-folder mr-1"></i><small>General</small></div>
                          <div class="d-inline mr-2 mr-md-3"><i class="fa fa-comments mr-1"></i><small>100</small></div>
                        </div> 
                       </div>
                     </div> 





                  
                       

                   </div>

                
              </div>
               <!-- begining of card for all avaliable resourses -->
            </div>
            <!-- end of cards for all frequent resources -->
            
          </div>
           
         </div>



         <!-- begining of comment section-->
        <div class="row mt-4" >
            <div class="col-sm mb-2">
                <div class="card mb-2">
                  <div class="card-body">

                    <div class="card-header bg-dark">

                        <div class="card-title text-light"><h5>read users comments
                          <span class="fas fa-angle-down ml-3 text-success" data-toggle="collapse" aria-expanded="false"  data-target="#prologue-8"></span></h5>
                        </div>
                    </div>

                      <div class="card-body" id="prologue-8">
                         <div class="text-left card-text"><p><small>
                                users comments will be display here dhdhdd fkdkdkkdjff djdjdjfjkffkksjd fjfjdjdjdhd bsndnfnfjfj sjdjdjdb sjdjdndn users comments will be display here dhdhdd fkdkdkkdjff djdjdjfjkffkksjd fjfjdjdjdhd bsndnfnfjfj sjdjdjdb sjdjdndn </small> </p> 
                              <h6 class="d-inline mr-2"><i class="fa fa-user mr-2 text-dark"></i><samll> Username <small></h6>
                              <h6 class="d-inline mr-2"><i class="fa fa-calendar mr-2 text-dark"></i>
                              <small>01-04-2020</small></h6>
                                <hr class="bg-success"> 
                          </div>

                      <div class="text-left card-text"><p><small>
                          users comments will be display here dhdhdd fkdkdkkdjff djdjdjfjkffkksjd fjfjdjdjdhd bsndnfnfjfj sjdjdjdb sjdjdndn users comments will be display here dhdhdd fkdkdkkdjff djdjdjfjkffkksjd fjfjdjdjdhd bsndnfnfjfj sjdjdjdb sjdjdndn </small> </p> 
                      <h6 class="d-inline mr-2"><i class="fa fa-user mr-2 text-dark"></i><samll> Username <small></h6>
                      <h6 class="d-inline mr-2"><i class="fa fa-calendar mr-2 text-dark"></i>
                      <small>01-04-2020</small></h6>
                        <hr class="bg-success"> 
                      </div>

                             
                            
                      </div>      

                </div>
              </div>

              <div class="card">
                <div class="card-header bg-dark">
                    <div class="card-title text-light"><h5> write a comment</h5></div>
                </div>

                  <div class="card-body">
                       <div class="form-group card-text">
                          <textarea rows="3" class="form-control bg-light" placeholder="Your Message" required></textarea>
                                <div class="invalid-feedback">
                                  Please fill out this field.
                                </div>
                       </div>
                       <div class="mx-auto">
                          <button type="submit" class="btn btn-success">Send Message</button>
                      </div>

                     </div>

                    
              </div>
          
              
            </div>
          </div>
         <!-- row for frequently visited and search displayed-->
         

          



            
          </div>
          <!--  end of entire page contents container -->




        </div>
      




</div>