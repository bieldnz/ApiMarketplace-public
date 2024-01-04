<?php

header("Access-Control-Allow-Origin:* ");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");

require 'cloudinary/vendor/autoload.php';

use Cloudinary\Configuration\Configuration;
use Cloudinary\Api\Upload\UploadApi;

$img = $_FILES["img"]["tmp_name"];

Configuration::instance([
    'cloud' => [
        'cloud_name' => 'djqgjria4',
        'api_key' => '161166221218273',
        'api_secret' => 'VCAOx8qXAHi49Vubu2SiCNtslow'
    ],
    'url' => [
        'secure' => true
    ]
]);


$cloudinary = new UploadApi();
$cloudinary->upload($img);
