<?php
/**
 * Copyright (c) 2020 Wakers.cz
 * @author Jiří Zapletal (https://www.wakers.cz, zapletal@wakers.cz)
 */
declare(strict_types=1);
$content = file_get_contents(__DIR__ . '/../../html/temp/static/manifest.json');
$json = json_decode($content, TRUE);
?>
<!doctype html>
<html lang="en" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Powerful marketing abilities | Result oriented thinking | Advanced strategies | Friendly pricing | Webdesign, UX, PPC, CRO that boosts Your business.">
    <title>STRATEGIO digital - Get more customers, orders, leads or interests</title>

    <link rel="stylesheet" href="/temp/static/css/<?= $json['sys-frontend-build.css'] ?>">
</head>
<body>
<div class="container">
    <div>
        <div>
            <h1 class="title" style="">
                STRATEGIO<span style="font-size: 16px; font-weight: bold">.digital</span>
            </h1>

            <p class="sub-title">
                powerful marketing abilities
            </p>

            <p class="motto">
                Get more customers, online orders, leads or interests.
            </p>
        </div>

        <div class="contact">
            <a href="mailto:get@strategio.digital" target="_blank">get@strategio.digital</a>
            <a href="tel:+420606091125" target="_blank">+420 606 091 125</a>
        </div>
    </div>
</div>

<script src="/temp/static/js/<?= $json['sys-frontend-build.js'] ?>"></script>
</body>
</html>
