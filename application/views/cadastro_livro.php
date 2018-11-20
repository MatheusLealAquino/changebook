<div class="container-fluid form-cadastro">
    <div class="row">
        <div class="col-md-10 mx-auto mb-3 mt-3">
            <h2> Cadastrar Livro </h2>

            <form action="<?= base_url() ?>index.php/Livro/create" method="POST">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                
                <div class="form-group">
                    <label for="nomeRegister">Nome</label>                      
                    <input type="text" name="nome" class="form-control" id="nomeRegister" aria-describedby="nomeHelp" placeholder="Harry Potter" required>
                </div>
                <div class="form-group">
                    <label for="sinopseRegister">Sinopse</label>
                    <textarea type="text" name="sinopse" class="form-control" id="sinopseRegister" aria-describedby="sinopseHelp" placeholder="Livro conta sobre Harry Potter ..." required></textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Cadastrar</button>
            </form>
        </div>
    </div>
</div>