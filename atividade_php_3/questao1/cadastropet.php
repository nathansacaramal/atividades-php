<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action="processardados.php" method="post">
    <label for="nome_pet">Nome do Pet</label> <br>
    <input type="text" id="nome_pet" name="nome_pet" minlenght="2" maxlenght="40"> <br>

    <label for="especie">Espécie</label> <br>
    <select name="especie" id="especie"> 
        <option value="cao">Cão</option>
        <option value="gato">Gato</option>
    </select> <br>  <br>

    <button type="submit">Cadastrar</button>

    <a href="index.php">Home</a>
</form>
    
</body>
</html>