<!DOCTYPE HTML>
<html lang="en">

<head>
    <link rel="apple-touch-icon" sizes="180x180" href="favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon_io/favicon-16x16.png">
    <link rel="manifest" href="favicon_io/site.webmanifest">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index Manager | Forms Page</title>

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="js/script.js"></script>

    <!----======== CSS ======== -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="css/style.css">

    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

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
                            <i class='bx bx-home-alt icon'></i>
                            <span class="texts nav-text">Homepage</span>
                            <!-- <span class="titlehov">Dashboard</span> -->
                        </a>
                    </li>

                    <li id="active" class="nav-link">
                        <a href="form.php" data-titles="Application Form">
                            <i class='bx bx-file icon'></i>
                            <span class="texts nav-text">Application Form</span>
                            <!-- <span class="titlehov">Application Form</span> -->
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="index.php" data-titles="Applicants' List">
                            <i class='bx bx-table icon'></i>
                            <span class="texts nav-text">Applicants' List</span>
                            <!-- <span class="titlehov">Applicants' List</span> -->
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="help.html" data-titles="How it works">
                            <i class='bx bx-question-mark icon'></i>
                            <span class="texts nav-text">How it works</span>
                            <!-- <span class="titlehov">How it works</span> -->
                        </a>
                    </li>

                </ul>
            </div>

            <div class="bottom-content">
                <li class="">
                    <a href="about.html" data-titles="About us">
                        <i class='bx bx-heart icon'></i>
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

        <div id="formSec">
            <div class="containers">
                <h1>Add Applicant <i class="fa fa-user-circle-o" aria-hidden="true"></i></h1>
                <div class="contents">
                    <form id="addform" method="POST" enctype="multipart/form-data">
                        <div class="user-details">

                            <div class="input-box">
                                <span class="details"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Full Name</span>
                                <input type="text" id="username" name="username" required="required" autocomplete="off" placeholder="Enter name">
                            </div>

                            <div class="input-box">
                                <span class="details"><i class="fa fa-suitcase" aria-hidden="true"></i> Occupation</span>
                                <input type="occupation" id="occupation" name="occupation" required="required" autocomplete="off" placeholder="Enter occupation">
                            </div>

                            <div class="input-box">
                                <span class="details"><i class="fa fa-genderless" aria-hidden="true"></i> Gender</span>
                                <input type="gender" id="gender" name="gender" required="required" autocomplete="off" placeholder="Enter gender">
                            </div>

                            <div class="input-box">
                                <span class="details"><i class="fa fa-calendar-o" aria-hidden="true"></i>Date Applied</span>
                                <input type="date" id="date" name="date" required="required" autocomplete="off">
                            </div>

                            <div class="input-box">
                                <span class="details"><i class="fa fa-envelope-o" aria-hidden="true"></i> Email</span>
                                <input type="email" id="email" name="email" required="required" autocomplete="off" placeholder="Enter email">
                            </div>

                            <div class="input-box">
                                <span class="details"><i class="fa fa-birthday-cake" aria-hidden="true"></i> Date of Birth</span>
                                <input type="date" id="birth" name="birth" required="required" autocomplete="off">
                            </div>

                            <div class="input-box">
                                <span class="details"><i class="fa fa-phone" aria-hidden="true"></i> Phone Number</span>
                                <input type="phone" id="phone" name="phone" required="required" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxLength="10" minLength="10" autocomplete="off" placeholder="Enter phone number">
                            </div>

                            <div class="input-box">
                                <span class="details"><i class="fa fa-address-book" aria-hidden="true"></i> Address</span>
                                <input type="address" id="address" name="address" required="required" autocomplete="off" placeholder="Enter address">
                            </div>

                            <div class="input-box">
                                <span class="details"><i class="fa fa-building" aria-hidden="true"></i> City</span>
                                <input type="city" id="city" name="city" required="required" autocomplete="off" placeholder="Enter city name">
                            </div>

                            <div class="input-box">
                                <span class="details"><i class="fa fa-address-card" aria-hidden="true"></i> Zip Code</span>
                                <input type="zip" id="zip" name="zip" required="required" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxLength="4" minLength="4" autocomplete="off" placeholder="Enter zip code">
                            </div>

                            <div class="input-box">
                                <span class="details"><i class="fa fa-flag" aria-hidden="true"></i> Citizenship</span>
                                <input type="citizenship" id="citizenship" name="citizenship" required="required" autocomplete="off" placeholder="Enter citizenship">
                            </div>

                            <div class="input-box">
                                <span class="details"><i class="fa fa-book" aria-hidden="true"></i> Religion</span>
                                <input type="religion" id="religion" name="religion" required="required" autocomplete="off" placeholder="Enter religion">
                            </div>

                            <div class="input-box">
                                <span class="details"><i class="fa fa-id-card-o" aria-hidden="true"></i> SSS ID No</span>
                                <input type="sss" id="sss" name="sss" required="required" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxLength="13" minLength="8" autocomplete="off" placeholder="Enter ID number">
                            </div>

                            <div class="input-box">
                                <span class="details"><i class="fa fa-id-card" aria-hidden="true"></i> UMID No</span>
                                <input type="umid" id="umid" name="umid" required="required" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxLength="12" minLength="12" autocomplete="off" placeholder="Enter ID number">
                            </div>

                            <div class="input-box">
                                <span class="details"><i class="fa fa-id-card" aria-hidden="true"></i> GSIS No</span>
                                <input type="gsis" id="gsis" name="gsis" required="required" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxLength="11" minLength="11" autocomplete="off" placeholder="Enter ID number">
                            </div>

                            <div class="input-box">
                                <span class="details"><i class="fa fa-id-card" aria-hidden="true"></i> Pag-ibig ID No</span>
                                <input type="pagibig" id="pagibig" name="pagibig" required="required" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxLength="12" minLength="12" autocomplete="off" placeholder="Enter ID number">
                            </div>

                            <div class="input-box">
                                <span class="details"><i class="fa fa-picture-o" aria-hidden="true"></i> Photo</span>
                                <input type="file" name="photo" id="photo" required="required" accept="image/*">
                            </div>

                            <div class="input-box">
                                <span class="details"><i class="fa fa-id-card" aria-hidden="true"></i> Philhealth</span>
                                <input type="philhealth" id="philhealth" name="philhealth" required="required" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxLength="12" minLength="12" autocomplete="off" placeholder="Enter ID number">
                            </div>

                            <div class="input-box">
                                <span class="details"><i class="fa fa-file-text" aria-hidden="true"></i> Document</span>
                                <input type="file" name="document" id="document" required="required" accept=".pdf*">
                            </div>

                        </div>

                        <div class="civil-status-details">
                            <span class="civil-status-details"><i class="fa fa-user" aria-hidden="true"></i> Civil Status</span>
                            <input type="radio" name="civilstatus" id="dot-1" value="Married">
                            <input type="radio" name="civilstatus" id="dot-2" value="Single">
                            <input type="radio" name="civilstatus" id="dot-3" value="Divorced">
                            <input type="radio" name="civilstatus" id="dot-4" value="Seperated">
                            <input type="radio" name="civilstatus" id="dot-5" value="Widowed">
                            <div class="category">
                                <label for="dot-1">
                                    <span class="dot one"></span>
                                    <span class="civil-status">Married</span>
                                </label>
                                <label for="dot-2">
                                    <span class="dot two"></span>
                                    <span class="civil-status">Single</span>
                                </label>
                                <label for="dot-3">
                                    <span class="dot three"></span>
                                    <span class="civil-status">Divorced</span>
                                </label>
                                <label for="dot-4">
                                    <span class="dot four"></span>
                                    <span class="civil-status">Seperated</span>
                                </label>
                                <label for="dot-5">
                                    <span class="dot five"></span>
                                    <span class="civil-status">Widowed</span>
                                </label>
                            </div>
                        </div>
                        <br>
                        <div id="btns">
                            <button type="submit" class="btnsuccess" id="addButton">Submit</button>
                            <a href="index.php"><button type="button" class="btndanger">Close</button></a>
                            <input type="hidden" name="action" value="adduser">
                            <input type="hidden" name="userid" id="userid" value="">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>