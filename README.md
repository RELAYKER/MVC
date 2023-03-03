
## Modelo vista controlador (MVC)

Modelo Vista Controlador (MVC) es un estilo de arquitectura de software que separa los datos de una aplicación, la interfaz de usuario, y la lógica de control en tres componentes distintos.

Se trata de un modelo muy maduro y que ha demostrado su validez a lo largo de los años en todo tipo de aplicaciones, y sobre multitud de lenguajes y plataformas de desarrollo.

El Modelo que contiene una representación de los datos que maneja el sistema, su lógica de negocio, y sus mecanismos de persistencia.
La Vista, o interfaz de usuario, que compone la información que se envía al cliente y los mecanismos interacción con éste.
El Controlador, que actúa como intermediario entre el Modelo y la Vista, gestionando el flujo de información entre ellos y las transformaciones para adaptar los datos a las necesidades de cada uno.
 

## El modelo es el responsable de:
Acceder a la capa de almacenamiento de datos. Lo ideal es que el modelo sea independiente del sistema de almacenamiento.
Define las reglas de negocio (la funcionalidad del sistema). Un ejemplo de regla puede ser: "Si la mercancía pedida no está en el almacén, consultar el tiempo de entrega estándar del proveedor".
Lleva un registro de las vistas y controladores del sistema.
Si estamos ante un modelo activo, notificará a las vistas los cambios que en los datos pueda producir un agente externo (por ejemplo, un fichero por lotes  que actualiza los datos, un temporizador que desencadena una inserción, etc.).
 

## El controlador es responsable de:
 Recibe los eventos de entrada (un clic, un cambio en un campo de texto, etc.).
Contiene reglas de gestión de eventos, del tipo "SI Evento Z, entonces Acción W". Estas acciones pueden suponer peticiones al modelo o a las vistas. Una de estas peticiones a las vistas puede ser una llamada al método "Actualizar()". Una petición al modelo puede ser "Obtener_tiempo_de_entrega ( nueva_orden_de_venta )". 
 

## Las vistas son responsables de:
Recibir datos del modelo y los muestra al usuario.
Tienen un registro de su controlador asociado (normalmente porque además lo instancia).
Pueden dar el servicio de "Actualización()", para que sea invocado por el controlador o por el modelo (cuando es un modelo activo que informa de los cambios en los datos producidos por otros agentes).
 
# Ejemplo de Vista
<?php 
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>jony</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../css/styles.css" rel="stylesheet" />
    </head>
  <script >
    function Eliminar(id)
    {
        if(confirm("¿Confirmar Eliminacion?"))
        {
            window.location = "Controlador.php?id_eliminar=" + id;
        }
    }
    function Modificar(id)
    {
        window.location = "Controlador.php?id_mod=" + id;
    }
</script>
<body>

<!--REGISTRAR-->
 <section class="page-section">
            <div class="container">
<div align="center">
                    <h1 class="cont AC " style="color: white;">Categorias</h1>

<form action="Controlador.php" id="frmreg" name="frmreg" method="POST">
    <div class="cont AC tlP">
            <input class="InputN " type="text" id="txtid" name="txtid" placeholder="id" value="<?php echo @$cat_mod[0][0];?>" readonly>
        <br>
        <br>       
            <input class="InputN " type="text" id="txtcat" name="txtcat" placeholder="categoria" value="<?php echo @$cat_mod[0][1];?>">
        <br> 
        <br>
            <input type="submit" id="btnreg" name="btnreg" value="<?php 
                if(isset($_GET['id_mod']))
                    {
                        echo 'Modificar';
                    }
                else
                    {
                        echo 'Registrar';
                    } ?>">
    </div>
</form>
<!--BUSCAR-->
<form action="controlador.php" id="frmbuscar" name="frmbuscar" method="POST">
    <div class="AC cont " >

        <h3 class="mx-auto my-0 text-uppercase" style="color:white">Buscar</h3>
        <br>
            <div>
                <input type="txtnomB" name="txtnomB" placeholder="Buscar" >
                <input type="submit"  id="btnbus" name="btnbus" value="Buscar" >
            </div>
            <br>
            <table class="table table-hover text-center" style="color: white;width: 600px">
                <tr>
                    <td>Id</td>
                    <td>categoria</td>
                </tr>
<?php foreach (@$resu as $row) {?>
    <tr>
        <td><?php echo $row[0]; ?></td>
        <td><?php echo $row[1]; ?></td>
        <td><input type="button" class="" name="btnEliminar" id="btnEliminar" value="Eliminar" onclick="javascript: Eliminar('<?php echo $row[0]; ?>')"></td>
        <td><input type="button" class="" name="btnMod" id="btnMod" value="Modificar" onclick="javascript: Modificar('<?php echo $row[0]; ?>')"></td>
    </tr>
<?php } ?>
            </table>
            <br><br>
    </div>
</form>
</div>
</div>
</section>
<!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
</body>
</html>

# Ejemplo de Modelo
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

# Ejemplo de Controlador

<?php 


@$id = $_POST['txtid'];
@$valor = $_POST['txtcat'];

require '../modelos/modelo.php';
@$Var = new cat();
    if(isset($_POST['btnreg']))
    {
    if($_POST['btnreg']=="Registrar")
        {

        @$Var->Insertar($_POST['txtcat']);
        echo 'HOLA';

        }               
    else
        {
            @$Var->Modificar($id,$valor);
            
        }
    }
    else if (isset($_GET['id_eliminar'])) 
    {
        @$id = $_GET['id_eliminar'];

        @$Var->Eliminar($id);

    }
    else if (isset($_GET['id_mod'])) 
    {
        @$id = $_GET['id_mod'];

        @$cat_mod = $Var->Ejecutar_Instruccion("Select * from categoria where id = '$id' ");
                    
    }
        @$DaB = $_POST['txtnomB'];
        @$resu = $Var->Ejecutar_Instruccion("Select * from categoria where categorias like '%$DaB%' ");

   require '../vistas/vista.php';


 ?>


## Conexion a BD
<?php 

require 'config.php';

class BD_PDO
{
	//public $tot_reg;
	//public $ultimo_id;

	public function getConection ()	
	{
		try 
		{
			$conexion = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME.";",DB_USER,DB_PASS);			       	
		}
		catch(PDOException $e)
		{
	        echo "Failed to get DB handle: " . $e->getMessage();
	        exit;    
	    }
	    return $conexion;
	}

	public function Ejecutar_Instruccion($consulta_sql)
	{
		# code...
		$conexion = $this->getConection();
        $rows = array();        
		$query=$conexion->prepare($consulta_sql);
		if(!$query)
		{
         	return "Error al mostrar";
        }
		else
		{			
        	$query->execute();   
           	//$this->tot_reg = $query->rowCount();     	
        	while ($result = $query->fetch())
			{
            	$rows[] = $result;
          	}			
            return $rows;
        }
	}
}

## Conexion
<?php 

define('DB_SERVER', 'localhost');
define('DB_NAME', 'mvc');
define('DB_USER', 'root');
define('DB_PASS', '');

 ?>