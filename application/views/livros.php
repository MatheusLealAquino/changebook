<div class="container mt-3">
    <div class="row">
        <?php 
            foreach ($livros as $livro){
                echo '<div class="col-md-2 text-center book-card">
                        <a href="'.base_url().'index.php/Livro/edit/'.$livro['id'].'">'.$livro['nome'].'</a>
                    </div>';
            }
        ?>
    </div>
</div>