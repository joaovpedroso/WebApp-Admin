<?php
use App\Helpers\Util;
use App\Helpers\Session;

Session::verificaSessao();
$tituloPagina = Util::headerTitle($this->tituloPagina);
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title><?= $tituloPagina ;?></title>
        
        <link rel="stylesheet" href="<?php echo Util::asset( 'assets/bower_components/bootstrap/dist/css/bootstrap.min.css' );?>">
        <link rel="stylesheet" href="<?php echo Util::asset('assets/bower_components/font-awesome/css/font-awesome.min.css');?>">
        <link rel="stylesheet" href="<?php echo Util::asset('assets/bower_components/Ionicons/css/ionicons.min.css');?>">
        <link rel="stylesheet" href="<?php echo Util::asset('assets/dist/css/AdminLTE.min.css');?>">
        <link rel="stylesheet" href="<?php echo Util::asset('assets/dist/css/skins/_all-skins.min.css');?>">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <script src="<?php echo Util::asset('assets/js/jquery.min.js') ?>"></script>
        
    </head>
    <body class="hold-transition skin-black-light sidebar-mini">
        <?php $this->layout('layout.nav'); ?>
        <div class="content-wrapper">
           