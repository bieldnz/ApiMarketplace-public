<?php
//Variáveis onde eu insiro os dados para conexão com banco de dados.>---------------
$dB_HOST = "";
$dB_USERNAME = "";
$dB_PASSWORD = "";
$dB_NAME = "";
$destination_path = getcwd() . DIRECTORY_SEPARATOR;
//---------------------------------------------------------<

//Cria um objeto, que é o $cloudinary, para manipular as imagens do meu projeto >-------------
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
//------------------------------------------------------------------------------------------------<

//Realizo a conexão com o banco de dados >--------------------------------------
$dsn = "mysql:host={$dB_HOST};dbname={$dB_NAME}";
$options = array(
  PDO::MYSQL_ATTR_SSL_CA => $destination_path . 'cacert.pem',
);

$conn = new PDO($dsn, $dB_USERNAME, $dB_PASSWORD, $options);
//-----------------------------------------------------------------------------<
