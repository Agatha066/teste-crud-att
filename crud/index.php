<!DOCTYPE html>
<html lang="pt-BR">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Teste - Cadastro</title>
		<link rel="stylesheet" href="style.css">
		
		<style>
			body {font-family: Arial, Helvetica, sans-serif;}
			* {box-sizing: border-box}
			
			input[type=text], input[type=number], select[name=fabricante], select[name=categoria]{
			  width: 50%;
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
			  width: 10%;
			  opacity: 0.9;
			}

			button:hover {
			  opacity:1;
			}

			.ok {
			  float: left;
			  width: 50%;
			}

			.container {
			  padding: 10px;
			  float: left;
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

			table {
			  font-family: arial, sans-serif;
			  border-collapse: collapse;
			  width: 65%;
			}

			td, th {
			  border: 1px solid #dddddd;
			  text-align: left;
			  padding: 8px;
			  text-align: center;
			}

			tr:nth-child(even) {
			  background-color: #dddddd;
			}
			.cadastro{
				
			}
			.valor{
				text-align: center;
				color: red;
				width: 100%;
				padding: 5px;
			}
			h2{
				color: blue;
			}
		</style>
		<script>
			function salvar() {
				//valida os campos do formulario
				
				//envia e verifica se foi inserido
				location.href= "incluir.php";
			}
		</script>
	</head>

	<body>
		<h1>Modelo </h1>
		<form action="incluir.php" method="get">
		  <div class="container">
			<h2>Cadastro de Produtos</h2>
		
			<label for="produto"><b>Produto</b></label>
			<input type="text" placeholder="Nome" name="produto" required>
			
			<br><label for="fabricante"><b>Fabricante</b></label>
			<select name="fabricante" id="fab">
			  <option value="Fabricante 1">Fabricante 1</option>
			  <option value="Fabricante 2">Fabricante 2</option>
			  <option value="Fabricante 3">Fabricante 3</option>
			</select>
			
			<br><label for="categoria"><b>Categoria</b></label>
			<select name="categoria" id="cat">
			  <option value="Categoria 1">Categoria 1</option>
			  <option value="Categoria 2">Categoria 2</option>
			  <option value="Categoria 3">Categoria 3</option>
			</select>
			
			<br><label for="quantidade"><b>Quantidade</b></label>
			<input type="number" placeholder="Quantidade" name="quantidade" required>

			<br><label for="categoria"><b>Valor</b></label>
			<input type="number" placeholder="Valor" name="valor" required>

			<div class="clearfix">
			  <button type="submit" class="ok" onclick="salvar()">Cadastrar</button>
			</div>
		  </div>
		</form>
		
		<div class="">
			<h2>Produtos Cadastrados</h2>
			<table>
				<tr>
					<th>Produto</th>
					<th>Fabricante</th>
					<th>Categoria</th>
					<th>Quantidade</th>
					<th>Valor</th>
					<th>Ações</th>
				</tr>
				<?php 
					$total =0;
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
					
					$sql = "SELECT * FROM produto";
					
					if ($result = $conn->query($sql)) 
					{
						while ($res = $result->fetch_assoc()) 
						{		
							echo "<tr>";
							echo "<td>".$res['produto']."</td>";
							echo "<td>".$res['fabricante']."</td>";
							echo "<td>".$res['categoria']."</td>";	
							echo "<td>".$res['quantidade']."</td>";
							echo "<td>".$res['valor']."</td>";
							echo "<td><a href='update.php?id=".$res['id']."'>Editar</a> - <a href='delete.php?id=".$res['id']."' onclick='return confirm('Are you want to delete')'>Delete</a></td>";
							echo "<tr>";
							$total += $res['quantidade'] * $res['valor'];
				
						}
					}
				?>
			</table>
			<?php 
				echo '<br><div class="valor">Total : R$ '.$total. ' </div>';
			?>
		</div>
	</body>

</html>