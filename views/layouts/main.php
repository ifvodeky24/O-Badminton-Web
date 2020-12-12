<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\User;

AppAsset::register($this);
$nama_lengkap=Yii::$app->user->identity->nama_lengkap;
$alamat=Yii::$app->user->identity->alamat;
$id_user=Yii::$app->user->identity->id_user;
$foto=Yii::$app->user->identity->foto;
User::find()
->where(['id_user' => $id_user])
->one();

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

</head>
<body>
<?php $this->beginBody() ?>

<div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> 
            
                            <span>
                                <?= empty($user->foto) ?
                  Html::img('@web/files/images/'.$foto, ['class' => 'img-circle', 'alt' => 'User Image', 'height'=>'50', 'width'=>'50']) :

                  Html::img(\Yii::$app->params['frontendUrl'] . $user->foto, ['class' => 'img-circle', 'alt' => 'User Image', 'height'=>'50', 'width'=>'50']) ?>

                                <!-- <img alt="image" class="img-circle" src="files/images/nova.jpg" height="50dp" width="50dp" /> -->
                            </span>
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo $nama_lengkap; ?></strong>
                                 </span> <span class="text-muted text-xs block"><?php echo $alamat; ?> <b class="caret"></b></span> </span> </a>
                                <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                    <li><a href="profile.html">Profil</a></li>
                                    <li class="divider"></li>
                                    <li><a href="login.html">Keluar</a></li>
                                </ul>
                        </div>
                        <div class="logo-element">
                            BDM
                        </div>
                    </li>
                   
                    <li>
                      <a href="<?php echo Yii::$app->request->baseUrl; ?>/site/index">
                        <i class="fa fa-diamond"></i> <span class="nav-label">Beranda</span></a>
                    </li>

                    <li>
                      <a href="<?php echo Yii::$app->request->baseUrl; ?>/gor/index">
                        <i class="fa fa-building"></i> <span class="nav-label">Gor</span></a>
                    </li>

                    <li>
                      <a href="<?php echo Yii::$app->request->baseUrl; ?>/lapangan/index">
                        <i class="fa fa-building"></i> <span class="nav-label">Lapangan</span></a>
                    </li>

                    <li>
                      <a href="<?php echo Yii::$app->request->baseUrl; ?>/jadwal/index">
                        <i class="fa fa-clock-o"></i> <span class="nav-label">Jadwal</span></a>
                    </li>

                    <li>
                      <a href="<?php echo Yii::$app->request->baseUrl; ?>/pemesanan/index">
                        <i class="fa fa-book"></i> <span class="nav-label">Pemesanan</span></a>
                    </li>

                    <li>
                      <a href="<?php echo Yii::$app->request->baseUrl; ?>/topup/index">
                        <i class="fa fa-diamond"></i> <span class="nav-label">Top Up</span></a>
                    </li>

                     <li>
                      <a href="<?php echo Yii::$app->request->baseUrl; ?>/pengguna/index">
                        <i class="fa fa-hdd-o"></i> <span class="nav-label">Pengguna</span></a>
                    </li>

                    <li>
                      <a href="<?php echo Yii::$app->request->baseUrl; ?>/pengelola/index">
                        <i class="fa fa-list"></i> <span class="nav-label">Pengelola</span></a>
                    </li>

                    <li>
                      <a href="<?php echo Yii::$app->request->baseUrl; ?>/user/index">
                        <i class="fa fa-user"></i> <span class="nav-label">User</span></a>
                    </li>
                    
                </ul>

            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg dashbard-1">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li>
                            <span class="m-r-sm text-muted welcome-message">Sistem Reservasi Lapangan Badminton</span>
                        </li>
                        
                        <li>
                            <?php echo Html::a('Keluar', ['/site/logout'], ['data-method' => 'post', 'class' => 'fa fa-sign-out']) ?>
                        </li>
                    </ul>

                </nav>  
            </div>
                
            <div class="row  border-bottom white-bg dashboard-header">

                <?php echo $content; ?>

            </div>
            
            <div class="row">
                <footer class="footer">
                    <div class="pull-right">
                        10GB of <strong>250GB</strong> Free.
                    </div>
                    <div>
                        <strong>Copyright &copy; <?php echo date('Y') ?></strong>
                    </div>
                </footer>
            </div>

        </div>

</div>


    <script>
        $(document).ready(function() {
            setTimeout(function() {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 4000
                };
                toastr.success('Responsive Admin Theme', 'Welcome to INSPINIA');

            }, 1300);


            var data1 = [
                [0,4],[1,8],[2,5],[3,10],[4,4],[5,16],[6,5],[7,11],[8,6],[9,11],[10,30],[11,10],[12,13],[13,4],[14,3],[15,3],[16,6]
            ];
            var data2 = [
                [0,1],[1,0],[2,2],[3,0],[4,1],[5,3],[6,1],[7,5],[8,2],[9,3],[10,2],[11,1],[12,0],[13,2],[14,8],[15,0],[16,0]
            ];
            $("#flot-dashboard-chart").length && $.plot($("#flot-dashboard-chart"), [
                data1, data2
            ],
                    {
                        series: {
                            lines: {
                                show: false,
                                fill: true
                            },
                            splines: {
                                show: true,
                                tension: 0.4,
                                lineWidth: 1,
                                fill: 0.4
                            },
                            points: {
                                radius: 0,
                                show: true
                            },
                            shadowSize: 2
                        },
                        grid: {
                            hoverable: true,
                            clickable: true,
                            tickColor: "#d5d5d5",
                            borderWidth: 1,
                            color: '#d5d5d5'
                        },
                        colors: ["#1ab394", "#1C84C6"],
                        xaxis:{
                        },
                        yaxis: {
                            ticks: 4
                        },
                        tooltip: false
                    }
            );

            var doughnutData = {
                labels: ["App","Software","Laptop" ],
                datasets: [{
                    data: [300,50,100],
                    backgroundColor: ["#a3e1d4","#dedede","#9CC3DA"]
                }]
            } ;


            var doughnutOptions = {
                responsive: false,
                legend: {
                    display: false
                }
            };


            var ctx4 = document.getElementById("doughnutChart").getContext("2d");
            new Chart(ctx4, {type: 'doughnut', data: doughnutData, options:doughnutOptions});

            var doughnutData = {
                labels: ["App","Software","Laptop" ],
                datasets: [{
                    data: [70,27,85],
                    backgroundColor: ["#a3e1d4","#dedede","#9CC3DA"]
                }]
            } ;


            var doughnutOptions = {
                responsive: false,
                legend: {
                    display: false
                }
            };


            var ctx4 = document.getElementById("doughnutChart2").getContext("2d");
            new Chart(ctx4, {type: 'doughnut', data: doughnutData, options:doughnutOptions});

        });
    </script>
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','../../www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-4625583-2', 'webapplayers.com');
        ga('send', 'pageview');

    </script>

<!-- <footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer> -->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
