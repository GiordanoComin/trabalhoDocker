<?php
require_once './config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $numeroUm = $_POST['numeroUm'];
    $numeroDois = $_POST['numeroDois'];
    $operacao = $_POST['operacao'];

    if ($operacao === 'soma') {
        $resultado = $numeroUm + $numeroDois;
    } elseif ($operacao === 'subtracao') {
        $resultado = $numeroUm - $numeroDois;
    } elseif ($operacao === 'multiplicacao') {
        $resultado = $numeroUm * $numeroDois;
    } elseif ($operacao === 'divisao') {
        $resultado = $numeroUm / $numeroDois;
    }

    $sqlInsert = "INSERT INTO numeros (numero_um, numero_dois, tipo_operacao, resultado)
                  VALUES ('$numeroUm', '$numeroDois', '$operacao', $resultado);";
    $pdo->exec($sqlInsert);

}

$trasTodos = "SELECT * FROM numeros";
$resultados = $pdo->query($trasTodos)->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trabalho de SO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="bloco2">
        <div class="container2">
            <img src="./assets/atitus.png" alt="" class="imagem">
        </div>
        <form name="form" action="" method="post">
            <div class="container">
                <div class="bloco">
                    <ul class="linha">
                        <li>
                            <label>Insira o primeiro número:</label>
                            <input type="number" name="numeroUm" id="num" required>
                        </li>
                        <li class="linha2">
                            <label>Insira o segundo número:</label>
                            <input type="number" name="numeroDois" id="ndois" required>
                        </li>
                        <button type="submit" class="btn btn-outline-dark btn-sm" name="operacao" value="soma">Somar</button>
                        <button type="submit" class="btn btn-outline-dark btn-sm" name="operacao" value="subtracao">Diminuir</button>
                        <button type="submit" class="btn btn-outline-dark btn-sm" name="operacao" value="multiplicacao">Multiplicar</button>
                        <button type="submit" class="btn btn-outline-dark btn-sm" name="operacao" value="divisao">Dividir</button>
                    </ul>
                    <?php if(isset($resultado) && $resultado != 0) {?>
                        <div class="alinhamento">
                            <div class="resultado">
                                <b>Resultado:</b>
                                <?php echo $resultado; ?>
                            </div>
                        </div>
                    <?php }?>    
                </div>
            </div>
        </form>
        <h3>Histórico de Resultados</h3>
        <table class="table">
          <thead>
            <tr>
              <th>Número Um</th>
              <th>Tipo de Operação</th>
              <th>Número Dois</th>
              <th>Resultado</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($resultados as $resultado) {?>
                <tr>
                    <td><?php echo $resultado['numero_um']; ?></td>
                    <td><?php echo $resultado['tipo_operacao']; ?></td>
                    <td><?php echo $resultado['numero_dois']; ?></td>
                    <td><?php echo $resultado['resultado']; ?></td>
                </tr>
            <?php }?>
          </tbody>
        </table>
        <footer>&copyAtitus 2023 . Guilherme Lima</footer>
    </div>
</body>
</html>
