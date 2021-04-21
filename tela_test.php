<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Form de Registro com validações em JS</title>
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" type="text/css" href="cadastro_folha_estilo.css"/>


  <style>
    td.list, th.list{
    border:1px solid gray;  
    border-collapse: collapse;
    }
    td.action{
    width: 2px;  
    }

    </style>


</head>
<body>

  <ul class="topnav">
    <li style="float: left; margin: 8px 0 0 4%; width: 150px;">
      <img src="imagens\logo.png" width="100%" >
    </li>
    <li>
      <a href="#Sobre">
        <p style="width: 150px;"><b style="margin: 0 60px 0 0;" >Sobre </b></p>
      </a>
    </li>
    <li>
      <a href="#Contato">
        <p style="margin: 0;"><b>Contato</b></p>
      </a>
    </li>
    <li>
      <a href="#Galeria">
        <p><b>Galeria</b></p>
      </a>
    </li>
    <li>
      <a class="actives" href="#inicio">
        <p><b>Início</b></p>
      </a>
    </li>
    <li style="margin-top:11px;">
      <a style="width: 30px; margin:0 55px 0 5px;" href="pesquisar">
        <img src="imagens\lupa2.png" width="100%" >
      </a>
    </li>
    <li>
      <a style="width: 200px; margin: -2px 0 0 0;">
        <input style="height: 20px; width: 100%;" id="pesquisar" placeholder="pesquisar" type="text" id="nome"/>
      </a>
    </li>
    <div class="menu">
      <a href="menu"><img src="imagens\lupa.png"></a>
    </div>
  </ul>
<form id="f1" action="crud2.php" method="post" name="f1">
        <?php
            include('conexao_banco.php');

            if($_GET['ID'] != '' && $_GET['MODE'] == 'update'){
                $id = $_GET['ID'];
                $sql = "SELECT * FROM vagas WHERE ID=$id";

                $result = $conn->query($sql);

                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        $id                 = $row["ID"];
                        $descricao          = $row["Descricao"];
                        $preco              = $row["Preco"];
                        $num_espacos        = $row["Num_Espacos"];
                        $foto_principal     = $row["Foto_Principal"];
                        $rua                = $row["Rua"];
                        $numero             = $row["Numero"];
                        $complemento        = $row["Complemento"];
                        $estado             = $row["Estado"];
                        $cidade             = $row["Cidade"];
                        $email              = $row["Email"];
                        $bairro             = $row["Bairro"];
                    }
                }

                echo "  <div id='main-container'>
                        <form id='register-form'action=''>
                            <h1>Cadastre-se para acessar o sistema</h1>
                            <div class='full-box'>
                                <label for='email'>E-mail:</label>
                                <input type='email' name='email' id='email' value='$email' data-min-length='2' data-email-validate>
                            </div>
                            <div class='full-box'>
                                <label for='descricao'>Descrição:</label>
                                <input type='text' name='descricao' id='descricao' value='$descricao' data-required>
                            </div>
                            <div class='half-box spacing'>
                                <label for='preco'>Preço:</label>
                                <input type='text' name='preco' id='preco' value='$preco' data-required data-only-numbers>
                            </div>
                            <div class='half-box'>
                                <label for='nvagas'>Número de Vagas:</label>
                                <input type='text' name='nvagas' id='nvagas' value='$num_espacos' data-required data-only-numbers data-max-length='2'>
                            </div>
                            <div class='half-box spacin'>
                                <label for='rua' Rua:</label>
                                <input type='text' name='rua' id='rua' value='$rua' data-required data-only-letters>
                            </div>
                            <div class='half-box'>
                                <label for='numero'>Número:</label>
                                <input type='text' name='numero' id='numero' value='$numero' data-required data-only-numbers data-max-length='5'>
                            </div>
                            <div class='half-box spacing'>
                                <label for='complemento'>Complemento:</label>
                                <input type='text' name='complemento' id='complemento' value='$complemento'>
                            </div>
                            <div class='half-box'>
                                <label for='bairro'>Bairro:</label>
                                <input type='text' name='bairro' id='bairro' value='$bairro' data-required data-only-letters>
                            </div>
                            <div class='half-box spacing'>
                                <label for='estado'>Estado:</label>
                                <input type='text' name='estado' id='estado' value='$estado' data-required data-only-letters data-max-length='2'>
                            </div>
                            <div class='half-box'>
                                <label for='cidade'>Cidade:</label>
                                <input type='text' name='cidade' id='cidade' value='$cidade' data-required data-only-letters>
                            </div>
                        </form>
                        </div>
                        <p class='error-validation template'></p>
                        <imput type='hidden' id='ID' name='ID value='$id'>
                        <imput type='hidden' id='mode' name='mode value='update'>";

            }else{
                echo "

                    <div id='main-container'>
                    <form id='register-form'action=''>
                        <h1>Cadastre-se para acessar o sistema</h1>
                        <div class='full-box'>
                            <label for='email'>E-mail:</label>
                            <input type='email' name='email' id='email' placeholder='Digite seu e-mail' data-min-length='2' data-email-validate>
                        </div>
                        <div class='full-box'>
                            <label for='descricao'>Descrição:</label>
                            <input type='text' name='descricao' id='descricao' placeholder='Digite uma descrição' data-required>
                        </div>
                        <div class='half-box spacing'>
                            <label for='preco'>Preço:</label>
                            <input type='text' name='preco' id='preco' placeholder='Digite o preço' data-required data-only-numbers>
                        </div>
                        <div class='half-box'>
                            <label for='nvagas'>Número de Vagas:</label>
                            <input type='text' name='nvagas' id='nvagas' placeholder='Digite o nº de vagas' data-required data-only-numbers data-max-length='2'>
                        </div>
                        <div class='half-box spacin'>
                            <label for='rua' Rua:</label>
                            <input type='text' name='rua' id='rua' placeholder='Digite o nome da rua' data-required data-only-letters>
                        </div>
                        <div class='half-box'>
                            <label for='numero'>Número:</label>
                            <input type='text' name='numero' id='numero' placeholder='Digite o nº correspondente' data-required data-only-numbers data-max-length='5'>
                        </div>
                        <div class='half-box spacing'>
                            <label for='complemento'>Complemento:</label>
                            <input type='text' name='complemento' id='complemento' placeholder='Digite se necessário'>
                        </div>
                        <div class='half-box'>
                            <label for='bairro'>Bairro:</label>
                            <input type='text' name='bairro' id='bairro' placeholder='Digite o bairro' data-required data-only-letters>
                        </div>
                        <div class='half-box spacing'>
                            <label for='estado'>Estado:</label>
                            <input type='text' name='estado' id='estado' placeholder='Digite o estado' data-required data-only-letters data-max-length='2'>
                        </div>
                        <div class='half-box'>
                            <label for='cidade'>Cidade:</label>
                            <input type='text' name='cidade' id='cidade' placeholder='Digite a cidade' data-required data-only-letters>
                        </div>
                    </form>
                    </div>
                    <p class='error-validation template'></p>
                    <imput type='hidden' id='ID' name='ID value='$id'>
                    <imput type='hidden' id='mode' name='mode value='insert'>";
            }
            $conn->close();
        ?> 
        </form>



  <Ul class = "rodape">
    <li class = "rodape" >
      <p class = texto>Empresa</p>
    </li>
    <li class = "rodape"> 
      <p class = texto>Contatos</p>
    </li>
    <li class = "rodape">
      <p class = texto>Endereço</p>
    </li>
  </Ul>


</body>
</html>