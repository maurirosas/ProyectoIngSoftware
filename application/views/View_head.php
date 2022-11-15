<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>

<head>
    
  <link rel="stylesheet" href="<?php echo base_url();?>/css/bootstrap.min.css">
  <script src="<?php echo base_url();?>/js/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>

<nav class="navbar navbar-expand-sm bg-light">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="<?php echo site_url("Ctrl_bienvenida/index");?>">Inicio</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo site_url("Ctrl_despedida/index");?>">Despedida</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Link 3</a>
    </li>
  </ul>
</nav>