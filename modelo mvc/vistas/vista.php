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


