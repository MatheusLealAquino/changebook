<div class="container-fluid body-wrapper">
    <div class="row mb-5">
        <div class="col-md-5 mx-auto mt-3">
            <form class="mx-auto" method="GET" action="<?= base_url() ?>index.php/Anuncio/search">
                <input class="form-control mr-sm-2" name="s" type="search" placeholder="Buscar livros..." aria-label="Search">
            </form>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <?php 
                foreach ($anuncios as $anuncio){
                    echo '<div class="col-md-2 text-center book-card">
                            <img src="<?= base_url() ?>'.$anuncio['urlCapa'].'" width="100" height="110"><br>
                                '.$anuncio['livro']['nome'].'
                        </div>';
                }
            ?>
        </div>
    </div>
</div>