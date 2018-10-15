<div class="body-wrapper">
  <div class="container">
    <div class="row align-middle">
      <div class="col-md-4 offset-md-1 text-center">
        <img src="<?= base_url() ?>assets/images/book.png" alt="" class="img-fluid">
        <h2 class="text-light text-center font-weight-bold">Changebook</h2>
        <p class="text-light text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos voluptatibus ipsa nulla eaque, a maiores sint fugiat sapiente perspiciatis reprehenderit, esse vel blanditiis voluptatem eveniet ab voluptate enim rem exercitationem.</p>
      </div>
      <div class="col-md-4 offset-md-2 bg-light">
        <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="login-tab" data-toggle="tab" href="#login" role="tab" aria-controls="login" aria-selected="true">Entrar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="false">Cadastrar</a>
          </li>
        </ul>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="home-tab">
            <form action="#">
              <div class="form-group">
                <label for="emailLogin">E-mail</label>
                <input type="email" class="form-control" id="emailLogin" aria-describedby="emailHelp" placeholder="harry@potter.com">
              </div>
              <div class="form-group">
                <label for="passwordLogin">Senha</label>
                <input type="password" class="form-control" id="passwordLogin" placeholder="******">
              </div>
              <button type="submit" class="btn btn-primary btn-block">Entrar</button>
              <p class="text-center"><a href="#">Esqueci a senha</a></p>
            </form>
          </div>
          <div class="tab-pane fade pb-4" id="register" role="tabpanel" aria-labelledby="home-tab">
            <form action="#">
              <div class="form-group">
                <label for="nameRegister">Nome</label>
                <input type="text" class="form-control" id="nameRegister" aria-describedby="nameHelp" placeholder="Harry Potter">
              </div>
              <div class="form-group">
                <label for="emailRegister">E-mail</label>
                <input type="email" class="form-control" id="emailRegister" aria-describedby="emailHelp" placeholder="harry@potter.com">
              </div>
              <div class="form-group">
                <label for="passwordRegister">Senha</label>
                <input type="password" class="form-control" id="passwordRegister" placeholder="******">
              </div>
              <div class="form-group">
                <label for="password2Register">Confirmar Senha</label>
                <input type="password" class="form-control" id="password2Register" placeholder="******">
              </div>
              <button type="submit" class="btn btn-primary btn-block">Cadastrar</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>