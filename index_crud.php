<?php

include_once("config.php");


$result = $dbConn->query("SELECT * FROM estudiante ORDER BY id DESC");
?>

<html>
<head>  
    <title>Crear Estudiante</title>
</head>

<body>
<a href="add.html">Adicionar Estudiante</a><br/><br/>

    <table width='80%' border=0>

    <tr bgcolor='#CCCCCC'>
        <td>Identificacion</td>
        <td>Nombre</td>
        <td>Curso</td>
        <td>Nota 1</td>
        <td>Nota 2</td>
        <td>Nota 3</td>
        <td>Update</td>
    </tr>
    <?php   
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {        
        echo "<tr>";
        echo "<td>".$row['identificacion']."</td>";
        echo "<td>".$row['nombre']."</td>";
        echo "<td>".$row['curso']."</td>";
        echo "<td>".$row['nota1']."</td>";
        echo "<td>".$row['nota2']."</td>";
        echo "<td>".$row['nota3']."</td>";
        echo "<td><a href=\"edit.php?id=$row[id]\">Edit</a> | <a href=\"delete.php?id=$row[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";       
    }
    ?>
    </table>
    
    
</body>
</html>
