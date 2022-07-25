<?php
	if ($_SERVER['REQUEST_METHOD'] == 'GET')
	{
		
		$id = $_GET['id'];
		
		$idVal = 0;
		
		//valida
		if($id != "" )
		{
			$idVal=1;
		}
		//resultado
		
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
			
		if($idVal==1 )//deletar no banco
		{
			$sql = "DELETE FROM produto WHERE id = $id ";
				
			$resultado = $conn->query($sql);
			
			if($conn->query($sql) === TRUE )
			{
				header("location: index.php");
			}
		}
		else 
		{
			echo "Erro no delete !!";
		}
	
	}
?>