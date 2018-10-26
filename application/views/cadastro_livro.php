<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 mx-auto mb-3 mt-3">
            <form action="<?= base_url() ?>index.php/Anuncio/create" method="POST">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                <div class="form-group">
                    <label for="livroRegister">Livro</label>                      
                    <select class="form-control" name="livro" id="livroRegister" required>
                        <option disabled selected>Selecione um livro</option>
                        <?php 
                            foreach ($livros as $livro) {
                                echo '<option value="'.$livro['id'].'">'.$livro['nome'].'</option>';
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
                    <input type="text" name="titulo" class="form-control" id="tituloRegister" aria-describedby="tituloHelp" placeholder="Harry Potter" required>
                </div>
                <div class="form-group">
                    <label for="precoRegister">Preço</label>
                    <input type="number" name="preco" step="0.01" class="form-control" id="precoRegister" aria-describedby="precoHelp" placeholder="5,90" required>
                </div>
                <div class="form-group">
                    <label for="localizaçãoRegister">Localização</label>                      
                    <select class="form-control" id="localizaçãoRegister" name="localizacao" required>
                        <option disabled selected>Selecione uma localização</option>
                        <?php 
                            foreach ($localizacoes as $localizacao) {
                                echo '<option value="'.$localizacao['id'].'">'.$localizacao['cidade'].' - '.$localizacao['estado'].'</option>';
                            }
                        ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Cadastrar</button>
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