<div class="container-fluid body-wrapper">
    <div class="row mb-3">
        <div class="col-md-5 text-center mb-2">
            <?php 
                $urlFoto = empty($anuncio[0]['urlCapa']) ? "assets/images/book.png" : $anuncio[0]['urlCapa'];
                echo "<img src='".base_url().$urlFoto."' class='img-fluid' width='45%'>";
            ?>
        </div>
        <div class="col-md-6 detalhe-anuncio">
            <h2><?php echo $anuncio[0]['titulo']?></h2>
            <ul class="list-group mb-2">
                <li class="list-group-item">Preço: R$ <?php echo str_replace(".",",",$anuncio[0]['preco']); ?></li>
                <li class="list-group-item">Localização: <?php echo $anuncio[0]['cidade']." - ".$anuncio[0]['estado']?></li>
                <li class="list-group-item">Criado por: <?php echo $anuncio[0]['nomeUsuario']; ?></li>
                <li class="list-group-item">Data da Criação do Anúncio: <?php $date = date_create($anuncio[0]['dataCriacao']); echo date_format($date,'d/m/Y'); ?></li>
                <li class="list-group-item">
                    <?php 
                        if($this->session->userdata('email') == $anuncio[0]['email']){
                            echo '<a href="'.base_url().'index.php/Anuncio/edit/'.$anuncio[0]['idAnuncio'].'"><button type="button" class="btn btn-primary btn-block">Editar</button></a>';
                        }else{
                            echo '<a href="'.base_url().'index.php/Emprestimo/create/'.$anuncio[0]['idAnuncio'].'"><button type="button" class="btn btn-primary btn-block">Alugar</button></a>';
                        }
                    ?>
                </li>
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <h1 class="display-4">Sinopse:</h1>
                    <p class="lead"><?php echo $anuncio[0]['sinopse']; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>