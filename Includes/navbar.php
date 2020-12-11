<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top"><span><img src="assets/img/navbar-logo.svg" style="height: 7vh;" alt="" /></span></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ml-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ml-auto text-center">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#services">Donors</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#team">Team</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact" data-toggle="modal" data-target="#exampleModalCenter">Contact</a></li>
                        <?php
                          // Initialize the session
                          session_start();
                          
                          // Check if the user is logged in, if not then redirect him to login page
                          if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
                        ?>
                            <li class="nav-item pl-2 mb-2 mb-md-0">
                              <a href="login.php" type="button" onMouseOver="this.style.color='white'" onMouseOut="this.style.color='#ffa900'"
                              class="btn btn-outline-warning btn-md btn-rounded btn-navbar waves-effect waves-light">Become a Donor</a>
                            </li>
                        <?php
                          }else{
                        ?>
                            <li class="nav-item pl-2 mb-2 mb-md-0">
                              <a href="donor.php" type="button" onMouseOver="this.style.color='#a3a3a3'" onMouseOut="this.style.color='white'"
                              class="btn btn-outline-light btn-md btn-rounded btn-navbar waves-effect waves-light">Add Donors</a>
                            </li>
                            <li class="nav-item pl-2 mb-2 mb-md-0">
                              <a href="logout.php" type="button" onMouseOver="this.style.color='white'" onMouseOut="this.style.color='#f93154'"
                              class="btn btn-outline-danger btn-md btn-rounded btn-navbar waves-effect waves-light">Sign Out</a>
                            </li>
                        <?php
                          }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Contact Us</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-3 text-center list-inline mx-auto justify-content-center">
                <ul class="list-unstyled mb-0">
                    <li><i class="fas fa-map-marker-alt fa-2x"></i>
                        <p>MESCE, Kuttippuram, Malappuram</p>
                    <i class="fas fa-phone mt-4 fa-2x"></i>
                        <p>+ 91 XXX XXX 89</p>
                    <i class="fas fa-envelope mt-4 fa-2x"></i>
                        <p style="margin-left: -30px;">contact@donateblood.com</p>
                    </li>
                </ul>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>