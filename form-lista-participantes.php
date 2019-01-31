<!doctype html>

<html lang="pt-br">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
    <meta charset="utf-8">
    <script src="bootstrap/jquery.js"></script>
    <title>Cadastro Sorteio</title>
</head>

    <body class="container">
    	<?php
            require_once("menu.php");
            require_once("class/ParticipanteDao.php");
            require_once("conecta.php");
    	?>
    	<div class="page-header container">
        	<h1>Participantes do Sorteio</h1>
        </div>
         <form class="navbar-form navbar-right" role="search">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Pesquisar">
          </div>
        <button type="submit" class="btn btn-default">
            <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
        </button>
        </form>
        <table class="table table-hover">
            <thead>
                <tr>
                    <td>Nome</td>
                    <td>Telefone</td>
                    <td>Email</td>
                    <td>Ações</td>
                </tr>
            </thead>
            <tbody>
                <?php
                    $participanteDao = new ParticipanteDao($conexao);
                    $participantes = $participanteDao->listaParticipante();
                    foreach($participantes as $participante) :
                ?>
                <tr>
                    <td><?= $participante->getNome() ?></td>
                    <td><?= $participante->getTelefone() ?></td>
                    <td><?= $participante->getEmail() ?></td>
                    <td>
                        <form action="remove-participante.php" method="post">
                            <input type="hidden" name="id" value="<?=$participante->getId()?>">
                            <button type="submit" class="btn btn-default">
                                <span class="glyphicon glyphicon-trash"></span>
                            </button>
                        </form>                            
                        <a href="form-altera-participante.php?id=<?=$participante->getId()?>">
                            <button type="button" class="btn btn-default">
                                <span class="glyphicon glyphicon-pencil"></span>
                            </button>
                        </a>
                    </td>
                </tr>
            </tbody>
            <?php 
                endforeach
            ?>
        </table>
        <nav aria-label="Navegação de página exemplo">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#">Anterior</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Próximo</a></li>
            </ul>
        </nav>
    </body>
</html>