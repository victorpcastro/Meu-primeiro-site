<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Form de Registro com validações em JS</title>
        <link rel="stylesheet" href="css/styles.css">
        <link rel="stylesheet" type="text/css" href="cadastro_folha_estilo.css">
        <script>
            function fnSubmit(){
                if((document.getElementById('descricao').value!="")&&(document.getElementById('preco').value!="")&&
                (document.getElementById('nvagas').value!="")&&(document.getElementById('rua').value!="")&&
                (document.getElementById('numero').value!="")&&(document.getElementById('bairro').value!="")&&
                (document.getElementById('estado').value!="")&&(document.getElementById('cidade').value!="")&&
                (document.getElementById('arquivos').value!=0)){
                    document.getElementById('register-form').submit();
                }else{
                    alert('é necessário preencher todos os campos exceto complemento');
                }
            }
        </script>
        <style>
        table.list{
        width:80%;
        top: 1200px;
        position: relative;
        margin-left: auto;
        margin-right: auto;
        border-collapse: collapse;
        }
        td.list, th.list{
        position: relative;
        top: 1215px;
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

        <form id="register-form" action="exclude.php" method="POST" name="register-form">
        <?php
            include('conexao_banco.php');

            if($_GET['ID'] != '' && $_GET['mode'] == 'update'){
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
                            <h1>Cadastre-se para acessar o sistema</h1>
                            <div class='full-box'>
                                <label for='email'>E-mail:</label>
                                <input type='email' name='email' id='email' value='$email' >
                            </div>
                            <div class='full-box'>
                                <label for='descricao'>Descrição:</label>
                                <input type='text' name='descricao' id='descricao' value='$descricao' >
                            </div>
                            <div class='half-box spacing'>
                                <label for='preco'>Preço:</label>
                                <input type='text' name='preco' id='preco' value=$preco >
                            </div>
                            <div class='half-box'>
                                <label for='nvagas'>Número de Vagas:</label>
                                <input type='' name='nvagas' id='nvagas' value=$num_espacos >
                            </div>
                            <div class='half-box spacin'>
                                <label for='rua' Rua:</label>
                                <input type='text' name='rua' id='rua' value='$rua' >
                            </div>
                            <div class='half-box'>
                                <label for='numero'>Número:</label>
                                <input type='text' name='numero' id='numero' value=$numero >
                            </div>
                            <div class='half-box spacing'>
                                <label for='complemento'>Complemento:</label>
                                <input type='text' name='complemento' id='complemento' value='$complemento'>
                            </div>
                            <div class='half-box'>
                                <label for='bairro'>Bairro:</label>
                                <input type='text' name='bairro' id='bairro' value='$bairro' >
                            </div>
                            <div class='half-box spacing'>
                                <label for='estado'>Estado:</label>
                                <input type='text' name='estado' id='estado' value='$estado' >
                            </div>
                            <div class='half-box'>
                                <label for='cidade'>Cidade:</label>
                                <input type='text' name='cidade' id='cidade' value='$cidade' >
                            </div>
                                <div class='full-box'>
                                    <input type='file' name='arquivos' class='btn btn-success' >
                                </div> 
                            <div class='full-box'>
                            <input id='btn-submit' type='button' onclick='fnSubmit();' value='update'>
                            </div>
                        </div>
                        <p class='error-validation template'></p>
                        <input type='hidden' id='ID' name='ID' value ='$id'>
                        <input type='hidden' id='mode' name='mode' value ='update'>";

            }else{
                echo "

                    <div id='main-container'>
                        <h1>Cadastre-se para acessar o sistema</h1>
                            <div class='full-box'>
                                <label for='email'>E-mail:</label>
                                <input type='email' name='email' id='email' placeholder='Digite seu e-mail' >
                            </div>
                            <div class='full-box'>
                                <label for='descricao'>Descrição:</label>
                                <input type='text' name='descricao' id='descricao' placeholder='Digite uma descrição' data-required>
                            </div>
                            <div class='half-box spacing'>
                                <label for='preco'>Preço:</label>
                                <input type='text' name='preco' id='preco' placeholder='Digite o preço' >
                            </div>
                            <div class='half-box'>
                                <label for='nvagas'>Número de Vagas:</label>
                                <input type='text' name='nvagas' id='nvagas' placeholder='Digite o nº de vagas' >
                            </div>
                            <div class='half-box spacin'>
                                <label for='rua'> Rua:</label>
                                <input type='text' name='rua' id='rua' placeholder='Digite o nome da rua' >
                            </div>
                            <div class='half-box'>
                                <label for='numero'>Número:</label>
                                <input type='text' name='numero' id='numero' placeholder='Digite o nº correspondente' >
                            </div>
                            <div class='half-box spacing'>
                                <label for='complemento'>Complemento:</label>
                                <input type='text' name='complemento' id='complemento' placeholder='Digite se necessário'>
                            </div>
                            <div class='half-box'>
                                <label for='bairro'>Bairro:</label>
                                <input type='text' name='bairro' id='bairro' placeholder='Digite o bairro' >
                            </div>
                            <div class='half-box spacing'>
                                <label for='estado'>Estado:</label>
                                <input type='text' name='estado' id='estado' placeholder='Digite o estado'>
                            </div>
                            <div class='half-box'>
                                <label for='cidade'>Cidade:</label>
                                <input type='text' name='cidade' id='cidade' placeholder='Digite a cidade' >
                            </div>
                                <div class='full-box'>
                                    <input type='file' id='arquivos' name='arquivos' class='btn btn-success'>
                                </div>
                                <input type='hidden' id='ID' name='ID' value='$id'>
                                <input type='hidden' id='mode' name='mode' value='insert'>
                            <div class='full-box'>
                                <input id='btn-submit' type='button' onclick='fnSubmit();' value='insert'>  
                            </div>
                    </div>
                    <p class='error-validation template'></p>";
            }
            $conn->close();
        ?> 
        </form>
        <hr>
        <table class="list">
            <tr class="list">
                <th class="list">ID</th>
                <th class="list">Descricao</th>
                <th class="list">Preço</th>
                <th class="list">Num_Espaços</th>
                <th class="list">Foto_Principal</th>
                <th class="list">Estado</th>
                <th class="list">Cidade</th>
                <th class="list">Bairro</th>
                <th class="list">Rua</th>
                <th class="list">Numero</th>]
                <th class="list">Complemento</th>
                <th class="list">Email</th>
                <th>&nbsp</th>
                <th>&nbsp</th>
            </tr>
        </table>
     
            <?php

            include('conexao_banco.php');

            $sql = "SELECT * FROM vagas";

            $result = $conn->query($sql);

            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $id                 = $row["ID"];
                    $descricao          = $row["Descricao"];
                    $preco              = $row['Preco'];
                    $num_espacos        = $row["Num_Espacos"];
                    $foto_principal     = $row["Foto_Principal"];
                    $rua                = $row["Rua"];
                    $numero             = $row["Numero"];
                    $complemento        = $row["Complemento"];
                    $estado             = $row["Estado"];
                    $cidade             = $row["Cidade"];
                    $email              = $row["Email"];
                    $bairro             = $row["Bairro"];

                    echo " 
                            <tr class='list'>
                                <td class='list'>$id</td>                                
                                <td class='list'>$descricao</td>
                                <td class='list'>$preco</td>
                                <td class='list'>$num_espacos</td>                                 
                                <td class='list'>$foto_principal</td> 
                                <td class='list'>$estado</td>                           
                                <td class='list'>$cidade</td>
                                <td class='list'>$bairro</td>
                                <td class='list'>$rua</td>
                                <td class='list'>$numero</td>
                                <td class='list'>$complemento</td>
                                <td class='list'>$email</td>
                                <td class='action'><a href='tela_pronta_form.php?mode=update&ID=$id'>
                                    <img src='imagens/lupa2.png' width='20px'>
                                </a></td>
                                <td class='action'><a href='exclude.php?mode=exclude&ID=$id'>
                                    <img src='imagens/lupa2.png' width='20px'>
                                </a></td>
                            </tr>
                            </table>


                            <Ul class = 'rodape'>
                                <li class = 'rodape' >
                                <p class = texto>Empresa</p>
                                </li>
                                <li class = 'rodape'> 
                                <p class = texto>Contatos</p>
                                </li>
                                <li class = 'rodape'>
                                <p class = texto>Endereço</p>
                                </li>
                            </Ul>";

                }
            }else{
                echo "
                         <tr class='list'>
                            <td class='list'>&nbsp;</td>
                            <td class='list'>&nbsp;</td>
                            <td class='list'>&nbsp;</td>
                            <td class='list'>&nbsp;</td>
                            <td class='list'>&nbsp;</td>
                            <td class='list'>&nbsp;</td>
                            <td class='list'>&nbsp;</td>
                            <td class='list'>&nbsp;</td>
                            <td class='list'>&nbsp;</td>
                            <td class='list'>&nbsp;</td>
                            <td class='list'>&nbsp;</td>
                            <td class='list'>&nbsp;</td>
                            <td class='action'>&nbsp;</</td>
                            <td class='action'>&nbsp;</</td>
                        </tr>

                        <Ul class = 'rodape'>
                            <li class = 'rodape' >
                                <p class = texto>Empresa</p>
                            </li>
                            <li class = 'rodape'> 
                                <p class = texto>Contatos</p>
                            </li>
                            <li class = 'rodape'>
                                <p class = texto>Endereço</p>
                            </li>
                         </Ul>";

            }

            $conn->close();
            ?>

    </body>
</html>