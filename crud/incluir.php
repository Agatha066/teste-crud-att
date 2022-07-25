<?php

	if ($_SERVER["REQUEST_METHOD"] == "GET") 
	{
		$produto = $_GET["produto"];
		$categoria = $_GET["categoria"];
		$fabricante = $_GET["fabricante"];
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
			
			$sql = "INSERT INTO produto (produto, fabricante, categoria, quantidade, valor) 
				VALUES ('$produto','$fabricante','$categoria', $quantidade, $valor)";
			
			if($resultado = $conn->query($sql))
			{
				header("location: index.php");
			}
			else
			{
				echo "Erro!";
			}
	}
?>