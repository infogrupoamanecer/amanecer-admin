
<?php
require_once('header.php'); 

?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<div class="container">
    <h1 class=".center">gastos</h1>
    <br>

 <br>
 <table class="table table-striped">
  <thead>
    <tr>
      <th scope="row">Libro</th>
      <th scope="col">Gasto</th>
      <th scope="col">ingreso</th>
      
    </tr>
    <tbody>
    
    <?
   

$sql = "select 
ad_movimiento.id_libro,ad_libro.titulo,
round(sum(CASE WHEN `id_tipo_gasto`='N' THEN COALESCE(`base`,0) END),2) neg,
round(sum(CASE WHEN `id_tipo_gasto`='P' THEN COALESCE(`base`,0) END),2) pos 
from 
ad_movimiento inner join ad_libro on ad_libro.id_libro=ad_movimiento.id_libro
 group by ad_movimiento.id_libro" ;

$result = $mysqli->query($sql);
;
$pos=0;
$neg=0;
if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
        echo '<tr><th scope="row"> ' . $row["titulo"]. "   <td>" . $row["neg"]. " <td>".$row["pos"]."<br>";
        $pos+=$row["pos"];
        $neg+=$row["neg"];
    }
} 



   echo "<tr><td>total</td> <td>".$neg."</td> <td>".$pos."</td>";
 ?>
 </thead>
  </tbody>
</table>
<br>


</div>