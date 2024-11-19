<?php
// Função que determina a estação com base na data
function obterEstacao($dia, $mes) {
    // Datas de início das estações no hemisfério sul
    $primavera_inicio = new DateTime('2024-09-22');
    $verao_inicio = new DateTime('2024-12-21');
    $outono_inicio = new DateTime('2024-03-20');
    $inverno_inicio = new DateTime('2024-06-21');
    
    // Cria um objeto DateTime com a data informada
    $data = new DateTime("2024-$mes-$dia");
    
    // Comparação de datas para determinar a estação
    if ($data >= $primavera_inicio && $data < $verao_inicio) {
        return ['estacao' => 'Primavera', 'img' => 'primavera.jpeg'];
    } elseif ($data >= $verao_inicio && $data < $outono_inicio) {
        return ['estacao' => 'Verão', 'img' => 'verao.jpeg'];
    } elseif ($data >= $outono_inicio && $data < $inverno_inicio) {
        return ['estacao' => 'Outono', 'img' => 'outono.jpeg'];
    } else {
        return ['estacao' => 'Inverno', 'img' => 'inverno.jpeg'];
    }
}

// Ve se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $dia = (int)$_POST['dia'];
    $mes = (int)$_POST['mes'];
    
    // Chama a função para obter a estação
    $resultado = obterEstacao($dia, $mes);
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="sistema.css">
    <title>Estação do Ano</title>
</head>
<body>
    
<center>
    <h1>Descubra a estação do ano</h1>

    <!-- Formulário para entrada do dia e mês -->
    <form method="POST" action="">
        <label for="dia">Dia:</label>
        <input type="number" name="dia" id="dia" min="1" max="31" required><br><br>

        <label for="mes">Mês:</label>
        <input type="number" name="mes" id="mes" min="1" max="12" required><br><br>

        <button type="submit">Ver Estação</button>
    </form>

    <?php if (isset($resultado)): ?>
        <h2>Estação: <?php echo $resultado['estacao']; ?></h2>
        <img src="img/<?php echo $resultado['img']; ?>" alt="<?php echo $resultado['estacao']; ?>" style="width:500px; height:auto;">
    <?php endif; ?>
    </center>

</body>
</html>

