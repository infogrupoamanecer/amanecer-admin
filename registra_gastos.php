<?php
require_once('header.php'); 
if($_POST["description"]){
	$sql = "INSERT INTO MyGuests (id_tipo_gasto, description, fecha_creacion, referencia,base,iva,id_libro,envio,cantidad,distribuidora)
VALUES (:id_tipo_gasto,:description, :fecha_creacion, :referencia,:base,:iva,:id_libro,:envio,:cantidad,:distribuidora)";
$clean_insert=mysqli->prepare($sql);
$clean_insert->bindParam(:id_tipo_gasto, $_POST["id_tipo_gasto"]);
$clean_insert->bindParam(:description, $_POST["description"]);
$clean_insert->bindParam(:fecha_creacion, $_POST["fecha_creacion"]);
$clean_insert->bindParam(:referencia, $_POST["referencia"]);
$clean_insert->bindParam(:base, $_POST["base"]);
$clean_insert->bindParam(:iva, $_POST["iva"]);
$clean_insert->bindParam(:id_libro, $_POST["id_libro"]);
$clean_insert->bindParam(:envio, $_POST["envio"]);
$clean_insert->bindParam(:cantidad, $_POST["cantidad"]);
$clean_insert->bindParam(:distribuidora, $_POST["distribuidora"]);


if ($clean_insert->execute() === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;

}
die();
}
$sql="select * from ad_libro";
$result = $mysqli->query($sql);
 while($row = $result->fetch_assoc()) {
        $libros.= '<option value='.$row["id_libro"].'>'.$row["nombre"].'</option>' ;
     
    }
?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<div class="container">
Tipo <select name="id_tipo_gasto"> <option>P</option><option>N</option></select><br>
descripción <input type="" name="description"><br>
fecha creacion <input type="" name="fecha_creacion"><br>
referencia <input type="" name="referencia"><br>
base <input type="" name="base"><br>
iva <input type="" name="iva"><br>
Libro <select name="id_libro"><? echo $libros; ?></select>
Envío <input type="" name="envio"><br>
cantidad <input type="" name="cantidad"><br>
distribuidora <input type="" name="distribuidora"><br>
</div>
