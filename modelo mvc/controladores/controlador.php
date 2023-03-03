
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
