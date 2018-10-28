<div class="container-fluid body-wrapper">
    <div class="row mb-5">
        <div class="col-md-5 mx-auto mt-3">
            <form class="mx-auto" method="GET" action="<?= base_url() ?>index.php/Anuncio/search">
                <input class="form-control mr-sm-2" name="s" type="search" placeholder="Buscar livros..." aria-label="Search"
                value="<?php echo isset($_GET['s']) ? $_GET['s'] : "" ?>">
            </form>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <?php 
                foreach ($anuncios as $anuncio){
                    $foto = !empty($anuncio['urlCapa']) ? $anuncio['urlCapa'] : 'assets/images/book.png';
                    echo '<div class="col-md-2 text-center book-card">
                            <img src="'.base_url().$foto.'" width="100" height="110"><br>
                            <a href="'.base_url().'Anuncio/'.$anuncio['idAnuncio'].'">'.$anuncio['titulo'].'</a>
                        </div>';
                }
            ?>
        </div>
    </div>
</div>