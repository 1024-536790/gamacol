<html>
<head>
    <title>Add Data</title>
</head>
<body>
<?php

include_once("config.php");

if(isset($_POST['Submit'])) {   
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

        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else { 

        $sql = "INSERT INTO estudiante(identificacion, nombre, curso, nota1, nota2, nota3) VALUES(:identificacion, :nombre, :curso, :nota1, :nota2, :nota3)";
        $query = $dbConn->prepare($sql);
                
        $query->bindparam(':identificacion', $identificacion);
        $query->bindparam(':nombre', $nombre);
        $query->bindparam(':curso', $curso);
        $query->bindparam(':nota1', $nota1);
        $query->bindparam(':nota2', $nota2);
        $query->bindparam(':nota3', $nota3);
        $query->execute();
        

        echo "<font color='green'>Data added successfully.";
        echo "<br/><a href='index.php'>View Result</a>";
    }
}
?>
</body>
</html>

