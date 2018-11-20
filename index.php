<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
	      <link rel="shortcut icon" href="static/img/logo-hum.png" type="image/png" />
        <title>Dizaí | Conta para gente sua trajetória</title>

        <link href="static/css/bootstrap.min.css" rel="stylesheet">

        <link href="static/css/all.min.css" rel="stylesheet">
        <link href="static/css/fontawesome.min.css" rel="stylesheet">
        <link href="static/css/main.css" rel="stylesheet">

    </head>
    <body>
        <nav class="navbar navbar-expand-sm bg-light" style="background-image: linear-gradient(120deg, #f6d365 0%, #fda085 100%);">
            <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="navbar-brand" href="https://expotecsc.com.br/#/">
                    <img src="static/img/expotec-logo.png" alt="Logo" style="width:60px;">
                  </a>
                </li>
              </ul>
              <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                  <button class="btn btn-outline-light" data-toggle="modal" data-target="#modal-mensagem">Nova mensagem</button>
                </li>
              </ul>
        </nav>

        <!-- Área de marketing da página-->
        <div class="jumbotron" style="background-color: #F5F5F5">
          <h1 class="display-4">Olá, IFanos</h1>
          <p class="lead">Já pararam pra pensar como o IF mudou suas vidas?</p>
          <hr class="my-4">
          <p>São tantas histórias, momentos e sentimentos envolvidos. Alguns bons e infelizmente, outros nem tanto.
Pensando nisso, o "Diz aí" foi idealizado, diga-nos o que sentem, conte-nos quais foram e são suas dificuldades, medos, receios, quais seus sonhos e desejos!
Seu comentário pode-nos ajudar a discutir e entender melhor todo esse mundo novo que é o IF!
Sinta-se a vontade, aqui você não estará sozinho!</p>
        </div>
        <!-- Fim da área de marketing -->
        <h4 class="text-center font-weight-light">O que já falaram para nós...</h4><br>
        <div class="card-columns" id="dados">

        </div>
        <h3 class="text-center text-info" id="fimConteudo"></h3>
        <!-- Modal para cadastro de nova mensagem-->
        <div class="modal fade" id="modal-mensagem">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Olá IFano</h4>
                 <button id="fechar" type="button" class="close" data-dismiss="modal"><span>×</span></button>

               </div>
              <div class="modal-body">
                <form id="newMessage" action="" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="issuer">Qual o seu nome?</label>
                    <input type="text" class="form-control" name="pIssuer" id="issuer" autofocus>
                  </div>
                  <div class="form-group">
                    <label for="campi">Qual o seu campus?</label>
                    <select class="form-control" id="campi" name="pCampi">
                      <?php
                        require_once './classes/Campi.php';
                        $data = Campi::getAllCampi();

                        foreach($data as $campi){
                      ?>
                      <option value="<?=$campi->getIdCampi(); ?>"><?=$campi->getNameCampi();?></option>
                    <?php }?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="msg">Deixe sua mensagem</label>
                    <textarea class="form-control" rows="3" name="pMessage" id="msg" required></textarea>
                  </div>
                  <label id="icone" class="btn btn-outline-light btn-file">
                    <input type="file" style="display: none;" id="uploadedImage" name="postImage">
                    <img src="static/img/icon-camera.png">
                  </label>
                  <img id="uploadedPreview" width="100px">
                </form>
               </div>
              <div class="modal-footer">
                <p id="resposta"></p>
                <button type="submit" form="newMessage" class="btn btn-outline-success">Publicar</button>
                <button id="cancelar" type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
              </div>
            </div>
          </div>
      </div>
      <!-- Fim do modal -->
        <script src="static/js/jquery-3.3.1.min.js"></script>
        <script src="static/js/bootstrap.min.js"></script>
        <script src="static/js/main.js"></script>
    </body>
</html>
