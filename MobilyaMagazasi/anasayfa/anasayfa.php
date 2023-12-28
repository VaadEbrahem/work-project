<?php session_start(); ?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/MobilyaMagazasi/anasayfa/cssbootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="/MobilyaMagazasi/anasayfa/cssbootstrap/all.min_icon.css">
    <link rel="stylesheet" href="/MobilyaMagazasi/anasayfa/anasayfa.css">
    
    <title>anasayfa</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg" >
        <div class="container-fluid" style="margin-left: 32%;">
            <a class="navbar-brand" href="#" onclick="loadContent(); event.preventDefault();">
                Profilim
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
           

                    <li class="nav-item">
                        <a class="nav-link anasayfa_link" href="#" onclick="loadContent3(); event.preventDefault();"> Kart Ekle </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link anasayfa_link" href="#" onclick="loadContent4(); event.preventDefault();"> kullanıcılar Listeler </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link anasayfa_link" href="#" onclick="loadContent1(); event.preventDefault();"> kullanıcılar </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!--  رسالة الغلط يلي جاية من صفحة البروفايل-->
    <div class=" d-flex justify-content-center align-items-center">
        <div class="container">
            <div class="row">
                    <?php if (isset($_GET['password_mismatch']) && $_GET['password_mismatch'] == 1): ?>
                        <div class="error-message">
                        <?php echo '<center class="mt-1"> <span style="color:#000000; font-size:13px;  position: absolute; right: 45%;">"Şifre ve Şifreyi Onayla uyuşmuyor."</span> </center>'; ?>
                        </div>
                    <?php endif; ?>

                    <?php if (isset($_GET['success_message']) && $_GET['success_message'] == 1): ?>
                        <div class="error-message">
                        <?php echo '<center class="mt-1"> <span style="color:#000000; font-size:13px;  position: absolute; right: 45%;">"Veri başarıyla güncellendi."</span> </center>'; ?>
                        </div>
                    <?php endif; ?>
            </div>
        </div>
    </div>
    <!-- landing اسم القسم انا انشاته -->
    <div class="landing  d-flex  justify-content-center align-items-center" id="content-container">
        <div class="text-center">
        </div>
    </div>






    <script src="/MobilyaMagazasi/anasayfa/jsbootstrap/bootstrap.bundle.min.js"></script>
    <script src="/MobilyaMagazasi/anasayfa/jsbootstrap/all.min_icon.js"></script>

    <script>
        /*صفحة الملف الشخصي  */
        function loadContent() {
            var contentContainer = document.getElementById('content-container');
            var url = '/MobilyaMagazasi/Profilim/Profilim.php?edit=<?php echo $_GET['edit']; ?>';
            var xhr = new XMLHttpRequest();

            xhr.open('GET', url, true);

            xhr.onload = function () {
                if (xhr.status === 200) {
                    contentContainer.innerHTML = xhr.responseText;
                } else {
                    contentContainer.innerHTML = 'Error loading content.';
                }
            };

            xhr.send();
            history.pushState(null, null, '/MobilyaMagazasi/anasayfa/anasayfa.php?edit=<?php echo $_GET['edit']; ?>');
        }
        //تحميل
        //idgönder.php
        // تلقائيًا عند تحميل الصفحة 
        window.onload = loadContent;


        
        /*صفحة المستخدمين  */
        function loadContent1() {
                    var contentContainer = document.getElementById('content-container');
                    var xhr = new XMLHttpRequest();
                    var url = "/MobilyaMagazasi/kullanıcılar/kullanıcılar.php";
                    xhr.open('GET', url, true);
                    xhr.onload = function () {
                        if (xhr.status === 200) {
                            contentContainer.innerHTML = xhr.responseText;
                        } else {
                            contentContainer.innerHTML = 'Error loading content.';
                        }
                    };
                    xhr.send();
                    //قم بتغيير عنوان ورل  دون إعادة تحميل الصفحة
                    history.pushState(null,null, '/MobilyaMagazasi/anasayfa/anasayfa.php?edit=<?php echo $_GET['edit']; ?>');
        }



                function loadContent3() {
                    var contentContainer = document.getElementById('content-container');
                    var xhr = new XMLHttpRequest();
                    var url = "/MobilyaMagazasi/kartEkle/kartEkle.php";
                    xhr.open('GET', url, true);
                    xhr.onload = function () {
                        if (xhr.status === 200) {
                            contentContainer.innerHTML = xhr.responseText;
                        } else {
                            contentContainer.innerHTML = 'Error loading content.';
                        }
                    };
                    xhr.send();
                    //قم بتغيير عنوان ورل  دون إعادة تحميل الصفحة
                    history.pushState(null,null, '/MobilyaMagazasi/anasayfa/anasayfa.php?edit=<?php echo $_GET['edit']; ?>');
                }








                function loadContent4() {
                    var contentContainer = document.getElementById('content-container');
                    var xhr = new XMLHttpRequest();
                    var url = "/MobilyaMagazasi/kullanıcılarListe/kullanıcılarListe.php";
                    xhr.open('GET', url, true);
                    xhr.onload = function () {
                        if (xhr.status === 200) {
                            contentContainer.innerHTML = xhr.responseText;
                        } else {
                            contentContainer.innerHTML = 'Error loading content.';
                        }
                    };
                    xhr.send();
                    //قم بتغيير عنوان ورل  دون إعادة تحميل الصفحة
                    history.pushState(null,null, '/MobilyaMagazasi/anasayfa/anasayfa.php?edit=<?php echo $_GET['edit']; ?>');
                }












    </script>
</body>
</html>