<?php
include("config.php");

$query = mysqli_query($conn, "SELECT * FROM `magaza`");

if (!$query) {
    die("Query error: " . mysqli_error($conn));
}
// kullanciاحسب إجمالي عدد الصفوف المستخدمين في عمود  
$totalUsers = mysqli_num_rows($query);

//isactive احسب عدد العناصر التي تحتوي على "1" و"0" في العمود 
$activeCount = 0;
$inactiveCount = 0;

while ($row = mysqli_fetch_assoc($query)) {
    if ($row['isactive'] == 1) {
        $activeCount++;
    } elseif ($row['isactive'] == 0) {
        $inactiveCount++;
    }
}
?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/MobilyaMagazasi/kullanıcılar/cssbootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="/MobilyaMagazasi/kullanıcılar/cssbootstrap/all.min_icon.css">
    <link rel="stylesheet" href="/MobilyaMagazasi/kullanıcılar/kullanıcılar.css">
    <title>listeSilme</title>
</head>

<body>
    <div class="our-work text-center pt-5 pb-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 text-center align-items-center">
                    <div class="card align_kullancılar" style="width: 18rem;     padding: 10px;   background-color:  #ffb0c3;
    box-shadow: 5px 5px 5px rgba(0, 0, 0, .1);
    border-radius: 10px;">
                        <p>kullanıcı</p>
                        <h5 class="card-title">
                            <?php echo $totalUsers; ?>
                        </h5>
                    </div>
                </div>


                <div class="col-lg-4 text-center align-items-center">
                    <div class="card align_kullancılar" style="width: 18rem;     padding: 15px;   background-color:  #ffb0c3;
    box-shadow: 5px 5px 5px rgba(0, 0, 0, .1);
    border-radius: 10px;">
                        <p>aktif</p>
                        <h5 class="card-text">
                            <?php echo $activeCount; ?> (Active)
                        </h5>
                    </div>
                </div>
                <div class="col-lg-4 text-center align-items-center">
                    <div class="card align_kullancılar" style="width: 18rem;    padding: 15px;   background-color:  #ffb0c3;
    box-shadow: 5px 5px 5px rgba(0, 0, 0, .1);
    border-radius: 10px;">
                        <p>aktif Değil</p>
                        <h5 class="card-text">
                            <?php echo $inactiveCount; ?> (Inactive)
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

















    <script src="/MobilyaMagazasi/kullanıcılar/jsbootstrap/bootstrap.bundle.min.js"></script>
    <script src="/MobilyaMagazasi/kullanıcılar/jsbootstrap/all.min_icon.js"></script>
</body>

</html>