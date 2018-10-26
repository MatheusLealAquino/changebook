<div class="container mt-4">
    <div class="row">
        <div class="col-md-6 mb-3">
            <h2>Dados Pessoais:</h2>

            <img src="<?= base_url() ?><?php echo $usuario['fotoPerfil'] ?>" class="rounded mx-auto d-block" width="180px" height="180px">

            <form action="<?= base_url() ?>index.php/Usuario/perfil/<?php echo $this->session->userdata('id') ?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">

                <div class="form-group">
                    <label for="fotoRegister">Foto</label>
                    <div class="input-group mb-3" id="fotoRegister">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" name="fotoPerfil" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                            <label class="custom-file-label" for="inputGroupFile01">Escolher foto</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="nameRegister">Nome</label>
                    <input type="text" name="name" class="form-control" id="nameRegister" aria-describedby="nameHelp" value="<?php echo $usuario['nome'] ?>">
                </div>
                <div class="form-group">
                    <label for="emailRegister">E-mail</label>
                    <input type="email" name="email" class="form-control" id="emailRegister" aria-describedby="emailHelp" value="<?php echo $usuario['email'] ?>">
                </div>
                <div class="form-group">
                    <label for="passwordRegister">Senha</label>
                    <input type="password" name="password" class="form-control" id="passwordRegister" placeholder="******">
                </div>
                <div class="form-group">
                    <label for="password2Register">Confirmar Senha</label>
                    <input type="password" name="password2" class="form-control" id="password2Register" placeholder="******">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Atualizar</button>
            </form>
        </div>
        <div class="col-md-6">
            <h2>Anúncios Criados:</h2>
            <div class="list-group">
                <?php 
                    foreach ($anuncios as $anuncio){
                        echo "<a href='".$anuncio['id']."' class='list-group-item list-group-item-action'>".$anuncio['livro']['nome']."</a>";
                    }
                ?>
            </div>
            <button type="button" class="btn btn-info mt-2 float-right">Ver todos anúncios</button>
        </div>
    </div>
</div>

<script>
$('.custom-file-input').on('change', function() { 
   let fileName = $(this).val().split('\\').pop(); 
   $(this).next('.custom-file-label').addClass("selected").html(fileName); 
});
</script>