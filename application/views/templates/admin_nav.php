  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">#GarvHai!</a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#">Welcome <?php echo $this->session->username;?></a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Account <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="http://www.garvhai.in/index.php/admin/logout">Logout</a></li>
            </ul>
          </li>
        </ul>
        <!-- <form class="navbar-form navbar-right">
          <input type="text" class="form-control" placeholder="Search...">
        </form> -->
      </div>
    </div>
  </nav>
   <div class="container-fluid">
    <div class="row">
      <div class="col-sm-3 col-md-2 sidebar">
        <ul class="nav nav-sidebar">
          <li <?php echo site_url("admin/dashbord") == current_url() ? 'class="active"' : ''; ?> ><a href="http://www.garvhai.in/index.php/admin/dashbord">Player List</a></li>
          <li <?php echo site_url("admin/add_player") == current_url() ? 'class="active"' : ''; ?> ><a href="http://www.garvhai.in/index.php/admin/add_player">Add New Player <span class="sr-only">(current)</span></a></li>
          <li <?php echo site_url("admin/contact_us_user") == current_url() ? 'class="active"' : ''; ?>><a href="http://www.garvhai.in/index.php/admin/contact_us_user">Contact Us User<span class="sr-only">(current)</span></a></li>
        </ul>
      </div>
