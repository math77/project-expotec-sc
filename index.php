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
	      <link rel="shortcut icon" href="static/img/expotec3.png" type="image/png" />
        <title>Semana de humanidades</title>

        <link href="static/css/bootstrap.min.css" rel="stylesheet">
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
        <div class="jumbotron">
          <h1 class="display-4">Olá, IFanos</h1>
          <p class="lead">Qual foi o MAIOR desafio que você teve que enfrentar para permanecer no IFRN?</p>
          <hr class="my-4">
          <p>Estamos fazendo uma pesquisa com a galera do IF- Santa Cruz (se for aberto à outros campus é só mudar para "galera dos IFs") para saber
            quais foram/são os principais problemas dos IFianos (pode  mudar para  IFanos) em suas jornadas federais.</p>
            <!--
          <p class="lead">
            <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
          </p>
        -->
        </div>
        <!-- Fim da área de marketing -->
        <h4 class="text-center">Veja as mensagens que já enviaram</h4>
        <div class="card-columns" id="dados">

        </div>
        <!-- Modal para cadastro de nova mensagem-->
        <div class="modal fade" id="modal-mensagem">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Olá</h4>
                 <button type="button" class="close" data-dismiss="modal"><span>×</span></button>

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
                  <button type="submit" class="btn btn-outline-success">Publicar</button>
                  <label class="btn btn-primary btn-file">
                    Escolha <input type="file" style="display: none;" id="uploadedImage" name="postImage">
                  </label
                </form>
               </div>
              <div class="modal-footer">
                <p id="resposta"></p>
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
              </div>
            </div>
          </div>
      </div>
      <!-- Fim do modal -->


        <p id="opa"></p>
        <script src="static/js/jquery-3.3.1.min.js"></script>
        <script src="static/js/bootstrap.min.js"></script>
        <script src="static/js/main.js"></script>
    </body>
</html>
