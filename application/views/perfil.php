<div class="container mt-4">
    <div class="row">
        <div class="col-md-6 mb-3">
            <h2>Dados Pessoais:</h2>

            <img src="<?= base_url() ?>assets/images/book.png" class="rounded mx-auto d-block">

            <form action="<?= base_url() ?>index.php/Usuario/perfil" method="POST">
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
                    <input type="text" name="name" class="form-control" id="nameRegister" aria-describedby="nameHelp" placeholder="Harry Potter">
                </div>
                <div class="form-group">
                    <label for="emailRegister">E-mail</label>
                    <input type="email" name="email" class="form-control" id="emailRegister" aria-describedby="emailHelp" placeholder="harry@potter.com">
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
                <a href="#" class="list-group-item list-group-item-action">Cras justo odio</a>
                <a href="#" class="list-group-item list-group-item-action">Dapibus ac facilisis in</a>
                <a href="#" class="list-group-item list-group-item-action">Morbi leo risus</a>
                <a href="#" class="list-group-item list-group-item-action">Porta ac consectetur ac</a>
            </div>
            <button type="button" class="btn btn-info mt-2 float-right">Ver todos anúncios</button>
        </div>
    </div>
</div>