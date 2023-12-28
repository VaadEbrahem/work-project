<?php
// تضمين ملف 'config.php' لإجراء اتصال بقاعدة البيانات
include 'config.php';

// تهيئة مصفوفة فارغة لتخزين أخطاء محتملة
$errors = [];

// التحقق مما إذا تم تقديم النموذج
if (isset($_POST['Submit'])) {
    // استخراج البيانات من النموذج باستخدام   '$_POST'
    $Username = $_POST['Username'];
    $PhoneNumber = $_POST['PhoneNumber'];
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];
    $ConfirmPassword = $_POST['ConfirmPassword'];
    $isactive = 1;

    if ($Password !== $ConfirmPassword) {  /* مشان لزم يكنون الشفرات نفس بعض <!-- مشان يطالعلي الرسالة تحت الزر بالضبط  -->*/
        $errors['password_mismatch'] = '<center class="mt-1"> <span style="color:#000000;; font-size:12px;  position: absolute;
                right: 43%;">"Şifre ve Şifreyi Onayla uyuşmuyor."</span> </center>';
    } else {
        // إعداد استعلام           SQL لإدراج البيانات في قاعدة البيانات
        $insert = "INSERT INTO `magaza` (Username, PhoneNumber, Email, Password, ConfirmPassword, isactive) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $insert);

        if ($stmt) {
            // ارتباط قيم الحقول بالمعلمة المحضرة
            mysqli_stmt_bind_param($stmt, 'sssssi', $Username, $PhoneNumber, $Email, $Password, $ConfirmPassword, $isactive);

            // تنفيذ الاستعلام وفحص نجاح التنفيذ أو عرض الأخطاء
            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_close($stmt);
                // echo "Durum başarıyla eklendi"; لزم تنكتب بهي الشكل  
                // <!--  هي مشان رسالة انو كل المعلومات صح وتطلع  بقلب بالعلى يلي انشته رسالة  -->
                $errors['dogru_inputes'] = '<center> <span style="color:#000000;; font-size:13px;  position: absolute;
                right: 45%;">"Durum başarıyla eklendi"</span> </center>';
            } else {
                echo "Veritabanı hatası: " . mysqli_error($conn);
            }
        } else {
            echo "Veritabanı hatası: " . mysqli_error($conn);
        }
    }
}
?>


<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/MobilyaMagazasi/formAnasayfa/cssbootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="/MobilyaMagazasi/formAnasayfa/cssbootstrap/all.min_icon.css">
    <link rel="stylesheet" href="/MobilyaMagazasi/formAnasayfa/formAnasayfa.css">
    <title>Registration Form</title>
</head>
<body>
    <div class="registration_form d-flex justify-content-center align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="image_form">
                        <img src="/MobilyaMagazasi/formAnasayfa/image/form.png" alt="">
                    </div>
                      <!--  هي مشان رسالة انو كل المعلومات صح وتطلع  بقلب بالعلى يلي انشته رسالة  -->
                  <?php if (!empty($errors['dogru_inputes'])): ?>
                        <div class="error-message"><?php echo $errors['dogru_inputes']; ?></div>
                    <?php endif; ?>
                </div>
                
                <div class="col-lg-4 col-md-6 text-center text-md-start background_form">
                      
                    <div class="feat">
                        <h4 class="text-uppercase">Registration Form</h4>
                    </div>

                    <form class="featFrom" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <div class=" mb-4 inputs_içeri">
                            <i class="fa-solid fa-user form_icon"></i>
                            <input type="text" class="form-control" placeholder="Username"  name="Username" required>
                        </div>
                    
                        <div class=" mb-4 inputs_içeri">
                            <i class="fa-solid fa-phone form_icon"></i>
                            <input type="number" class="form-control" placeholder="Phone Number" name="PhoneNumber" required>
                        </div>

                        <div class=" mb-4 inputs_içeri">
                            <i class="fa-solid fa-envelope form_icon"></i>
                            <input type="email" class="form-control" aria-describedby="emailHelp" placeholder="Email" name="Email" required>
                        </div>
                        <div class=" mb-4 inputs_içeri">
                            <i class="fa-solid fa-lock form_icon"></i>
                            <input type="password" class="form-control" placeholder="Password" name="Password" required>
                        </div>
                        <div class=" mb-4 inputs_içeri">
                            <i class="fa-solid fa-lock form_icon"></i>
                            <input type="password" class="form-control" placeholder="Confirm Password" name="ConfirmPassword" required>
                        </div>
                        <button type="submit" class="btn main-btn form-control" name="Submit">REGISTER NOW</button>
                    </form>

                    <a href="/MobilyaMagazasi/girişAnasayfa/girişAnasayfa.php">
                        <center class="mt-3 form_span"><span>&copy;2023 All rights reserved</span></center>
                    </a>
                </div>
                <div class="col-lg-4"> 
                         <!-- مشان يطالعلي الرسالة تحت الزر بالضبط  -->
                         <?php if (!empty($errors['password_mismatch'])): ?>
                        <div class="error-message"><?php echo $errors['password_mismatch']; ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <script src="/MobilyaMagazasi/formAnasayfa/jsbootstrap/bootstrap.bundle.min.js"></script>
    <script src="/MobilyaMagazasi/formAnasayfa/jsbootstrap/all.min_icon.js"></script>
</body>
</html>
