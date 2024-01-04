<?php
$dB_HOST = "aws.connect.psdb.cloud";
$dB_USERNAME = "re4g7k8h2pmh4xwftioo";
$dB_PASSWORD = "pscale_pw_Tw2Ow0Q8BCqDAlcLrr0AOY4NNdhJCCfKHMsQu9vTHqV";
$dB_NAME = "products";
$destination_path = getcwd() . DIRECTORY_SEPARATOR;

require 'vendor/autoload.php';

use Cloudinary\Configuration\Configuration;
use Cloudinary\Api\Upload\UploadApi;

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

$dsn = "mysql:host={$dB_HOST};dbname={$dB_NAME}";
$options = array(
  PDO::MYSQL_ATTR_SSL_CA => $destination_path . 'cacert.pem',
);

$conn = new PDO($dsn, $dB_USERNAME, $dB_PASSWORD, $options);
