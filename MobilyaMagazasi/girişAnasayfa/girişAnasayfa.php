<?php
include 'config.php';
$message = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];

    if (!empty($Email) && !empty($Password)) {
        $query = "SELECT * FROM `magaza` WHERE `Email` = ? AND `Password` = ?";
        $stmt = mysqli_prepare($conn, $query);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ss", $Email, $Password);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $user_id = $row['id'];
                header("Location:/MobilyaMagazasi/anasayfa/anasayfa.php?edit=" . $user_id);
                exit();
            } else {
                $message['dogru_inputes'] = '<center><span style="color:#000000; font-size:13px; position: absolute; right: 35%;">Email veya şifre hatalı</span></center>';
            }

            mysqli_stmt_close($stmt);
        } else {
            $message = "Sorgu hazırlanırken bir hata oluştu";
        }
    } else {
        $message = "Lütfen tüm alanları doldurun";
    }
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/MobilyaMagazasi/girişAnasayfa/cssbootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="/MobilyaMagazasi/girişAnasayfa/cssbootstrap/all.min_icon.css">
    <link rel="stylesheet" href="/MobilyaMagazasi/girişAnasayfa/girişAnasayfa.css">
    <title>Registration giriş</title>
</head>

<body>
    <div class="registration_form d-flex justify-content-center align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <?php if (!empty($message['dogru_inputes'])): ?>
                    <div class="error-message">
                        <?php echo $message['dogru_inputes']; ?>
                    </div>
                    <?php endif; ?>
                </div>

                <div class="col-lg-6 col-md-6 text-center text-md-start background_form">
                    <div class="row">
                        <div class="col-lg-5 col-md-6">
                        <div class="image_form">
                        <img src="/MobilyaMagazasi/girişAnasayfa/image/form.png" class="image_loging" alt="">
                        </div>
                        </div>
                        <div class="col-lg-7 col-md-6">
                            <div class="inputs_logeng">
                                    <div class="feat">
                                        <h4 class="text-uppercase">Login</h4>
                                    </div>
                                    <form class="featFrom" action="/MobilyaMagazasi/girişAnasayfa/girişAnasayfa.php" method="post">
                                        <div class="mb-4 inputs_içeri">
                                            <div class="input-icon">
                                                <i class="fas fa-envelope form_icon"></i>
                                                <input type="email" class="form-control" aria-describedby="emailHelp"
                                                    placeholder="Email" name="Email" required>
                                            </div>
                                        </div>
                                        <div class="mb-4 inputs_içeri">
                                            <div class="input-icon">
                                                <i class="fas fa-lock form_icon"></i>
                                                <input type="Password" class="form-control" placeholder="Password"
                                                    name="Password" required>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn main-btn form-control" name="Submit">Giriş Yap</button>

                                    </form>
                                    <a href="/MobilyaMagazasi/formAnasayfa/formAnasayfa.php">
                                        <center class="mt-3 form_span"><span> Bir Hesabınız Yok Mu?
                                                <i class="fa-solid fa-arrow-right"></i></span></center>
                                    </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3">
                </div>
            </div>
        </div>
    </div>
    <script src="/MobilyaMagazasi/girişAnasayfa/jsbootstrap/bootstrap.bundle.min.js"></script>
    <script src="/MobilyaMagazasi/girişAnasayfa/jsbootstrap/all.min_icon.js"></script>
</body>
</html>
