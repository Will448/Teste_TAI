<?php
    include "../database/bd.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2>Bd usuario: </h2>
<a href="../pagina/index.php"> tela inicial</a>
<br>
<?php
    $objBD = new BD();
    $objBD->conn();
    $result = $objBD->select();
    foreach ($result as $item){
    echo "ID: ".$item['id']."<br>" . "Nome: ".$item['nome'] ."<br>" . "Telefone:". $item['telefone'] . "<br>". "CPF:" . $item['cpf']."<br>";
    }

    if(!empty($_post)){
        echo "Salvar";
        var_dump($_post);
        $objBD->inserir($_post);
        header("Location:usuario_form.php");
    }
?>

</body>
</html>