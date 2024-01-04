<?php
$dB_HOST = "";
$dB_USERNAME = "";
$dB_PASSWORD = "";
$dB_NAME = "";
$destination_path = getcwd() . DIRECTORY_SEPARATOR;

require 'vendor/autoload.php';

use Cloudinary\Configuration\Configuration;
use Cloudinary\Api\Upload\UploadApi;

Configuration::instance([
  'cloud' => [
    'cloud_name' => '',
    'api_key' => '',
    'api_secret' => ''
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
