<?php

use yii\helpers\Html;

/** @var yii\web\View $this */

$this->title = 'Novelas Visuales';
?>

<?php if (!empty($backgroundImage)): ?>
    <style>
        body {
            background-image: url('<?= $backgroundImage ?>');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        .site-index {
            background-color: rgba(255, 255, 255, 0.85);
            padding: 20px;
            border-radius: 10px;
        }
    </style>
<?php endif; ?>

<div class="site-index">

    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <h1 class="display-4">BBD de Novelas Visuales</h1>

        <p class="lead">Aquí encontraras una colección de varios datos de diversas novelas visuales.</p>

        <?php if (Yii::$app->user->isGuest): ?>
            <p>
                <a class="btn btn-lg btn-success" href="<?= \yii\helpers\Url::to(['/site/login']) ?>">
                    Regístrate para acceder a más opciones
                </a>
            </p>
        <?php endif; ?>

    </div>

    <div class="body-content">

        <div class="row">
            <?php if (!empty($novelas)) : ?>
                <div id="carouselExampleCaptions" class="carousel slide mb-5" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <?php foreach ($novelas as $index => $novela): ?>
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?= $index ?>"
                                class="<?= $index === 0 ? 'active' : '' ?>"
                                aria-current="<?= $index === 0 ? 'true' : 'false' ?>"
                                aria-label="Slide <?= $index + 1 ?>"></button>
                        <?php endforeach; ?>
                    </div>
                    <div class="carousel-inner">
                        <?php foreach ($novelas as $index => $novela): ?>
                            <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                                <img src="<?= !empty($novela->portada) ? Yii::getAlias('@web/portadas/' . $novela->portada) : Yii::getAlias('@web/portadas/default-portada.png') ?>"
                                    class="d-block w-100  img-fluid"
                                    alt="<?= \yii\helpers\Html::encode($novela->nombre) ?>"
                                    style="max-height: 400px; object-fit: cover;">
                                <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded">
                                    <h5><?= \yii\helpers\Html::encode($novela->nombre) ?></h5>
                                    <p><?= \yii\helpers\Html::encode($novela['descripción']) ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Anterior</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Siguiente</span>
                    </button>
                </div>
            <?php else: ?>
                <p>No hay novelas visuales disponibles.</p>
            <?php endif; ?>
        </div>

        <div>
            <h2 class="mb-4">Estudios</h2>

            <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php foreach ($estudios as $estudio): ?>
                    <div class="col">
                        <div class="card h-100">
                            <img src="<?= !empty($estudio->portada) ? Yii::getAlias('@web/portadas/' . $estudio->portada) : Yii::getAlias('@web/portadas/default-portada.png') ?>">
                            <div class="card-body">
                                <h4 class="card-title"><?= Html::encode($estudio->nombre) ?></h4>
                                <h6 class="card-title">País: <?= Html::encode($estudio->país) ?></h6>
                                <h6 class="card-title">Fecha de fundación: <?= Html::encode($estudio->fundación) ?></h6>
                                <p class="card-text"><?= Html::encode($estudio->descripcion) ?></p>
                                <a href="<?= \yii\helpers\Url::to(['estudio/view', 'idestudio' => $estudio->idestudio]) ?>" class="btn btn-primary">
                                    Ver más
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

    </div>
</div>