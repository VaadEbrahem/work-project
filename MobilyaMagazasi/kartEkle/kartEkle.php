<?php
    include 'config.php';
    
    $NoTarih = date("Y-m-d");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $product_price = $_POST['product_price'];
        $note_text = $_POST['note_text'];
        $Username = $_POST['Username'];
        $imageData = file_get_contents($_FILES['image']['tmp_name']);

        $stmt = mysqli_prepare($conn, "INSERT INTO `kartekle` (image, price, text, Username, Tarih, isactive) VALUES (?, ?, ?, ?, ?, 1)");
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "sssss", $imageData, $product_price, $note_text, $Username, $NoTarih);

            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_close($stmt);
                //إعادة التوجيه إلى الصفحة بعد إضافة البيانات إلى قاعدة البيانات بنجاح
                header('Location: /MobilyaMagazasi/kullanıcıAnasayfa/kullanıcıAnasayfa.php#scrollToSection');
                exit;
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/MobilyaMagazasi/kartEkle/cssbootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="/MobilyaMagazasi/kartEkle/cssbootstrap/all.min_icon.css">
<style>


    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;1,100&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Poppins', sans-serif;
    }

    a {
        text-decoration: none;
    }

    .registration_form {
        background-color: #ffb0c3;
        position: relative;
    }

    .registration_form .admin-product-form-container {
        background-color: #fff;
        height: 400px;
        width: 440px;
        box-shadow: 5px 5px 5px rgba(0, 0, 0, .1);
        border-radius: 10px;
        margin-bottom: 2px;
        margin-top: 2px;
    }
        h3 {
    text-transform: uppercase;
    color: #333;
    margin-bottom: 1rem;
    text-align: center;
    }

    .tarih{

        position: absolute;
        right: 50px;
        bottom: 10px;
    }

    .registration_form .inputs_içeri {
        padding-left: 50px;
        width: 90%;
    }


    .registration_form input[type="file"]:focus,
    .registration_form input[type="text"]:focus,
    .registration_form input[type="number"]:focus,
    .registration_form input[type="email"]:focus,
    .registration_form input[type="password"]:focus {
        box-shadow: none;
        outline: none;
        /* إزالة تدوير الحدود واستخدام الزوايا الافتراضية */
        border: 1px solid #ffb0c3;
        
    }
    /*مشان الزر*/

    .registration_form .main-btn:focus {
        /*مو المستطيل هوي شكل دائرة ما بدك ياها هيك بتعملي */
        background-color: #ffb0c3;
        box-shadow: none;
        outline: none;
        border-radius: 0;
        border-radius: 10px;
    }

    .registration_form .main-btn {
        border: none;
        /*مو المستطيل هوي شكل دائرة ما بدك ياها هيك بتعملي */
        border-radius: 1px;
        /*مو المستطيل هوي شكل دائرة ما بدك ياها هيك بتعملي */
        width: 78%;
        background: #ffb0c3;
        color: #000000;
        position: relative;
        z-index: 0;
        margin-left: 50px;
        padding: 15px 0px;
        border-radius: 10px;
    }

    .registration_form .main-btn::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 0%;
        height: 100%;
        background: #d86c8e;
        transition: .3s linear;
        z-index: -1;
        margin-top: 0rem;
        border-radius: 10px;
    }

    .registration_form .main-btn:hover::before {
        width: 100%;
        left: 0;
        border-radius: 10px;
    }

    .registration_form .main-btn:hover {
        background: #d86c8e;
        border-radius: 10px;
    }
</style>
<title>Document</title>
</head>
<body>
<div class="card mb-3 registration_form" style="max-width: 840px;">
    <div class="container">
        <div class="row g-0">
            <div class="col-lg-12" >
                <div class="admin-product-form-container">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                        <h3>yeni kart ekle</h3> <div class="tarih"> <?php echo $NoTarih; ?></div>
                        <div class=" mb-4 inputs_içeri">
                            <input type="text" class="form-control" placeholder="adımız"  name="Username" required>
                        </div>
                        <div class=" mb-4 inputs_içeri">
                        <input type="text"  class="form-control" placeholder="ürün adini girin" type="text" name="product_price" required>
                        </div>
                        <div class=" mb-4 inputs_içeri">
                        <input type="number"  class="form-control" placeholder="ürün fiyatini girin" name="note_text" required>
                        </div>
                        <div class=" mb-4 inputs_içeri">
                        <input type="file"  class="form-control" accept="image/png,image/jpeg,image/jpg" name="image" required>
                        </div>
                        <div class=" mb-4 inputs_içeri">
                        <input type="submit" class="form-control main-btn" value="Submit" name="Submit" >
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        if (window.location.hash === '#scrollToSection') {
            const targetSection = document.querySelector('.pt-5.pb-5.align-items-center');
            if (targetSection) {
                targetSection.scrollIntoView({ behavior: 'smooth' });
            }
        }
    });
</script>

<script src="/MobilyaMagazasi/kartEkle/jsbootstrap/bootstrap.bundle.min.js"></script>
<script src="/MobilyaMagazasi/kartEkle/jsbootstrap/all.min_icon.js"></script>
</body>
</html>