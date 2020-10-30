<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
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

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Sistem Informasi Klinik',
//        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
            //ada menu ambil antrian dan cek antrian?
            Yii::$app->user->isGuest ? (
                ['label' => 'Antrian', 'url' => ['/antrian']]
            ) : (''),
            
            //pasien
            //antrian spesifik user (?), highlight
            Yii::$app->user->getIdentity() ? (
                Yii::$app->user->identity->role == 'Pasien' ? (
                    ['label' => 'Antrian Anda', 'url' => ['/antrian']]
                ) : ('')
            ) : (''),
            //upload bukti pembayaran?
            Yii::$app->user->getIdentity() ? (
                Yii::$app->user->identity->role == 'Pasien' ? (
                    ['label' => 'Tagihan', 'url' => ['/tagihan']]
                ) : ('')
            ) : (''),

            // Pegawai
            Yii::$app->user->getIdentity() ? (
                Yii::$app->user->identity->role == 'Pegawai' ? (
                    ['label' => 'Lihat Antrian', 'url' => ['/antrian']]
                ) : ('')
            ) : (''),
            Yii::$app->user->getIdentity() ? (
                Yii::$app->user->identity->role == 'Pegawai' ? (
                    ['label' => 'Pemberian Tindakan', 'url' => ['/tindakan']]
                ) : ('')
            ) : (''),
            Yii::$app->user->getIdentity() ? (
                Yii::$app->user->identity->role == 'Pegawai' ? (
                    ['label' => 'Laporan', 'url' => ['laporan']]
                ) : ('')
            ) : (''),

            //admin
            Yii::$app->user->getIdentity() ? (
                Yii::$app->user->identity->role == 'Admin' ? (
                    ['label' => 'Antrian-CRUD', 'url' => ['/antrian']]
                ) : ('')
            ) : (''),
            Yii::$app->user->getIdentity() ? (
                Yii::$app->user->identity->role == 'Admin' ? (
                    ['label' => 'Obat-CRUD', 'url' => ['/obat']]
                ) : ('')
            ) : (''),
            Yii::$app->user->getIdentity() ? (
                Yii::$app->user->identity->role == 'Admin' ? (
                    ['label' => 'Pegawai-CRUD', 'url' => ['/pegawai']]
                ) : ('')
            ) : (''),
            Yii::$app->user->getIdentity() ? (
                Yii::$app->user->identity->role == 'Admin' ? (
                    ['label' => 'Tindakan-CRUD', 'url' => ['/tindakan']]
                ) : ('')
            ) : (''),
            Yii::$app->user->getIdentity() ? (
                Yii::$app->user->identity->role == 'Admin' ? (
                    ['label' => 'User-CRUD', 'url' => ['/user']]
                ) : ('')
            ) : (''),
            Yii::$app->user->getIdentity() ? (
                Yii::$app->user->identity->role == 'Admin' ? (
                    ['label' => 'Wilayah-CRUD', 'url' => ['/wilayah']]
                ) : ('')
            ) : (''),

            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            ),

        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Ashr Hafiizh Tantri <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
