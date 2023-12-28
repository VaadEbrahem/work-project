<?php
include("config.php");

$query = mysqli_query($conn, "SELECT * FROM `magaza` WHERE `isactive` = 1");

if (!$query) {
    die("Query error: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/MobilyaMagazasi/kullanıcılarListe/cssbootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="/MobilyaMagazasi/kullanıcılarListe/cssbootstrap/all.min_icon.css">
    <link rel="stylesheet" href="/MobilyaMagazasi/kullanıcılarListe/kullanıcılarListe.css">
    <title>kullanıcılarListe</title>
</head>
<body>
    <table class="Table Table_top_bottom">
        <tr>
            <th class='td_kullanıcılar0'> Username </th>
            <th class='td_kullanıcılar0'> PhoneNumber </th>
            <th class='td_kullanıcılar0'> Email </th>
            <th class='td_kullanıcılar0'> isactive </th>
        </tr>

        <?php
        while ($row = mysqli_fetch_assoc($query)) { 
            echo "<tr>";
            echo "<td class='td_kullanıcılar'>" . $row['Username'] . "</td>";
            echo "<td class='td_kullanıcılar'>" . $row['PhoneNumber'] . "</td>";
            echo "<td class='td_kullanıcılar'>" . $row['Email'] . "</td>";
            echo "<td class='td_kullanıcılar'>" . $row['isactive'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>

    <script src="/MobilyaMagazasi/kullanıcılarListe/jsbootstrap/bootstrap.bundle.min.js"></script>
    <script src="/MobilyaMagazasi/kullanıcılarListe/jsbootstrap/all.min_icon.js"></script>
</body>
</html>
