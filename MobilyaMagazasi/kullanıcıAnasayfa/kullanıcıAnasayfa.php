
<?php
include 'config.php'; 

$query = mysqli_query($conn, "SELECT * FROM `kartekle` WHERE `isactive` = 1");
if (!$query) {
    echo "Error: " . mysqli_error($conn);
    error_log("MySQL Error: " . mysqli_error($conn));
}
?>




<!-- انت الحذف -->
<?php
include 'config.php';
if (isset($_GET['delete-button'])) {
    $id = $_GET['delete-button'];
    $stmt = mysqli_prepare($conn, "UPDATE `kartekle` SET `isactive` = 0 WHERE `id` = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    //إعادة التوجيه إلى نفس الصفحة بعد حذف ناجح
    header('Location: kullanıcıAnasayfa.php');
    exit;
   // الخروج لمنع تنفيذ النص البرمجي بشكل أكثر دقة:
  //  "الخروج لمنع تنفيذ السكريبت الإضافي"
}
?>

<!-- انت الحذف -->

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/MobilyaMagazasi/kullanıcıAnasayfa/cssbootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="/MobilyaMagazasi/kullanıcıAnasayfa/cssbootstrap/all.min_icon.css">
    <link rel="stylesheet" href="/MobilyaMagazasi/kullanıcıAnasayfa/kullanıcıAnasayfa.css">
    <style>
                            @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0200;0,300;0,400;500;0,600;1,100&display=swap');

                            * {
                                margin: 0;
                                padding: 0;
                                box-sizing: border-box;
                                font-family: 'Poppins', sans-serif;
                            }





                            textarea.note-text {
                                display: none;
                                box-shadow: 10px 10px 24px 0px rgba(0, 0, 0, 0.7);
                                outline: none;
                                border: none;
                                width: 100% !important; /* اضبط العرض على  */
                                height: 100% !important; 
                                padding: 40px 25px 50px 25px;
                            }

                            /* أضف تنسيقًا للبطاقة */
                            /* بداخل البطاقة */
                            /* كلاس هذا من انشاءه بالجافاسكريب */
                            .card {
                                font-size: 26px;
                                padding: 25px;
                                margin: 10px;
                                overflow: hidden;
                                box-shadow: 0px 10px 24px 0px rgba(0, 0, 0, 0.75);
                                display: inline-block;
                            }

                            .container2 {
                                margin-bottom: 20px;
                                margin-left: 100px;
                            }

                            .bottom-left {
                                position: absolute;
                                bottom: 10px;
                                left: 10px;
                            }

                            .bottom-right {
                                position: absolute;
                                bottom: 10px;
                                left: 45px;
                            }










                            /*صفحة ريسية*/


                            .card-text{
                                font-size:16px;
                            }

                            .card-titl{
                                font-size:10px;
                            }
                            span{   font-size:16px;}
                            /* <!-- هي الكلمة اهلا وسهلا بكم انو تختفي  -->  */
                            .text-overlay {
                                display: none;
                                /* Remove initial hidden state */
                                position: absolute;
                                top: 50%;
                                left: 50%;
                                transform: translate(-50%, -50%);
                                color: white;
                                font-size: 24px;
                                z-index: 4;
                                /* Place it above the black background */
                            }




                            body,
                            html {
                                height: 100%;
                                margin: 0;
                                overflow-x: hidden;
                            }

                            .video-container {
                                position: relative;
                                left: 0;
                                top: 0;
                                /* هذا عنصر الاب لهيك حطيت ريلاتيفي*/
                                width: 100%;
                                height: 100vh;
                                /* Set the height to viewport height */
                                /*هامش السود*/
                                overflow: hidden;
                                /*هامش السود*/
                            }




                            #video-bg {
                                position: absolute;
                                /*  لنك ابن حطيتك */
                                top: 0;
                                left: 0;
                                width: 100%;
                                height: 100%;
                                object-fit: cover;
                                /* يضمن أن يغطي الفيديو الحاوية بأكملها */
                            }






                            /* اسم متغير انا انشته  */
                            .main-btn {
                                background-color: #0f5bae;
                                color: white;
                                padding: 0.5rem 1rem;

                            }

                            .main-btn:hover {
                                background-color: #0f5bae;
                                color: white;
                            }

                            .body_video {
                                height: 100%;
                                position: relative;
                                z-index: 2;
                                /* Add z-index to make sure it's above the black screen */
                            }

                            /* لزم اعرف الاب اذا البين بده يستخدم لبلوسيليتي عرف لاب وعطيه اصفار العملية تتطلع اصل */



                            .video_logo_img {
                                width: 45%;
                                padding-bottom: 26px;

                            }

                            /*nav*/
                            .navbar {
                                width: 100%;
                                height: 80px;
                                background-color: #1a1a1a;
                                position: fixed;
                                opacity: 0.8;

                            }

                            .navbar .navbar-nav .nav-link {
                                color: white;
                                transition: 0.5s;
                            }

                            .navbar .navbar-nav .nav-link.active,
                            /*الاول عنوان عند كلاس اسمه اكتف راح يتلون لما ينفتح صفح هوي الوحيد ملون */
                            .navbar .navbar-nav .nav-link:focus,
                            .navbar .navbar-nav .nav-link:hover {
                                color: #FFD700;
                            }

                            /* <!-- nav اليقونة يلي جنب العاوين ال  --> */
                            .navbar .navbar-toggler {
                                color: white;
                                font-size: 25px;
                                border-color: white;
                            }

                            .navbar .navbar-toggler:focus {
                                box-shadow: none;
                            }

                            /* تنسيقات الصفات يلي موجودة داخل العنصر  */

                            .navbar .navbar-toggler[aria-expanded="true"] {
                                border-color: #FFD700;

                            }

                            /* <!-- nav اليقونة يلي جنب العاوين ال  --> */
                            .navbar .serrch {
                                border-left: 1px solid#FFD700;
                            }

                            /*  بسبب الروابط يلي كتبتهم svg   الى i  مشان  هوي غير  svgحطيت  */
                            .navbar .serrch svg {
                                color: #FFD700;
                            }

                            /*nav*/




                            /*  <!-- هي صفحة ثانية  -->  */

                            .features .icon-holder {
                                height: 200px;
                            }

                            .features .icon-holder svg {
                                
                                /* نظام التوسيط  */
                                left: 50%;
                                transform: translateX(-50%);
                            }

                            /*  هي مشان اليقونة يلي بالخلف  على شكل رقم واحد */
                            .features .icon-holder .number {
                                font-size: 12rem;
                                color: var(--section-color);
                            }

                            .features .icon-holder .icon {
                                color: var(--green-color);
                            }

                            .features .feat h4 {
                                color: var(--yollow-color);
                            }

                            /*  <!-- هي صفحة ثانية  -->  */


                            /*  انت كتير هام لو انو انا حاطتك مية بس المساحة الصفحة ما ببين فيها الصورة ببقا  */
                            .imag_left-text_right {
                                min-height: 100vh;
                            }







                            /* اسم متغير انا انشته  */
                            .main-btn1 {
                                background-color: #0f5bae;
                                color: white;
                                padding: 0.5rem 3rem;

                            }

                            .main-btn1:hover {
                                background-color: #0f5bae;
                                color: white;
                            }






                            .btn {
                                padding: 10px 14px;
                                background-color: #0f5bae;
                                color: #fff;
                                border-radius: 0.3rem;
                                font-size: 14px;
                            }

                            .btn:hover {
                                background-color: #0d4f9b;
                            }


                            .box {
                                position: relative;
                                box-shadow: 1px 4px 4px rgba(0, 0, 0, .1);
                                border: 1px solid none;
                            }

                            /* Existing CSS */
                            .box .box-img {
                                height: 400px;
                                /* Remove this height */
                                width: 100%;
                                overflow: hidden;
                            }

                            .box .box-img img {
                                height: 100%;
                                width: 100%;
                                object-fit: cover;
                                object-position: center;

                            }

                            /* Modify the CSS for the card image */
                            .card .box-img img {
                                height: 100%;
                                /* Set the height to 100% */
                                width: 100%;
                                /* Set the width to 100% */
                                object-fit: contain;
                                /* Use 'contain' for object-fit to fit the image within the card */
                            }

                            .box .box-img img:hover {
                                transform: scale(1.1);
                                transition: 0.5s;
                            }

                            .bottom_right {
                                position: absolute;
                                bottom: 10px;
                                right: 10px;
                            }


















                            .our-work .box1 {
                                padding: 5px;
                                overflow: hidden;
                                position: relative;
                            }

                            /*data-work="Application"*/
                            /*الخلفية الجاي على ازرق مغطي الصورة والكلام */
                            .our-work .box1::before {
                                content: attr(data-work);
                                position: absolute;
                                background-color: rgb(13 77 155 / 76%);
                                width: calc(100% - 10px);

                                /* 13 77 155 */
                                /* rgb(255, 211, 0) */
                                /* هي ال عشرة اجت من الحواف البيض  انا ما بدي يسكر عليهم كمان لهيك*/
                                /*خمسي يمين خمسي يسار لهيك سارت عشرة */
                                height: calc(100% - 10px);
                                /* كلاحظة هامة انو السالب ما لزم يلزق بي العدد*/
                                display: flex;
                                justify-content: center;
                                align-items: center;
                                font-weight: bold;
                                color: white;
                                transition: 0.3s;
                                /* راح يخلي الحركة ناعمة */
                                font-size: 1.5rem;
                                /* نخبي العنصر برا الشاشة*/
                                transform: translateY(calc(-100% - 5px));

                            }

                            .our-work .box1:hover:before {
                                transform: translateY(0);
                                /*الحركة من جهة اليسار من الكسات بس لما لمس بيعمل تغير */
                                /*translateX*/
                                /*translateY */
                                /*الحركة من جهة الوايات من فوق التاثير*/
                            }







                            .title_left {
                                position: absolute;
                                bottom: 20px;
                                left: 20px;
                            }


                            .box3 {
                                position: relative;
                                box-shadow: 1px 4px 4px rgba(0, 0, 0, .1);
                                border: 1px solid none;
                            }


                            .box3 .box-img1 img {
                                height: 100%;
                                width: 100%;
                                object-fit: cover;
                                object-position: center;

                            }

                            /* Modify the CSS for the card image */
                            .card .box-img1 img {
                                height: 100%;
                                /* Set the height to 100% */
                                width: 100%;
                                /* Set the width to 100% */
                                object-fit: contain;
                                /* Use 'contain' for object-fit to fit the image within the card */
                            }




















                            /* تصميم الصفحة الرئيسية */
                            .sada_images {
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                min-height: 100vh;
                                background: #e7dfd2;
                                font-family: 'Poppins', sans-serif;
                            }


                            /* تحديد أقصى عرض للعناصر داخل العنصر ذو الفئة ".container" */
                            .container1 {
                                max-width: 1200px;
                                width: 95%;
                            }

                            /* تصميم عناصر السلايدر */
                            .slider-wrapper {
                                position: relative;
                            }

                            .slider-wrapper .slide-button {
                                position: absolute;
                                top: 50%;
                                outline: none;
                                border: none;
                                height: 50px;
                                width: 50px;
                                z-index: 5;
                                color: #fff;
                                display: flex;
                                cursor: pointer;
                                font-size: 2.2rem;
                                background: #0d4f9b;
                                align-items: center;
                                justify-content: center;
                                border-radius: 50%;
                                transform: translateY(-50%);
                            }

                            .slider-wrapper .slide-button:hover {
                                background: #0d4f9b;
                            }

                            /* تحديد موقع زر السابق في السلايدر */
                            .slider-wrapper .slide-button#prev-slide {
                                left: -25px;
                            }

                            /* تحديد موقع زر التالي في السلايدر */
                            .slider-wrapper .slide-button#next-slide {
                                right: -25px;
                            }

                            /* تصميم قائمة الصور في السلايدر */
                            .slider-wrapper .image-list {
                                display: grid;
                                grid-template-columns: repeat(10, 1fr);
                                gap: 18px;
                                font-size: 0;
                                list-style: none;
                                margin-bottom: 30px;
                                overflow-x: auto;
                                scrollbar-width: none;
                            }

                            /* إخفاء شريط التمرير الافتراضي للمتصفح */
                            .slider-wrapper .image-list::-webkit-scrollbar {
                                display: none;
                            }

                            /* تصميم عناصر الصور في السلايدر */
                            .slider-wrapper .image-list .image-item {
                                width: 325px;
                                height: 400px;
                                object-fit: cover;
                            }

                            /* تصميم شريط التمرير العمودي */
                            .container1 .slider-scrollbar {
                                height: 24px;
                                width: 100%;
                                display: flex;
                                align-items: center;
                            }

                            .slider-scrollbar .scrollbar-track {
                                background: #ccc;
                                width: 100%;
                                height: 2px;
                                display: flex;
                                align-items: center;
                                border-radius: 4px;
                                position: relative;
                            }

                            .slider-scrollbar:hover .scrollbar-track {
                                height: 4px;
                            }

                            .slider-scrollbar .scrollbar-thumb {
                                position: absolute;
                                background: #0d4f9b;
                                top: 0;
                                bottom: 0;
                                width: 50%;
                                height: 100%;
                                cursor: grab;
                                border-radius: inherit;
                            }

                            .slider-scrollbar .scrollbar-thumb:active {
                                cursor: grabbing;
                                height: 8px;
                                top: -2px;
                            }

                            .slider-scrollbar .scrollbar-thumb::after {
                                content: "";
                                position: absolute;
                                left: 0;
                                right: 0;
                                top: -10px;
                                bottom: -10px;
                            }

                            /* أنماط خاصة للأجهزة المحمولة والأجهزة اللوحية */
                            @media only screen and (max-width: 1023px) {

                                /* إخفاء زر السابق وتعديل أحجام الصور وشريط التمرير */
                                .slider-wrapper .slide-button {
                                    display: none !important;
                                }

                                .slider-wrapper .image-list {
                                    gap: 10px;
                                    margin-bottom: 15px;
                                    scroll-snap-type: x mandatory;
                                }

                                .slider-wrapper .image-list .image-item {
                                    width: 280px;
                                    height: 380px;
                                }

                                .slider-scrollbar .scrollbar-thumb {
                                    width: 20%;
                                }
                            }


                            /* مشان اقدر اعمل الخط يلي تحت الصورة  */
                            .main-title::after {
                                content: '';
                                width: 120px;
                                height: 2px;
                                background-color: #FFD700;
                                position: absolute;
                                bottom: -20px;
                                /* نظام التوسيط  */
                                left: 50%;
                                transform: translateX(-50%);
                            }










                            .bottom_right .text_image {
                                color: #1a1a1a;
                            }

                            /* <!-- الصفحة الخامسة  --> */
                            .team {
                                background-color: #e7dfd2;
                            }

                            .team h2 {
                                color: #1a1a1a;
                            }

                            .team .box h5 {
                                background-color: #0d4f9b;
                            }

                            .b {
                                position: absolute;
                                left: 8px;
                                bottom: 5px;
                                padding: 7px 7px;
                            }

                            .b:hover {
                                background-color: #0d4f9b;
                            }

                            /* <!-- الصفحة الخامسة  --> */
    </style>


    <title>kullanıcıAnasayfa</title>
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

                    <div class="imag_left-text_right pt-5 pb-5  align-items-center " id="Services" style="background: #e7dfd2;   min-height: 100vh">
                        <div class="container">
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




<div class="pt-5 pb-5  align-items-center" id="scrollToSection">
    <div class="container">
        <div class="row">
            <?php
            while ($row = mysqli_fetch_assoc($query)) {
                $noteId = $row['id'];
                $product_name1 = isset($row['Username']) ? htmlspecialchars($row['Username']) : '';
                $product_price = isset($row['price']) ? htmlspecialchars($row['price']) : '';
                $noteText = isset($row['text']) ? htmlspecialchars($row['text']) : '';
                $imageData = $row['image'];
                echo "<div class='col-md-12 col-lg-12'>";
                echo "<div class='main-containerr'>";
                echo "<div class='container1'>";
                echo "<div class='container2'>";
                echo "<textarea class='note-text' placeholder='Write Note...' maxlength='96' data-note-id='$noteId' name='delete'>";
                echo "<h5 class='card-text'>$product_name1</h5>";
                echo "<div class='card'>";
                $imageType = "image/jpeg"; 
                $base64Image = base64_encode($imageData);
                echo "<img class='card-img-top' src='data:$imageType;base64,$base64Image' alt='Product Image' />";
                echo "  <div class='card-body'>";
                echo "<p class='card-text'>$product_price</p>";
                echo "<span class='card-text'>$noteText</span>";
                echo "</div>";
                echo "</div>";
                echo "</textarea>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
            ?>
        </div>
    </div>
</div>

<script>


// <!-- انت الحذف -->

function deleteNote(noteId) {
    if (confirm('Bu notu silmek istediğinizden emin misiniz?')) {
        // Send an AJAX request to delete the note from the database
        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Find the card element by its noteId and remove it
                const cardToDelete = document.querySelector(`[data-note-id="${noteId}"]`);
                if (cardToDelete) {
                    cardToDelete.parentElement.parentElement.parentElement.parentElement.remove();
                }
            } 
        };
        xhr.open('GET', `kullanıcıAnasayfa.php?delete-button=${noteId}`, true);
        xhr.send();
    }
}

// <!-- انت الحذف -->








        // دالة لإنشاء بطاقات
        function createCard(noteId, noteText) {
            // الحصول على حاوية البطاقات
            let container2 = document.getElementsByClassName("container2")[0];

            // إنشاء عنصر بطاقة جديد
            let card = document.createElement("div");
            card.className = "card";

            // إنشاء الجزء السفلي الأيسر للتحرير
            let bottomLeftDiv = document.createElement("div");
            bottomLeftDiv.className = "bottom-left";
            // إضافة رابط لتحرير البطاقة (يمكنك تعديل الرابط حسب الحاجة)
            bottomLeftDiv.innerHTML = `<a class="btn10"  style="cursor:pointer;  font-size:15px;" href="/MobilyaMagazasi/kartDeğiştirme/kartDeğiştirme.php?edit=${noteId}"><i class="fa-solid fa-pen-to-square a"></i></a>`;
            card.appendChild(bottomLeftDiv);

            // إضافة نص المذكرة إلى البطاقة
            card.innerHTML += `${noteText}`;
            

            // إنشاء الجزء السفلي الأيمن للحذف
            let bottomRightDiv = document.createElement("div");
            bottomRightDiv.className = "bottom-right";
            // إضافة زر لحذف البطاقة
            bottomRightDiv.innerHTML = `
                <a class="btn10 delete-button" data-note-id="${noteId}" onclick="deleteNote(${noteId})" style="cursor:pointer;  font-size:15px;" ><i class="fa-solid fa-trash"></i></a>`;
            card.appendChild(bottomRightDiv);

            // تطبيق تنسيق عشوائي على البطاقة
            card.style.backgroundColor = getRandomColor();
            card.style.transform = `rotate(${getRandomRotation()})`;
            card.style.margin = `${getRandomMargin()}px`;
            
            card.style.width = "30%";
            card.style.height = "30%";

            // إضافة مستمع حدث عندما يتم التمرير بالمؤشر فوق البطاقة لتكبيرها
            card.addEventListener("mouseenter", function () {
                card.style.transform = "scale(1.1)";
            });

            // إضافة مستمع حدث عندما يتم مغادرة المؤشر لإعادة تعيين تحول البطاقة
            card.addEventListener("mouseleave", function () {
                card.style.transform = `rotate(${getRandomRotation()})`;
            });

            // إضافة مستمع حدث النقر المزدوج لإزالة البطاقة
            card.addEventListener("dblclick", function () {
                card.remove();
            });

            // إضافة البطاقة إلى الحاوية
            container2.appendChild(card);
        }

        // دالة لإنشاء لون خلفية بطاقة عشوائي
        let i = 0;
        function getRandomColor() {
            let random_color = ["#e15f41", "#303952", "#3dc2ff", "#04e022", "#bc83e6", "#ebb328"];
            if (i > random_color.length - 1) {
                i = 0;
            }
            return random_color[i++];
        }

        // دالة لإنشاء دوران بطاقة عشوائي
        function getRandomRotation() {
            let randomRotations = ["3deg", "1deg", "-1deg", "-3deg", "-5deg", "-10deg"];
            return randomRotations[Math.floor(Math.random() * randomRotations.length)];
        }

        // دالة لإنشاء هامش بطاقة عشوائي
        function getRandomMargin() {
            let randomMargins = [-5, 1, 5, 10, 15, 20];
            return randomMargins[Math.floor(Math.random() * randomMargins.length)];
        }

        // أضف هذا الكود لإنشاء بطاقات لكل مذكرة عند تحميل الصفحة
        document.addEventListener("DOMContentLoaded", function () {
            // احصل على جميع العناصر التي تحمل الفئة "note-text"
            let noteTextElements = document.querySelectorAll(".note-text");
            
            // تكرار كل عنصر مذكرة وإنشاء بطاقة
            noteTextElements.forEach(function (element) {
                let noteId = element.getAttribute("data-note-id");
                let noteText = element.value;
                createCard(noteId, noteText);
            });
        });

        // دالة لحذف مذكرة


        // كود للتمرير إلى القسم المحدد عند تحميل الصفحة
        window.onload = function () {
            const sectionToScroll = document.getElementById('scrollToSection');
            if (sectionToScroll) {
                sectionToScroll.scrollIntoView();
            }
        };
</script>
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



<script src="/MobilyaMagazasi/ilkAnasayfa/jsbootstrap/bootstrap.bundle.min.js"></script> <!-- Bootstrap CSS -->
    <script src="/MobilyaMagazasi/ilkAnasayfa/jsbootstrap/all.min_icon.js"></script> <!-- Icon -->

</body>

</html>