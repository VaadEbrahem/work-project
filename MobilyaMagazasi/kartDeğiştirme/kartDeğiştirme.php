<?php
include 'config.php';
$message = [];
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    if (isset($_POST['update_product'])) {
        $product_price = $_POST['price']; 
        $note_text = $_POST['text']; 
        $Username = $_POST['Username'];
        $imageData = file_get_contents($_FILES['image']['tmp_name']);

        if (empty($product_price)) {
            $message[] = 'Please fill in all fields';
        } else {
            $update = "UPDATE `kartekle` SET Username=?, image=?, price=?, text=? WHERE id=?";
            $stmt = mysqli_prepare($conn, $update);
            if ($stmt) {
                mysqli_stmt_bind_param($stmt, "ssssi", $Username, $imageData, $product_price, $note_text, $id);
                $upload = mysqli_stmt_execute($stmt);

                if ($upload) {
                    $errors['dogru_inputes'] = '<center> <span style="color:#000000;; font-size:13px;  position: absolute;
                    right: 45%;">"Durum başarıyla eklendi"</span> </center>';
                } else {
                    error_log('An error occurred during data update: ' . mysqli_error($conn));
                    $message[] = 'An error occurred during data update.';
                }
                mysqli_stmt_close($stmt);
            }
        }
    }

    $select = "SELECT * FROM `kartekle` WHERE id = ?";
    $stmt = mysqli_prepare($conn, $select);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);
        mysqli_stmt_close($stmt);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/MobilyaMagazasi/kartDeğiştirme/cssbootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="/MobilyaMagazasi/kartDeğiştirme/cssbootstrap/all.min_icon.css">
    <link rel="stylesheet" href="/MobilyaMagazasi/kartDeğiştirme/kartDeğiştirme.css">
    <title>Document</title>
</head>


<div class="registration_form d-flex justify-content-center align-items-center">
        <div class="container">
            <div class="row">
        <div class="col-lg-4">
                  
                      <!--  هي مشان رسالة انو كل المعلومات صح وتطلع  بقلب بالعلى يلي انشته رسالة  -->
                  <?php if (!empty($errors['dogru_inputes'])): ?>
                        <div class="error-message"><?php echo $errors['dogru_inputes']; ?></div>
                    <?php endif; ?>
                </div>
        <div class="col-lg-4 col-md-6 text-center text-md-start background_form">
                <div class="admin-product-form-container">
                    <form action="<?php echo $_SERVER['PHP_SELF'] . '?edit=' . $id; ?>" method="post" enctype="multipart/form-data">
                       
                        <div class="feat">
                        <h4 class="text-uppercase">Kartı Düzenle</h4>
                        </div>
                        <div class="mb-4 inputs_içeri">
                        <i class="fa-solid fa-user form_icon"></i>
                            <input type="text" class="form-control" placeholder="Username" name="Username"
                                   value="<?php echo $row['Username'] ?? ''; ?>">
                        </div>
                        <div class="mb-4 inputs_içeri">
                        <i class="fa-solid fa-text-width form_icon"></i>
                            <input type="text" class="form-control"  placeholder="price"name="text"
                                    value="<?php echo $row['price'] ?? ''; ?>">
                        </div>
                        <div class="mb-4 inputs_içeri">
                        <i class="fa-solid fa-barcode form_icon"></i>
                            <input type="number" class="form-control" placeholder="text" name="price"
                            value="<?php echo $row['text'] ?? ''; ?>">
                        </div>
                        <div class="mb-4 inputs_içeri">
                            <input type="file" class="form-control" accept="image/png,image/jpeg,image/jpg" name="image" >
                        </div>
                        <div class="mb-4 inputs_içeri">
                            <input type="submit" name="update_product" value="Update Data" class="btn   main-btn1 ">
                            <a href="/MobilyaMagazasi/kullanıcıAnasayfa/kullanıcıAnasayfa.php" class="btn   main-btn1 ">Go Back</a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-4"></div>
        </div>
    </div>
</div>


<script src="/MobilyaMagazasi/kartDeğiştirme/jsbootstrap/bootstrap.bundle.min.js"></script>
<script src="/MobilyaMagazasi/kartDeğiştirme/jsbootstrap/all.min_icon.js"></script>
</body>
</html>
