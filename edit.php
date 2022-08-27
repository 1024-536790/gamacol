<?php

include_once("config.php");

if(isset($_POST['update']))
{   
    $id = $_POST['id'];
    
    $identificacion = $_POST['identificacion'];
    $nombre = $_POST['nombre'];
    $curso = $_POST['curso'];
    $nota1 = $_POST['nota1'];
    $nota2 = $_POST['nota2'];
    $nota3 = $_POST['nota3'];

    if(empty($identificacion) || empty($nombre) || empty($curso) || empty($nota1) || empty($nota2) || empty($nota3)) {
                
        if(empty($identificacion)) {
            echo "<font color='red'>Campo: identificacion esta vacio.</font><br/>";
        }
        
        if(empty($nombre)) {
            echo "<font color='red'>Campo: nombre esta vacio.</font><br/>";
        }
        
        if(empty($curso)) {
            echo "<font color='red'>Campo: curso esta vacio.</font><br/>";
        }

        if(empty($nota1)) {
            echo "<font color='red'>Campo: nota 1 esta vacio.</font><br/>";
        }
        
        if(empty($nota2)) {
            echo "<font color='red'>Campo: nota 2 esta vacio.</font><br/>";
        }
        
        if(empty($nota3)) {
            echo "<font color='red'>Campo: nota 3 esta vacio.</font><br/>";
        }
    } else {    

        $sql = "UPDATE estudiante SET identificacion=:identificacion, nombre=:nombre, curso=:curso, nota1=:nota1, nota2=:nota2, nota3=:nota3 WHERE id=:id";
        $query = $dbConn->prepare($sql);
                
        $query->bindparam(':id', $id);
        $query->bindparam(':identificacion', $identificacion);
        $query->bindparam(':nombre', $nombre);
        $query->bindparam(':curso', $curso);
        $query->bindparam(':nota1', $nota1);
        $query->bindparam(':nota2', $nota2);
        $query->bindparam(':nota3', $nota3);
        $query->execute();
        
        
        header("Location: index.php");
    }
}
?>
<?php

$id = $_GET['id'];


$sql = "SELECT * FROM estudiante WHERE id=:id";
$query = $dbConn->prepare($sql);
$query->execute(array(':id' => $id));

while($row = $query->fetch(PDO::FETCH_ASSOC))
{
    $identificacion = $row['identificacion'];
    $nombre = $row['nombre'];
    $curso = $row['curso'];
    $nota1 = $row['nota1'];
    $nota2 = $row['nota2'];
    $nota3 = $row['nota3'];
}
?>
<html>
<head>  
    <title>Edit Data</title>
</head>

<body>
    <a href="index.php">Home</a>
    <br/><br/>
    
    <form name="form1" method="post" action="edit.php">
        <table border="0">
            <tr> 
                <td>Identificacion</td>
                <td><input type="text" name="identificacion" value="<?php echo $identificacion;?>"></td>
            </tr>
            <tr> 
                <td>Nombre</td>
                <td><input type="text" name="nombre" value="<?php echo $nombre;?>"></td>
            </tr>
            <tr> 
                <td>Curso</td>
                <td><input type="text" name="curso" value="<?php echo $curso;?>"></td>
            </tr>
            <tr> 
                <td>Nota 1</td>
                <td><input type="text" name="nota1" value="<?php echo $nota1;?>"></td>
            </tr>
            <tr> 
                <td>Nota 2</td>
                <td><input type="text" name="nota2" value="<?php echo $nota2;?>"></td>
            </tr>
            <tr> 
                <td>Nota 3</td>
                <td><input type="text" name="nota3" value="<?php echo $nota3;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>

