<div class="container-fluid form-cadastro">
    <div class="row">
        <div class="col-md-10 mx-auto mb-3 mt-3">
            <h2> Editar Livro </h2>

            <form action="<?= base_url() ?>index.php/Livro/edit/<?php echo $livro['id']; ?>" method="POST">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                
                <div class="form-group">
                    <label for="nomeRegister">Nome</label>                      
                    <input type="text" name="nome" class="form-control" id="nomeRegister" aria-describedby="nomeHelp" placeholder="Harry Potter" value="<?php echo $livro['nome']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="sinopseRegister">Sinopse</label>
                    <textarea type="text" name="sinopse" class="form-control" id="sinopseRegister" aria-describedby="sinopseHelp" placeholder="Livro conta sobre Harry Potter ..." required><?php echo $livro['sinopse']; ?></textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Editar</button>
            </form>
        </div>
    </div>
</div>