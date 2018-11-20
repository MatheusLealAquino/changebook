<div class="container-fluid body-wrapper form-cadastro">
    <div class="row">
        <div class="col-md-10 mx-auto mb-3">
            <h2>Editar Anúncio</h2>
            
            <form action="<?= base_url() ?>index.php/Anuncio/edit/<?php echo $anuncio['idAnuncio'] ?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                <input type="hidden" name="urlCapa" value="<?php echo $anuncio['urlCapa']?>" />

                <div class="form-group">
                    <?php 
                        $foto = !empty($anuncio['urlCapa']) ? $anuncio['urlCapa'] : 'assets/images/book.png';
                        echo '<div class="col-md-2 mx-auto">
                            <img src="'.base_url().$foto.'" width="200" height="210"><br>
                        </div>';
                    ?>
                </div>
                <div class="form-group">
                    <label for="livroRegister">Livro</label>                      
                    <select class="form-control" name="livro" id="livroRegister" required>
                        <option disabled>Selecione um livro</option>
                        <?php 
                            foreach ($livros as $livro) {
                                if($livro['id'] == $anuncio['idLivro']){
                                    echo '<option value="'.$livro['id'].' selected">'.$livro['nome'].'</option>';
                                }else{
                                    echo '<option value="'.$livro['id'].'">'.$livro['nome'].'</option>';
                                }
                            }
                        ?>
                    </select>
                    <a href="#"><small>Livro não encontrado? Cadastre aqui</small></a>
                </div>
                <div class="form-group">
                    <label for="fotoRegister">Foto anúncio</label>
                    <div class="input-group mb-3" id="fotoRegister">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" name="fotoAnuncio" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                            <label class="custom-file-label" for="inputGroupFile01">Escolher foto</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="tituloRegister">Título</label>
                    <input type="text" name="titulo" class="form-control" id="tituloRegister" aria-describedby="tituloHelp" placeholder="Harry Potter" value="<?php echo $anuncio['titulo']?>" required>
                </div>
                <div class="form-group">
                    <label for="precoRegister">Preço</label>
                    <input type="number" name="preco" step="0.01" class="form-control" id="precoRegister" aria-describedby="precoHelp" placeholder="5,90" value="<?php echo $anuncio['preco']?>" required>
                </div>
                <div class="form-group">
                    <label for="localizaçãoRegister">Localização</label>                      
                    <select class="form-control" id="localizaçãoRegister" name="localizacao" required>
                        <option disabled>Selecione uma localização</option>
                        <?php 
                            foreach ($localizacoes as $localizacao) {
                                if($localizacao['id'] == $anuncio['idLocalizacao']){
                                    echo '<option value="'.$localizacao['id'].' selected">'.$localizacao['cidade'].' - '.$localizacao['estado'].'</option>';
                                }else{
                                    echo '<option value="'.$localizacao['id'].'">'.$localizacao['cidade'].' - '.$localizacao['estado'].'</option>';
                                }
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group ">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="true" name="status" <?php echo "checked" ?> >
                        <label class="form-check-label" for="defaultCheck1">
                            Status
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Atualizar</button>
            </form>
        </div>
    </div>
</div>

<script>
    $('.custom-file-input').on('change', function() { 
    let fileName = $(this).val().split('\\').pop(); 
    $(this).next('.custom-file-label').addClass("selected").html(fileName); 
    });
</script>