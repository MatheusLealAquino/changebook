<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $title?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="<?= base_url() ?>assets/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/style.css" />
    <script src="<?= base_url() ?>assets/bootstrap/js/jquery-3.3.1.min.js"></script>
    <script src="<?= base_url() ?>assets/bootstrap/js/popper.min.js"></script>
    <script src="<?= base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
    <?php 
        if($this->session->userdata('logged_in') == 'true'){
            echo '<nav class="navbar navbar-expand-lg navbar-light bg-light">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
            
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="'.base_url().'index.php/Home/">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="'.base_url().'index.php/Anuncio/Create">Cadastrar Anúncio</span></a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="'.base_url().'index.php/Usuario/perfil/'.$this->session->userdata('id').'">Perfil</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="'.base_url().'index.php/Auth/Logout">Logout</span></a>
                    </li>
                </ul>
                </div>
            </nav>';
        }
    ?>

    <div class="container">
        <?php 
            if(!empty($erro)){
                echo '<div class="alert alert-danger mt-3" role="alert">
                    '.$erro.'
                </div>';
            }

            if(!empty($success)){
                echo '<div class="alert alert-success mt-3" role="alert">
                    '.$success.'
                </div>';
            }
        ?>
    </div>
