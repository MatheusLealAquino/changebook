<div class="container">
    <div class="row">
        <div class="col-md-10 mx-auto mt-3">
            <h2>Realizar Emprestimo</h2>
            <form action="<?= base_url() ?>index.php/Emprestimo/create" method="POST">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                <input type="hidden" name="idUsuarioDono" value="<?php echo $anuncio[0]['idUsuario']; ?>"/>
                <input type="hidden" name="idAnuncio" value="<?php echo $anuncio[0]['idAnuncio']; ?>"/>
                <input type="hidden" name="valor" value="<?php echo $anuncio[0]['preco']; ?>"/>

                <table class="table table-dark">
                    <thead>
                        <tr>
                        <th scope="col">Dono do Livro</th>
                        <th scope="col">Recebendo Emprestimo</th>
                        <th scope="col">Livro Emprestado</th>
                        <th scope="col">Valor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row"><?php echo $anuncio[0]['nomeUsuario']; ?></th>
                            <td><?php echo $this->session->userdata('nome'); ?></td>
                            <td><?php echo $anuncio[0]['titulo']; ?></td>
                            <td>R$ <?php echo number_format($anuncio[0]['preco'], 2, ',', '.'); ?></td>
                        </tr>
                    </tbody>
                </table>
                <button type="submit" class="btn btn-success float-right">Realizar Emprestimo</button>
            </form>
        </div>
    </div>
</div>