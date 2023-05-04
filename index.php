<!DOCTYPE html>
  <!-- Coding by CodingLab | www.codinglabweb.com -->
<html lang="en">
<head>
    <link rel="apple-touch-icon" sizes="180x180" href="favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon_io/favicon-16x16.png">
    <link rel="manifest" href="favicon_io/site.webmanifest">
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index Manager | Table List</title>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="js/script.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <!----======== CSS ======== -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    
    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    
    <!--<title>Dashboard Sidebar Menu</title>--> 
</head>
<body>
  <div id="pageloader">
    <div class="spinner">
      <div class="bounce1"></div>
      <div class="bounce2"></div>
      <div class="bounce3"></div>
    </div>
      
  </div>
  <nav class="sidebar close">
    <header>
      <div class="image-text">
        <span class="image">
          <img src="media/pc (2).png" alt="">
        </span>

        <div class="texts logo-text">
          <span class="name">Index Manager</span>
          <span class="profession">Dashboard</span>
        </div>
      </div>

      <i class='bx bx-chevron-right toggle'></i>
    </header>

    <div class="menu-bar">
      <div class="menu">
        <li class="search-box">
          <!-- <i class='bx bx-search icon'></i>
          <input type="text" placeholder="Search..."> -->
        </li>

        <ul class="menu-links">
          <li class="nav-link">
            <a href="homepage.html" data-titles="Dashboard">
              <i class='bx bx-home-alt icon' ></i>
              <span class="texts nav-text">Homepage</span>
              <!-- <span class="titlehov">Dashboard</span> -->
            </a>
          </li>

          <li class="nav-link">
            <a href="form.php" data-titles="Application Form">
              <i class='bx bx-file icon'></i>
              <span class="texts nav-text">Application Form</span>
              <!-- <span class="titlehov">Application Form</span> -->
            </a>
          </li>

          <li id="active" class="nav-link">
            <a href="index.php" data-titles="Applicants' List">
              <i class='bx bx-table icon' ></i>
              <span class="texts nav-text">Applicants' List</span>
              <!-- <span class="titlehov">Applicants' List</span> -->
            </a>
          </li>

          <li class="nav-link">
            <a href="help.html" data-titles="How it works">
              <i class='bx bx-question-mark icon' ></i>
              <span class="texts nav-text">How it works</span>
              <!-- <span class="titlehov">How it works</span> -->
            </a>
          </li>

        </ul>
      </div>

      <div class="bottom-content">
        <li class="">
          <a href="about.html" data-titles="About us">
            <i class='bx bx-heart icon' ></i>
            <span class="texts nav-text">About us</span>
          </a>
        </li>

        <li class="mode">
          <div class="sun-moon">
            <i class='bx bx-moon icon moon'></i>
            <i class='bx bx-sun icon sun'></i>
          </div>
          <span class="mode-text texts">Dark mode</span>
          <div class="toggle-switch">
            <span class="switch"></span>
          </div>
        </li>
      </div>

    </div>
  </nav>

  <section class="home">
    <div class="titles">
      <div class="texts">
        <a href="homepage.html">
          Index Manager
          <p>a talent acquisition system for HR Management</p>
        </a>
      </div>

    </div>

      <div class="grid-container2">

        <div class="row mb-1">
          <div class="col-4">
              <div class="input-group input-group-lg">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon2"><i class="fa fa-search" aria-hidden="true"></i></span>
                </div>
                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" placeholder="Search..." id="searchinput">
              </div>
          </div>
        </div>

        <div class="grid-content">
            <div class="tableimg"> 

              <h1 id="gridh1">Applicants' List</h1>
              <p id="gridp">
                All created application forms are recorded and stored here and are shown inside the table. 
              </p>

              <div id="botan" class="row mb-4">
                <div class="col-6">
                  <a href="form.php"><button type="button" class="btn btn-primary" id="addnewbtn">Add Applicant</button></a>
                </div>
              </div>

            </div>
        </div>

        <div id="listahan" class="grid-content">

          <div class="container">
            <div class="alert alert-success text-center messages" role="alert"></div>

            <?php
              include_once 'update.php';
              include_once 'profile.php';
            ?>
            
            <?php
              include_once 'playerstable.php';
            ?>

            <nav id="pagination"></nav>
            <input type="hidden" name="currentpage" id="currentpage" value="1">
          </div>
        </div>
      </div>
    </div>
  </section>
</body>
</html>