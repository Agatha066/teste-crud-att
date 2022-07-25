<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET')
{
	$id = $_GET["id"];
	
	//fazendo conexao com o banco
		$servidor = "localhost";
		$usuario = "root";
		$senha = "";
		$nomebanco= "teste";
				
		$conn = new mysqli($servidor,$usuario,$senha,$nomebanco);
		if (!$conn) 
		{
			echo "ERRO AO CONECTAR BANCO DE DADOS!!";
		}
		
		$sql = "SELECT * FROM produto WHERE id = $id ";
				
		$resultado = $conn->query($sql);
		$res= mysqli_fetch_array($resultado);
		
}
?>

<!DOCTYPE html>
<html lang="pt">
	<head>
		<meta charset="utf-8">
		<title>CRUD PHP</title>
		<style>
			body {font-family: Arial, Helvetica, sans-serif;}
			* {box-sizing: border-box}
			
			input[type=text], input[type=number], select[name=fabricante], select[name=categoria]{
			  width: 100%;
			  padding: 15px;
			  margin: 5px 0 22px 0;
			  display: inline-block;
			  border: none;
			  background: #f1f1f1;
			}

			input[type=text]:focus, input[type=number]:focus, select[name=fabricante]:focus, select[name=categoria]:focus{
			  background-color: #ddd;
			  outline: none;
			}

			hr {
			  border: 1px solid #f1f1f1;
			  margin-bottom: 25px;
			}

			button {
			  background-color: #04AA6D;
			  color: white;
			  padding: 14px 20px;
			  margin: 8px 0;
			  border: none;
			  cursor: pointer;
			  width: 100%;
			  opacity: 0.9;
			}

			button:hover {
			  opacity:1;
			}

			.ok {
			  float: left;
			  width: 100%;
			}

			.container {
			  padding: 10px;
			}
			
			.clearfix::after {
			  content: "";
			  clear: both;
			  display: table;
			}

			@media screen and (max-width: 300px) {
			  .cancelbtn, .signupbtn {
				 width: 100%;
			  }
			}


		</style>
	</head>
	<body>
		<form action="update.php" method="get">
		  <div class="container">
			<h2>Atualizar de Produtos</h2>
			
			<label for="produto"><b>Produto</b></label>
			<input type="text" name="produto" value="<?php echo $res['produto']; ?>">
			
			
			<br><label for="fabricante"><b>Fabricante</b></label>
			<select name="fabricante" id="fab">
				<option value="<?php echo $res['fabricante']; ?>"><?php echo $res['fabricante']; ?></option>
			</select>
			
			<br><label for="categoria"><b>Categoria</b></label>
			<select name="categoria" id="cat">
			  <option value="<?php echo $res['categoria']; ?>"><?php echo $res['categoria']; ?></option>
			</select>
			
			<br><label for="quantidade"><b>Quantidade</b></label>
			<input type="number" name="quantidade" value="<?php echo $res['quantidade']; ?>">

			<br><label for="valor"><b>Valor</b></label>
			<input type="number" name="valor" value="<?php echo $res['valor']; ?>" >
			
			<input type="hidden" name="id" value="<?php echo $res['id']; ?>">

			<div class="clearfix">
			  <button type="submit" class="ok">Atualizar</button>
			</div>
		  </div>
		</form>
		
	</body>
<html>

<?php
	if ($_SERVER['REQUEST_METHOD'] == 'GET')
	{
		$valor = $_GET["valor"];
		$quantidade = $_GET["quantidade"];
	
		//fazendo conexao com o banco
		$servidor = "localhost";
		$usuario = "root";
		$senha = "";
		$nomebanco= "teste";
				
		$conn = new mysqli($servidor,$usuario,$senha,$nomebanco);
		if (!$conn) 
		{
			echo "ERRO AO CONECTAR BANCO DE DADOS!!";
		}
		
		$sql = "UPDATE produto SET quantidade = '$quantidade', valor = $valor  WHERE id = $id ";
				
		$resultado = $conn->query($sql);
		
		echo "entrou";
		
		if($resultado === true )
		{
			header("location: index.php");
		}
		else 
		{
			echo "Erro no update !!";
		}
	
	}
?>