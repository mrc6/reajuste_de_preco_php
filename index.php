<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reajuste de Preços</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
      $preco = $_REQUEST['preco'] ?? 0;
      $porc = $_REQUEST['reaj'] ?? 0;
    ?>
    <main>
        <h1>Reajustar o Preço</h1>
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="get">
            <label for="preco">Preço do Produto (R$)</label>
            <input type="number" name="preco" id="preco" min="0.10" step="0.01">
            <label for="reaj">Qual será o percentual de reajuste? (<strong><span id="p">?</span>%</strong>)</label>
            <input type="range" name="reaj" id="reaj" min="0" max="100" step="1" oninput="muda_valor()">
            <input type="submit" value="Reajustar">
        </form>
    </main>
    <?php 
      $formula = ($preco * $porc) / 100;
      $novo_preco = $preco + $formula;
      echo "<p>$porc% de $preco é igual $formula e o novo preço é $novo_preco</p>";
    ?>
    <script>
        muda_valor();
        function muda_valor(){
          p.innerText = reaj.value;
        }
    </script>
</body>
</html>
