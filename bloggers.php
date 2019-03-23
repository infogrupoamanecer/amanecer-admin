
<?php
require_once('header.php'); 
if (!empty($_POST))
{
     $stmt = $mysqli->prepare("insert into ad_blogger(nombre, link,tipo,sexo,followers,mail,direccion) values (?,?,?,?,?,?,?)");

    $stmt->bind_param("sssssss", $_POST['nombre'],$_POST['link'],$_POST['tipo'],$_POST['sexo'],$_POST['followers'],$_POST['mail'],$_POST['direccion']);

   
if(!$stmt->execute()) echo $stmt->error;
    $stmt->close();
}
?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<div class="container">
    <h1 class=".center">Blogger y otros</h1>
    <br>
  <form action="bloggers.php" method="post"/>
Nombre: <input type="text" name="nombre"/>   
link: <input type="text" name="link"/>  
sexo: <select name="sexo">
     <option value="F">Femenino</option> 
    <option value="M">Masculino</option> 
    <option value="O">Otro</option> 
  </select>  
followers: <input type="text" name="followers"/> 
mail: <input type="text" name="mail"/>  
dirreccion: <input type="text" name="direccion"/>  
<select name="tipo">

    <option value="Y">youtube</option> 
    <option value="B">blog</option> 
    <option value="I">instagram</option> 
 <option value="W">Wordpress</option> 
</select>
<input type="submit" value="Comprobar el formulario"> 
   <input type="reset" value="borrar todo">
</form>
 <br>
 <table class="table table-striped">
  <thead>
    <tr>
      <th scope="row">Id</th>
      <th scope="col">nombre</th>
      <th scope="col">link</th>
      <th scope="col">tipo</th>
    </tr>
    <tbody>
    <td><a href="bloggers.php">Bloggers</a></td>
    <?
   

$sql = "SELECT id, nombre, link,tipo,sexo,followers FROM ad_blogger";

$result = $mysqli->query($sql);
;

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo '<tr><th scope="row"> ' . $row["id"]. " - <td> " . $row["nombre"]. " <td>" . $row["link"]. " <td>".$row["tipo"]."<br>";
    }
} else {
    echo "0 results";
}

?>

    
  </thead>
  </tbody>
</table>
<br>


</div>