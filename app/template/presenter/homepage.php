<?php
/**
 * Copyright (c) 2020 Wakers.cz
 * @author Jiří Zapletal (https://www.wakers.cz, zapletal@wakers.cz)
 */
declare(strict_types=1);
$content = file_get_contents(__DIR__ . '/../../../html/temp/static/manifest.json');
$json = json_decode($content, TRUE);
?>
<!doctype html>
<html lang="en" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Stavíme ziskové weby a marketing, jsme Strategio Digital</title>
    <meta name="description" content="Postavte se k webu tak, aby Vám už první den po spuštění přiváděl zákazníky a vydělával reálné peníze.">
    <link rel="stylesheet" href="/temp/static/css/<?= $json['sys-frontend-build.css'] ?>">
</head>
<body class="">
<div class="container">
    <div class="logo">
        <div class="title">Strategio</div>
        <div class="sub-title">.digital</div>
    </div>
</div>

<div class="d-flex w-100 h-100 justify-content-center align-items-center bg-gradient-blue">
    <img src="/temp/static/img/strategio-shark-right.svg" alt="Stavíme ziskové weby a marketing" style="height: 100%; max-width: 100%; padding: 3rem; position: absolute; right: 0; top: 0; pointer-events: none">
    <div class="container position-relative text-white">
        <h1 class="display-3 font-weight-bolder mb-0 mt-5">
            <span class="d-block h1 font-weight-bold" style="margin-bottom: -.5rem">Ziskové</span> weby a marketing
        </h1>
        <p class="h3 mt-4">
            Postavte se k webu tak, aby Vám už první den po
            <br class="d-none d-md-block">spuštění přiváděl zákazníky a <strong>vydělával reálné peníze</strong>.
        </p>
        <div class="d-inline-flex mt-4 mr-3">
            <button class="btn btn-primary" disabled>
                Domluvit si konzultaci
            </button>
        </div>
        <div class="d-none d-md-inline-flex mt-4" data-toggle="tooltip" data-placement="top" data-title="Domluvte si konzultaci ZDARMA.">
            <button class="btn btn-outline-light" disabled style="pointer-events: none">
                Dozvědět se více
            </button>
        </div>
    </div>
</div>

<script src="/temp/static/js/<?= $json['sys-frontend-build.js'] ?>"></script>

<?php require_once __DIR__ . '/../component/contact-modal.php' ?>
</body>
</html>