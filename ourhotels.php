
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="cache-control" content="max-age=0" >
    <meta http-equiv="cache-control" content="no-cache" >
    <meta http-equiv="expires" content="0" >
    <meta http-equiv="pragma" content="no-cache" >
    <title>DGL Holidays - Our Hotels</title>
    <link rel="icon" type="image/x-icon" href="./assets/image/logo/favicon.ico">
    <link rel="stylesheet" href="./assets/packages/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/main.css">
    <link rel="stylesheet" href="./assets/packages/@fortawesome/fontawesome-free/css/all.min.css">
</head>

<body>
    <header class="fixed-top">
    <div class="my-primary pt-1 pb-1">
            <div class="container">
                <div class="topbar row d-lg-flex d-md-flex d-block text-white">
                    <div class="contact col-lg-7 col-md-6 text-md-start text-center">
                        <div class="h-100 d-inline-flex align-items-center px-1">
                            <small class="fa fa-phone me-1"></small>
                            <small>+91 9360001248</small>
                        </div>
                        <div class="h-100 d-inline-flex align-items-center px-1">
                            <small class="fa fa-envelope me-1"></small>
                            <small data-bs-toggle="modal" data-bs-target="#exampleModal1"
                                style="cursor: pointer;">mail@dglholidays.com</small>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6 text-center text-md-end">
                        <div class="h-100 d-inline-flex align-items-center">
                            <a class="btn btn-square me-1" href=""><i class="fa-brands fa-facebook"></i></a>
                            <a class="btn btn-square me-1" href=""><i class="fa-brands fa-instagram"></i></a>
                            <a class="btn btn-square me-1" href=""><i class="fa-brands fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <nav class="navbar navbar-expand-lg bg-light border">
            <div class="container">

                <a class="navbar-brand" href="index.html"><img src="./assets/image/logo/Logo--DGL-Holidays.png" class="" height="60px" alt=""> </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa-solid fa-align-center"></i>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">

                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" href="index.html">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="ourhotels.php">Our Hotels</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="tourpackages.html">Tour Packages</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="gallery.html">Gallery</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" href="contactus.html">Contact Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="login.html">Login</a>
                        </li>

                    </ul>


                </div>
            </div>
        </nav>
    </header>
    <main style="margin-top: 120px;">
        <section class="about-main d-flex justify-content-center align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">


                        <h1 class="text-center text-white">Our Hotels

                        </h1>
                    </div>

                </div>
            </div>
        </section>
        <section class="view-sec">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-justify">
                        <h3>Reservations</h3>
                        <div class="accordion" id="accordionExample">
                        
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#step1" aria-expanded="true" aria-controls="collapseOne">
                                        1. Search
                                    </button>
                                </h2>
                                <div id="step1" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <form id="hotel_form" method="POST" onsubmit="return false" >
                                            <div class="row">
                                            
                                                <!--Place-->
                                            
                                                <?php
                                                    require_once "db_config.php";
                                                    
                                                    
                                                    $stmt = $mysqli->prepare("SELECT place FROM hotel_details");
                                                    $stmt->execute();
                                                    $array = [];
                                                    foreach ($stmt->get_result() as $row) {
                                                        $array[] = $row['place'];
                                                    }
                                                    $uniqvalue = array_unique($array);

                                                ?>

                                                <label for="inputEmail3" class="col-md-1 col-form-label">Place</label>
                                                <div class="col-md-11 mb-2">
                                                    <select class="form-select field1" name="place" id="place" onchange="this.form.submit()" aria-label="Default select example" required>
                                                        <option selected disabled value="">Select Place</option>
                                                        <?php foreach ($uniqvalue as $value) { ?>
                                                            <option value="<?php echo $value; ?>" <?php if(isset($_POST["place"])){ $place=$_POST["place"]; if($value ==  $place){echo 'selected';} } ?> >
                                                                <?php echo $value; ?>
                                                            </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>

                                                <!--Hotel-->
                                                <?php
                                                    if(isset($_POST["place"])){
                                                        $place=$_POST["place"];
                                                        
                                                        $sql = "SELECT hotel_name FROM hotel_details WHERE place= ?";
                                                        $stmt = $mysqli->prepare($sql);
                                                        $stmt->bind_param("s", $place);
                                                        $stmt->execute();
                                                        $hotel_list = [];
                                                        foreach ($stmt->get_result() as $row) {
                                                            $hotel_list[] = $row['hotel_name'];
                                                        }
                                                        $uniqdata = array_unique($hotel_list);
                                                    }
                                                ?>
                                                <label for="inputEmail3" class="col-md-1 col-form-label">Hotel</label>
                                                <div class="col-md-11 mb-2">
                                                    <select class="form-select field1" aria-label="Default select example" name="hotel" id="hotel" required>
                                                        <option selected disabled value="">Select Hotel</option>
                                                        <?php foreach ($uniqdata as $value) { ?>
                                                            <option value="<?php echo $value; ?>"><?php echo $value; ?> </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>

                                                <!--From Date-->
                                                <label for="inputEmail3" class="col-md-1 col-form-label">From</label>
                                                <div class="col-md-5 mb-2">
                                                    <input type="date" class="form-control field1" name="fromdate" id="fromdate" required>
                                                </div>

                                                <!--To Date-->
                                                <label for="inputEmail3" class="col-md-1 col-form-label">To</label>
                                                <div class="col-md-5 mb-2">
                                                    <input type="date" class="form-control field1" name="todate" id="todate" required>
                                                </div>

                                                <!--Rooms-->
                                                <div class="col-md-12" id="room_dt">
                                                    <div class="row">
                                                        <label for="inputEmail3" class="col-md-1 d-flex align-items-center col-form-label" id="room_lable">Room 1</label>
                                                        <div class="col-md-11 mb-2">
                                                            <div class="row mb-2 children_dt" id="children_dt1">
                                                                <div class="col-md-3">
                                                                    <label for="adult" class="form-label sub-label">Adults</label>
                                                                    <div class="d-flex ">
                                                                        <button type="button" class="btn shadow-none adult_decreament_btn" onclick="adult_decreament(this)" name="adult_decreament_btn"><i class="fa-solid fa-minus"></i></button>
                                                                        <input type="text" class="form-control rounded-0 shadow-none adult_count field1" value="1" id="adult_count1" name="adult_count" readonly>
                                                                        <button type="button" class="btn shadow-none adult_increament_btn" onclick="adult_increament(this)" name="adult_increament_btn"><i class="fa-solid fa-plus"></i></button>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <label for="children" class="form-label sub-label">Children (0 - 12 years)</label>
                                                                    <div class="d-flex ">
                                                                        <button type="button" class="btn shadow-none child-decreament-btn" id="child-decreament-btn" onclick="child_decreament_btn(this)" name="child-decreament-btn"><i class="fa-solid fa-minus"></i></button>
                                                                        <input type="text" class="form-control rounded-0 shadow-none counter field1" value="0" id="child_count1" name="child_count" readonly>
                                                                        <button type="button" class="btn shadow-none child-increment-btn" id="child-increment-btn" onclick="child_increment_btn(this)" name="child-increment-btn"><i class="fa-solid fa-plus"></i></button>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <button type="button" class="btn btn-primary my-primary add_room" onclick="add_fields();"><i class="fa-solid fa-plus"></i> Add Another Room</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="text-end">
                                                    <button class="btn btn-primary my-primary collapsed shadow-none" type="submit" aria-expanded="false" aria-controls="collapseTwo" >Next</button>
                                                </div>
                                            </div>
                                        </form> 
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed shadow-none" type="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="collapseTwo">
                                        2. Select Room
                                    </button>
                                </h2>
                                <div id="step2" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="Hotel-room-list" id="card"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed shadow-none" type="button" data-bs-toggle="collapse"  aria-expanded="false" aria-controls="collapseThree">
                                        3. Guest Information
                                    </button>
                                </h2>
                                <div id="step3" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-md-7 col-12 mb-3">
                                                <form action="" onsubmit="return false" id="gest-info">
                                                    <div class="col-md-12 form-floating mb-3">
                                                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                                                        <label for="floatingInput">First Name</label>
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <div class="row g-3">
                                                            <div class="col-md-6 form-floating">
                                                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                                                                <label for="floatingInput">Email Address</label>
                                                            </div>
                                                            <div class="col-md-6 form-floating">
                                                                <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" required>
                                                                <label for="floatingInput">Phone Number</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 form-floating mb-3">
                                                        <input type="text" class="form-control" id="gst" name="gst" placeholder="GST">
                                                        <label for="floatingInput">GST Number (Optinal)</label>
                                                    </div>
                                                    <div class="col-md-12 form-floating mb-3">
                                                        <textarea class="form-control" id="special-request" name="special-request" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                                                        <label for="floatingTextarea">Special Request</label>
                                                    </div>
                                                    <div class="col-md-12 text-center">
                                                        <button class="btn my-primary text-white" type="submit" >Book Now</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-md-5 col-12">
                                                <div class="row">
                                                <hr class="mb-0">
                                                    <div class="col-md-6 col-6 d-flex justify-content-between">
                                                        <div class="py-2">
                                                            <p class="mb-0">Check In</p>
                                                            <h4 class="mb-0" id="check-in">12 Oct '22, Wed</h3>
                                                        </div>
                                                        <div class="vr"></div>
                                                    </div>
                                                    
                                                    <div class="col-md-6 col-6">
                                                        <div class="py-2">
                                                        <p class="mb-0">Check Out</p>
                                                        <h4 class="mb-0" id="check-out">12 Oct '22, Wed</h3>
                                                        </div>
                                                    </div>
                                                    <hr class="mt-0">
                                                    <div class="d-flex justify-content-between mb-1">
                                                        <p class="mb-0">No of nights</p>
                                                        <p class="mb-0" id="no-night">1 Nights</p> 
                                                    </div>
                                                    <div class="d-flex justify-content-between mb-1">
                                                        <p class="mb-0">Room</p>
                                                        <p class="mb-0">Deluxe Rooms - King Bed</p> 
                                                    </div>
                                                    <div class="d-flex justify-content-between mb-1">
                                                        <p class="mb-0">Guests</p>
                                                        <p class="mb-0">1 Adult, 0 Children</p> 
                                                    </div>
                                                    <hr>
                                                    <div class="d-flex align-items-center justify-content-between mb-1">
                                                        <h5 class="mb-0">Grand Total</h5>
                                                        <h2 class="mb-0" id="Grand-Total">INR 21,280.00</h2> 
                                                    </div>
                                                    <hr>
                                                </div>

                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed shadow-none" type="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="collapseThree">
                                    4. Payment
                                </button>
                                </h2>
                                <div id="step4" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                    <div class="accordion-body d-flex justify-content-center">
                                        <div class="card h-25 w-25">
                                            <img src="https://www.investopedia.com/thmb/KfGSwVyV8mOdTHFxL1T0aS3xpE8=/1148x1148/smart/filters:no_upscale()/qr-code-bc94057f452f4806af70fd34540f72ad.png" class="img-fluid rounded-top" height="150px" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                        </div>

                    </div>
                    
                </div>
            </div>
        </section>

        <section class="g-map">
            <div class="container-fluid p-0">
                <div class="row">
                    <div class="col-md-12">
                        <iframe
                            src="https://maps.google.com/maps?q=Pondicherry&t=&z=13&ie=UTF8&iwloc=&output=embed&z=18"
                            frameborder="0" style="border:0" allowfullscreen width="100%" height="600px"></iframe>
                    </div>
                </div>

            </div>
        </section>


    </main>
    <!-- Footer -->
    <footer class="text-center text-lg-start text-muted">

        <section class="footer-body footer-start">
            <div class="container text-center text-md-start  footer-bottom my-primary text-white">
                <!-- Grid row -->
                <div class="row pt-5">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <!-- Content -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            <i class="fas fa-gem me-3"></i> DGL Holidays
                        </h6>
                        <p>
                            Here you can use rows and columns to organize your footer content. Lorem ipsum
                            dolor sit amet, consectetur adipisicing elit.
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-2 col-lg-2 col-xl-2 mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Quick Links
                        </h6>
                        <p>
                            <a href="#!" class="text-reset">About Us</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">
                                Gallery</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">
                                Special Tour </a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Contact Us</a>
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4"> Branch Office Address</h6>

                        10, 1st Floor,<br>
                        Balaji Nagar, Anna salai,<br>
                        Karaimedu, Gangarampalayam,<br>
                        Villupuram District,<br>
                        Tamil Nadu - 605108

                    </div>
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">Corporate Office Address</h6>

                        3/1449, Perumal Koil Street,<br>
                        Vazhudareddy, Villupuram,<br>
                        Tamil Nadu - 605 401

                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
            </div>
        </section>
        <!-- Section: Links  -->

        <!-- Copyright -->
        <div class="text-center p-4 bg-light">
            © 2022 Copyright:
            <a class="text-reset fw-bold" href="#">DGL Holidays
            </a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->

    <script src="./assets/packages/jquery/dist/jquery.min.js"></script>
    <script src="./assets/packages/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./assets/packages/@fortawesome/fontawesome-free/js/all.min.js"></script>
    <script type="module" src="./assets/JS/ourhotels.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    
</body>

</html>