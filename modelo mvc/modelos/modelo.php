<?php 
require '../BD/conexion_bd.php';

class cat extends BD_PDO
{
	function Insertar ($categoria)
	{
		$this -> Ejecutar_Instruccion ("Insert into categoria (categorias) values ('$categoria')");

		echo '<script>alert("Dato INSERTADO correctamente :D");</script>';
	}
	function Modificar ($id,$valor)
	{

		$this -> Ejecutar_Instruccion("Update categoria SET categorias = '$valor' WHERE id = '$id'");
		

		echo '<script>alert("Dato ACTUALIZADO correctamente :D");</script>' ;

	}
	function Buscar($DaB)
	{
		$resu = $this -> Ejecutar_Instruccion("Select * from categoria where categorias like '%$DaB%'");
		return $resu;
	}
	function Eliminar($id)
	{
		$this -> Ejecutar_Instruccion("Delete from categoria where id = '$id'");
		echo '<script>alert("Dato ELIMINADO correctamente :D");</script>';
	}
}

?>
