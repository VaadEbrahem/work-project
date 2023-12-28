<?php
    session_start();
    include 'config.php';
    $message = [];
    $id = isset($_GET['edit']) ? $_GET['edit'] : null;
    
    if (!$id) {
        die("No user ID provided for editing.");
    }

    if (isset($_POST['from_anasayfa']) && $_POST['from_anasayfa'] == 1) {
        $Password = $_POST['Password'];
        $ConfirmPassword = $_POST['ConfirmPassword'];
        if ($Password !== $ConfirmPassword) {
            header('Location: /MobilyaMagazasi/anasayfa/anasayfa.php?edit=' . $id . '&password_mismatch=1');
            exit;
        }
    }


    if (isset($_POST['Submit'])) {
        $Username = $_POST['Username'];
        $PhoneNumber = $_POST['PhoneNumber'];
        $Email = $_POST['Email'];
        $Password = $_POST['Password'];
        $ConfirmPassword = $_POST['ConfirmPassword'];

            $update = "UPDATE `magaza`  SET Username=?, PhoneNumber=?, Email=? , Password=?, ConfirmPassword=? WHERE id=?";
            $stmt = mysqli_prepare($conn, $update);
            mysqli_stmt_bind_param($stmt, 'sssssi', $Username, $PhoneNumber, $Email, $Password, $ConfirmPassword, $id);
            $result = mysqli_stmt_execute($stmt);
            if ($result) {
                $_SESSION['success_message'] = 'Veri başarıyla güncellendi';
                header('Location: /MobilyaMagazasi/anasayfa/anasayfa.php?edit=' . $id . '&success_message=1');
                exit;
            } else {
                $message[] = 'Veri güncelleme sırasında bir hata oluştu.';
            }
        }

    $select = mysqli_query($conn, "SELECT * FROM magaza WHERE id='$id'");
    $row = mysqli_fetch_assoc($select);

    if (!$row) {
        die("User not found for ID: $id");
    }
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/MobilyaMagazasi/Profilim/cssbootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="/MobilyaMagazasi/Profilim/cssbootstrap/all.min_icon.css">
    <link rel="stylesheet" href="/MobilyaMagazasi/Profilim/Profilim.css">
    <title>Profil Düzenleme Sayfası</title>
</head>
<body>
    <div class="registration_form d-flex justify-content-center align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-4"> 
                </div>

                <div class="col-lg-4 text-center text-md-start background_form">
                    <div class="feat">
                        <h4 class="text-uppercase">Profil Form</h4>
                    </div>

                    <form action="<?php echo $_SERVER['PHP_SELF'] . '?edit=' . $id; ?>" method="post" enctype="multipart/form-data">
                            <div class=" mb-4 inputs_içeri">
                                <i class="fa-solid fa-user form_icon"></i>
                                <input type="text" class="form-control" placeholder="Username" name="Username"
                                    value="<?php echo $row['Username'] ?? ''; ?>" required>
                            </div>

                            <div class=" mb-4 inputs_içeri">
                                <i class="fa-solid fa-phone form_icon"></i>
                                <input type="number" class="form-control" placeholder="Phone Number" name="PhoneNumber"
                                    value="<?php echo $row['PhoneNumber'] ?? ''; ?>" required>
                            </div>

                            <div class=" mb-4 inputs_içeri">
                                <i class="fa-solid fa-envelope form_icon"></i>
                                <input type="email" class="form-control" aria-describedby="emailHelp"
                                    placeholder="Email" name="Email" value="<?php echo $row['Email'] ?? ''; ?>"
                                    required>
                            </div>

                            <div class=" mb-4 inputs_içeri">
                                <i class="fa-solid fa-lock form_icon"></i>
                                <input type="password" class="form-control" placeholder="Password" name="Password"
                                    required>
                            </div>

                            <div class=" mb-4 inputs_içeri">
                                <i class="fa-solid fa-lock form_icon"></i>
                                <input type="password" class="form-control" placeholder="Confirm Password"
                                    name="ConfirmPassword" required>
                            </div>

                            <input type="hidden" name="from_anasayfa" value="1">
                            <button type="submit" class="btn main-btn form-control mt-4" name="Submit">UPDATE PROFILE</button>
                    </form>
                </div>

                <div class="col-lg-4"> 
                </div>
            </div>
        </div>
    </div>
    <script src="/MobilyaMagazasi/Profilim/jsbootstrap/bootstrap.bundle.min.js"></script>
    <script src="/MobilyaMagazasi/Profilim/jsbootstrap/all.min_icon.js"></script>
</body>
</html>
