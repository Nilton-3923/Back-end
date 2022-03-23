<?php
    error_reporting(0);
    $meuCep = $_POST['txtCep'];
    $url = "https://viacep.com.br/ws/$meuCep/json/";

    $json = file_get_contents($url);
    $data = json_decode($json);

    $cep = $data -> cep;
    $logradouro = $data -> logradouro;
    $bairro = $data -> bairro;
    $localidade = $data -> localidade;
    $uf = $data -> uf;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index-api.css">
    <title>Atividade API</title>
</head>
<body>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <div class="conteudo">
        <form class="formulario" method="POST">
            <div class="div-0">
                <h1 class="placeholder-cep"id="cep">CEP</h1>
                <input id="input-cep" type="text" name="txtCep" value="<?php echo$meuCep;?>" onKeypress="$(this).mask('00000-000')">
            </div>
                <div class="div1">
                    <input class="logradouro" type="text" name="" value="<?php echo $logradouro;?>" disabled>
                    <input class="bairro" type="text" name="" value="<?php echo $bairro;?>" disabled>
                </div>
                <div class="div2">
                    <input class="localidade" type="text" value="<?php echo $localidade;?>" disabled>
                    <input class="uf" type="text" name="" value="<?php echo $uf;?>" disabled>
                </div>
            <input type="submit" value="Verificar">
        </form>
    </div>


    <?php   
    if(empty($cep)){
        echo "<h2>Insira algum cep</h2>";
    }
    ?>

    <script>
        var inputCep = document.getElementById('input-cep')
        var cep = document.getElementById('cep')

        inputCep.onclick = function(){
            cep.classList.add('animacao')
        }

    </script>

</body>
</html>