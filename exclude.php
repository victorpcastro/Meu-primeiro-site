<?php

    include('conexao_banco.php');

    print_r($_POST);

    if($_GET['mode']== 'exclude'){
        $id = $_GET['ID'];

        $sql = "DELETE FROM vagas WHERE ID=$id";
        $conn->query($sql);
    }else if($_POST['mode']=='insert'){
        $descricao          = $_POST['descricao'];
        $preco              = $_POST['preco'];
        $num_espacos        = $_POST['nvagas'];
        $foto_principal     = $_POST['arquivos'];
        $rua                = $_POST['rua'];
        $numero             = $_POST['numero'];
        $complemento        = $_POST['complemento'];
        $estado             = $_POST['estado'];
        $cidade             = $_POST['cidade'];
        $email              = $_POST['email'];
        $bairro             = $_POST['bairro'];

        $sql = "INSERT INTO vagas (Descricao, Preco, Num_Espacos,Foto_Principal,Rua,Numero,Complemento,Estado,Cidade,Email,Bairro) 
        values ('$descricao', $preco, $num_espacos, '$foto_principal','$rua',$numero,'$complemento','$estado','$cidade','$email','$bairro')";
        $conn->query($sql);
    }else if($_POST['mode']=='update'){
        $id                 = $_POST['ID'];
        $descricao          = $_POST['descricao'];
        $preco              = $_POST['preco'];
        $num_espacos        = $_POST['nvagas'];
        $foto_principal     = $_POST['arquivos'];
        $rua                = $_POST['rua'];
        $numero             = $_POST['numero'];
        $complemento        = $_POST['complemento'];
        $estado             = $_POST['estado'];
        $cidade             = $_POST['cidade'];
        $email              = $_POST['email'];
        $bairro             = $_POST['bairro'];


        $sql = "UPDATE vagas SET Descricao ='$descricao', Preco ='$preco', Num_Espacos ='$num_espaco' ,Foto_Principal ='$foto_principal', Rua ='$rua', Numero ='$numero', Complemento ='$complemento', Estado ='$estado', Cidade ='$cidade' ,Email ='$email', Bairro ='$bairro' WHERE ID=$id";
        $conn->query($sql);
    }
    $conn->close();
    header("location: tela_pronta_form.php");
    exit();
?>