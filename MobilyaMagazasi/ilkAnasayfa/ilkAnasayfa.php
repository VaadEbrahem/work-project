<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/MobilyaMagazasi/ilkAnasayfa/cssbootstrap/bootstrap.min.css"> <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/MobilyaMagazasi/ilkAnasayfa/cssbootstrap/all.min_icon.css"> <!-- Icon -->
    <link rel="stylesheet" href="/MobilyaMagazasi/ilkAnasayfa/ilkAnasayfa.css">
    <title>projem</title>
</head>
<body>
    <div class="video-container banner" id="Home">
        <video autoplay muted loop id="video-bg">
            <source src="image/video23.mp4" type="video/mp4">
        </video>
        <div class="body_video">
            <nav class="navbar navbar-expand-lg sticky-top">
                <div class="container">
                    <a class="navbar-brand" href="/MobilyaMagazasi/formAnasayfa/formAnasayfa.php">
                        <img src="image/LOGO1.png" class="video_logo_img">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main"
                        aria-controls="main" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="main">
                        <!-- /*nav*/ -->
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link p-2 p-lg-3 active" aria-current="page" href="#Home">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link p-2 p-lg-3" href="#Services">Services</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link p-2 p-lg-3" href="#Portfolio">Portfolio</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link p-2 p-lg-3" href="#About">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link p-2 p-lg-3" href="#Contact">Contact</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link p-2 p-lg-3" href="#Bontac">Bontac</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link p-2 p-lg-3" href="#Tontact">Tontact</a>
                            </li>
                        </ul>
                        <!-- nav اليقونة يلي جنب العاوين ال  -->
                        <!-- <div class="serrch ps-3 pe-3 d-none d-lg-block">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </div> -->


                        <!-- الزر يلي بشريط العناوين -->
                        <a class="btn main-btn1 text-uppercase " href="/MobilyaMagazasi/formAnasayfa/formAnasayfa.php">
                        Kayıt ol
                        </a>
                        <!-- rounded-pill مشان تخلي الزر داءرة  -->
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <div class="text-overlay">
        <p>Hello, You are welcome  <span style="color: #0f5bae;">:)</span> </p>
    </div>
    <div class="imag_left-text_right pt-5 pb-5  align-items-center " id="Services" style="background: #e7dfd2;">
        <div class="container">

            <div class="row">
                <div class="col-md-12 col-lg-6">
                    <!--  بعد ما حددتي المكان شرط تحطي ديف ودخله ولو كان عنصر واحد  -->
                    <div class="imge">
                        <!--  class="img-fluid"   صورة مشان ما تطلع برات القسمها المحطوت فيها  -->
                        <img class="img-fluid" src="image/image13_13.jpg" style="padding-top:50px; height: 600px;">
                    </div>
                </div>
                <div class="col-md-1 col-lg-1"></div>
                <div class="col-md-11 col-lg-5">
                    <div class="imagetitle mt-5 mb-5 text-md-start text-center">
                        <h2>New</h2>
                        <P class="text-black">
                            Armchairs prioritize personalized comfort with a diverse range, enabling both relaxation and
                            aesthetic preferences, from snug puzzle-solving chairs to ideal afternoon nap recliners.
                        </p>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-lg-6">

                            <div class=" mt-1 mb-5 text-md-start text-center " style="padding-top: 25px;">
                                <img class="mb-4" src="img/image_13_15.png" style="width: 90%;">
                                <p>Sam Wood</p>
                                <h5 class="text-black-50">€375</h5>
                                <a class="btn main-btn1 text-uppercase" href="/MobilyaMagazasi/formAnasayfa/formAnasayfa.php">add to cart</a>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <div class=" mt-1 mb-5 text-md-start text-center">
                                <img class="mb-4" src="img/image_13_15.png" style="width: 100%;">
                                <p>Ely Grey</p>
                                <h5 class="text-black-50">€392</h5>
                                <a class="btn main-btn1 text-uppercase" href="/MobilyaMagazasi/formAnasayfa/formAnasayfa.php">add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="image_title_price imag_left-text_right pt-5 pb-5" id="Portfolio">
        <div class="container pb-5 pt-5" >
      
            <!-- هي محتوى الصفحة -->
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col-lg-4 col-md-6 ">
                    <div class="card box">
                        <div class="box-img">
                            <img src="img/p6.jpg" class="card-img-top">
                        </div>
                        <div class="card-body">
                            <p class="card-text">Create a Productive Home Office with Our Furniture Collection</p>
                            <span class="card-title">450€</span>
                            <a class="btn main-btn1 text-uppercase bottom_right" href="/MobilyaMagazasi/formAnasayfa/formAnasayfa.php"><i class="fa-solid fa-cart-shopping"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 ">
                    <div class="card box">
                        <div class="box-img">
                            <img src="img/p2.jpg" class="card-img-top">
                        </div>
                        <div class="card-body">
                            <p class="card-text">Create a Productive Home Office with Our Furniture Collection</p>
                            <span class="card-title">450€</span>
                            <a class="btn main-btn1 text-uppercase bottom_right" href="/MobilyaMagazasi/formAnasayfa/formAnasayfa.php"><i
                                    class="fa-solid fa-cart-shopping"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 ">
                    <div class="card box">
                        <div class="box-img">
                            <img src="img/p3.jpg" class="card-img-top">
                        </div>
                        <div class="card-body">
                            <p class="card-text">Create a Productive Home Office with Our Furniture Collection</p>
                            <span class="card-title">450€</span>
                            <a class="btn main-btn1 text-uppercase bottom_right" href="/MobilyaMagazasi/formAnasayfa/formAnasayfa.php"><i
                                    class="fa-solid fa-cart-shopping"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 ">
                    <div class="card box">
                        <div class="box-img">
                            <img src="img/p4.jpg" class="card-img-top">
                        </div>
                        <div class="card-body">
                            <p class="card-text">Create a Productive Home Office with Our Furniture Collection</p>
                            <span class="card-title">450€</span>
                            <a class="btn main-btn1 text-uppercase bottom_right" href="/MobilyaMagazasi/formAnasayfa/formAnasayfa.php"><i
                                    class="fa-solid fa-cart-shopping"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 ">
                    <div class="card box">
                        <div class="box-img">
                            <img src="img/p5.jpg" class="card-img-top">
                        </div>
                        <div class="card-body">
                            <p class="card-text">Create a Productive Home Office with Our Furniture Collection</p>
                            <span class="card-title">450€</span>
                            <a class="btn main-btn1 text-uppercase bottom_right" href="/MobilyaMagazasi/formAnasayfa/formAnasayfa.php"><i
                                    class="fa-solid fa-cart-shopping"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 ">
                    <div class="card box">
                        <div class="box-img">
                            <img src="img/p6.jpg" class="card-img-top">
                        </div>
                        <div class="card-body">
                            <p class="card-text">Create a Productive Home Office with Our Furniture Collection</p>
                            <span class="card-title">450€</span>
                            <a class="btn main-btn1 text-uppercase bottom_right" href="/MobilyaMagazasi/formAnasayfa/formAnasayfa.php"><i
                                    class="fa-solid fa-cart-shopping"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="ilk_image_text imag_left-text_right pt-5 pb-5 d-flex  justify-content-center align-items-center"
        id="About" style="background: #e7dfd2;">
        <div class="container pb-5 pt-5">
    
            <div class="row" >
                <div class=" col-md-6 col-lg-6">
                    <div class="box5 mb-3">
                        <img src="image/image7.jpg" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-6  col-md-6  mb-4 text-center text-md-start">

                    <div class="text">
                        <h5>
                            FEATURED PRODUCT
                        </h5>
                        <h3>
                            Red Sofa With Pillows
                        </h3>
                        <h3 class="pt-3">$55.00</h3>
                        <p class="text-black-50 fs-6 pt-5">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Perferendis quo aperiam vero amet
                            fuga voluptas saepe consequatur ea reprehenderit, excepturi nulla autem praesentium in ipsa!
                        </p>

                        <!-- الزر يلي بشريط العناوين -->
                        <a class="btn main-btn1 text-uppercase" href="/MobilyaMagazasi/formAnasayfa/formAnasayfa.php">add to cart</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6  col-md-6  text-center text-md-start">

                    <div class="text">
                        <h5>
                            FEATURED PRODUCT
                        </h5>
                        <h3>
                            Red Sofa With Pillows
                        </h3>
                        <h3 class="pt-3">$55.00</h3>
                        <p class="text-black-50 fs-6 pt-5">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Perferendis quo aperiam vero amet
                            fuga voluptas saepe consequatur ea reprehenderit, excepturi nulla autem praesentium in ipsa!
                        </p>

                        <!-- الزر يلي بشريط العناوين -->
                        <a class="btn main-btn1 text-uppercase" href="/MobilyaMagazasi/formAnasayfa/formAnasayfa.php">add to cart</a>
                    </div>
                </div>
                <div class=" col-md-6 col-lg-6">
                    <div class="box5 mb-3">
                        <img src="image/image3_1.jpg" class="img-fluid">
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="our-work text-center imag_left-text_right pt-5 pb-5" id="About">
        <div class="container pb-5 pt-5">
     

            <div class="row">
                <div class=" col-md-6 col-lg-3 ">
                    <div class="box1 mb-3 bg-white" data-work="Application €500">
                        <img src="images/img-1.jpg" class="img-fluid">
                    </div>
                </div>

                <div class=" col-md-6 col-lg-3 ">
                    <div class="box1 mb-3 bg-white" data-work="Application €400">
                        <img src="images/img-8.jpg" class="img-fluid">
                    </div>
                </div>
                <div class=" col-md-6 col-lg-3 ">
                    <div class="box1 mb-3 bg-white" data-work="Application €300">
                        <img src="images/img-9.jpg" class="img-fluid">
                    </div>
                </div>
                <div class=" col-md-6 col-lg-3 ">
                    <div class="box1 mb-3 bg-white" data-work="Application €200">
                        <img src="images/img-10.jpg" class="img-fluid">
                    </div>
                </div>
                <div class=" col-md-6 col-lg-3 ">
                    <div class="box1 mb-3 bg-white" data-work="Application €700">
                        <img src="images/img-4.jpg" class="img-fluid">
                    </div>
                </div>
                <div class=" col-md-6 col-lg-3 ">
                    <div class="box1 mb-3 bg-white" data-work="Application €600">
                        <img src="images/img-5.jpg" class="img-fluid">
                    </div>
                </div>
                <div class=" col-md-6 col-lg-3 ">
                    <div class="box1 mb-3 bg-white" data-work="Application €800">
                        <img src="images/img-6.jpg" class="img-fluid">
                    </div>
                </div>
                <div class=" col-md-6 col-lg-3 ">
                    <div class="box1 mb-3 bg-white" data-work="Application €190">
                        <img src="images/img-7.jpg" class="img-fluid">
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="team  text-center pb-5 pt-5" id="Contact">
        <div class="container pb-5 pt-5">
            <h2 class="fw-bold">Meet The Team</h2>
            <p class="text_image  mb-5">
                blandit aliquet elit, eget ticidunt nibh
                pulvinar a.Pellentesque in ipsum orci porta dapibus. Proin edet trortor risus.Donec
                solicitudin molestie
                malesuada.
            </p>

            <div class="row">
                <!-- بي شاشات الوسط  راح يكونو كرتين md-6-->
                <!-- بي شاشات الكبار راح تاخذ 4 عناصر  col-lg-3-->
                <div class="col-md-6 col-lg-3">
                    <div class="box bg-white">
                        <img class="img-fluid" src="image/image12_13_1.jpg">
                        <h5 class="p-3 text-light">I request $900</h5>
                        <blockquote class="text_image p-3 ">Idon't understand how we got by those troops

                            <a class="btn main-btn1 text-uppercase b" href="/MobilyaMagazasi/formAnasayfa/formAnasayfa.php"><i
                                class="fa-solid fa-cart-shopping"></i></a>
                        </blockquote>
                    </div>

                </div>


                <div class="col-md-6 col-lg-3">
                    <div class="box bg-white">
                        <img class="img-fluid" src="image/image6_10.jpg">
                        <h5 class="p-3 text-light">I request $900</h5>
                        <blockquote class="text_image p-3 ">Idon't understand how we got by those troops
                            <a class="btn main-btn1 text-uppercase b" href="/MobilyaMagazasi/formAnasayfa/formAnasayfa.php"><i
                                class="fa-solid fa-cart-shopping"></i></a>
                        </blockquote>
                    
                    </div>

                </div>


                <div class="col-md-6 col-lg-3">
                    <div class="box bg-white">
                        <img class="img-fluid" src="image/image10_1.jpg">
                        <h5 class="p-3 text-light">I request $900</h5>
                        <blockquote class="text_image p-3 ">"Idon't understand how we got by those troops
                            <a class="btn main-btn1 text-uppercase b" href="/MobilyaMagazasi/formAnasayfa/formAnasayfa.php"><i
                                class="fa-solid fa-cart-shopping"></i></a>
                        </blockquote>
                    </div>

                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="box bg-white">
                        <img class="img-fluid" src="image/image11.jpg">
                        <h5 class="p-3 text-light">I request $900</h5>
                        <blockquote class="text_image p-3 ">Idon't understand how we got by those troops
                            <a class="btn main-btn1 text-uppercase b" href="/MobilyaMagazasi/formAnasayfa/formAnasayfa.php"><i
                                class="fa-solid fa-cart-shopping"></i></a>
                        </blockquote>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <div class="title_prcie_imag  pt-5 pb-5   imag_left-text_right " id="Bontac">
        <div class="container pb-5 pt-5">

            <div class="row">
                <div class="col-lg-3 col-md-6 pb-3">
                    <div class="card box3">
                        <div class="card-body box-img1">
                            <img src="images/hero-product-1.jpg" class="img-fluid">
                            <div class="title_left">
                                <a class="btn main-btn1 text-uppercase " href="/MobilyaMagazasi/formAnasayfa/formAnasayfa.php"><i
                                        class="fa-solid fa-cart-shopping"></i></a>
                                <span>I request $900 </span>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 pb-3">
                    <div class="card box3" style="position: relative; ">
                        <div class="card-body box-img1">
                            <img src="images/hero-product-2.jpg" class="img-fluid">
                            <div class="title_left">
                                <a class="btn main-btn1 text-uppercase " href="/MobilyaMagazasi/formAnasayfa/formAnasayfa.php"><i
                                        class="fa-solid fa-cart-shopping"></i></a>
                                <span>I request $900 </span>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-3 col-md-6 pb-3">
                    <div class="card box3">
                        <div class="card-body box-img1">
                            <img src="images/hero-product-3.jpg" class="img-fluid">
                            <div class="title_left">
                                <a class="btn main-btn1 text-uppercase " href="/MobilyaMagazasi/formAnasayfa/formAnasayfa.php"><i
                                        class="fa-solid fa-cart-shopping"></i></a>
                                <span>I request $900 </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="card box3 mt-3">
                        <div class="card-body box-img1">
                            <img src="images/hero-product-4.jpg" class="img-fluid">
                            <div class="title_left">
                                <a class="btn main-btn1 text-uppercase " href="/MobilyaMagazasi/formAnasayfa/formAnasayfa.php"><i
                                        class="fa-solid fa-cart-shopping"></i></a>
                                <span>I request $900 </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6">
                    <div class="card box3 mt-3">
                        <div class="card-body box-img1">
                            <img src="images/hero-product-5.jpg" class="img-fluid">
                            <div class="title_left">
                                <a class="btn main-btn1 text-uppercase " href="/MobilyaMagazasi/formAnasayfa/formAnasayfa.php"><i
                                        class="fa-solid fa-cart-shopping"></i></a>
                                <span>I request $900 </span>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <div class="sada_images"  id="Tontact">
    
            <div class="container1 ">
                <div class="slider-wrapper">
                    <button id="prev-slide" class="slide-button material-symbols-rounded">
                        <i class="fa-solid fa-chevron-left"></i>
                    </button>
                    <ul class="image-list">
                        <img class="image-item" src="images/img-1.jpg" alt="img-1" />
                        <img class="image-item" src="images/img-2.jpg" alt="img-2" />
                        <img class="image-item" src="images/img-3.jpg" alt="img-3" />
                        <img class="image-item" src="images/img-4.jpg" alt="img-4" />
                        <img class="image-item" src="images/img-5.jpg" alt="img-5" />
                        <img class="image-item" src="images/img-6.jpg" alt="img-6" />
                        <img class="image-item" src="images/img-7.jpg" alt="img-7" />
                        <img class="image-item" src="images/img-8.jpg" alt="img-8" />
                        <img class="image-item" src="images/img-9.jpg" alt="img-9" />
                        <img class="image-item" src="images/img-10.jpg" alt="img-10" />
                    </ul>
                    <button id="next-slide" class="slide-button material-symbols-rounded">
                        <i class="fa-solid fa-chevron-right"></i>
                    </button>
                </div>
                <div class="slider-scrollbar">
                    <div class="scrollbar-track">
                        <div class="scrollbar-thumb"></div>
                    </div>
                </div>
            </div>
    </div>



    <script src="/MobilyaMagazasi/ilkAnasayfa/jsbootstrap/bootstrap.bundle.min.js"></script> <!-- Bootstrap CSS -->
    <script src="/MobilyaMagazasi/ilkAnasayfa/jsbootstrap/all.min_icon.js"></script> <!-- Icon -->

    <script>
        // Get references to the slider elements
        const prevButton = document.getElementById('prev-slide');
        const nextButton = document.getElementById('next-slide');
        const imageList = document.querySelector('.image-list');
        const imageItems = document.querySelectorAll('.image-item');
        const scrollbarThumb = document.querySelector('.scrollbar-thumb');

        // Initialize the current image index
        let currentIndex = 0;

        // Add event listeners for the previous and next buttons
        prevButton.addEventListener('click', () => {
            currentIndex = (currentIndex - 1 + imageItems.length) % imageItems.length;
            updateSlider();
        });

        nextButton.addEventListener('click', () => {
            currentIndex = (currentIndex + 1) % imageItems.length;
            updateSlider();
        });

        // Function to update the slider to the current index
        function updateSlider() {
            // Calculate the scroll position for the current index
            const scrollPosition = currentIndex * imageItems[0].offsetWidth;
            // Set the scroll position to smoothly scroll to the new image
            imageList.scrollTo({
                left: scrollPosition,
                behavior: 'smooth'
            });
        }

        // Update the slider scrollbar position when scrolling
        imageList.addEventListener('scroll', () => {
            const scrollPercentage =
                (imageList.scrollLeft / (imageList.scrollWidth - imageList.clientWidth)) * 100;
            scrollbarThumb.style.left = `${scrollPercentage}%`;
        });

    </script>


<!-- هي الكلمة اهلا وسهلا بكم انو تختفي  -->

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const video = document.getElementById("video-bg");
        const textOverlay = document.querySelector(".text-overlay");

        video.addEventListener("play", function () {
            textOverlay.style.display = "block";
            textOverlay.style.animation = "slideOut 5s ease-in-out forwards";
        });

        video.addEventListener("ended", function () {
            textOverlay.style.animation = ""; // Remove the animation
            setTimeout(() => {
                textOverlay.style.display = "none";
            }, 100); // Adjust this delay as needed
        });
    });
</script>

</body>
</html>