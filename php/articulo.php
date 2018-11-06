<?php require_once('../conexion/connect.php') ?>
<?php
     $search = '';
     if(isset($_GET['search'])){
          $search = $_GET['search'];
     }
     $id = '';
     if(isset($_GET['id'])){
          $id = $_GET['id'];
     }
     $consulta = "SELECT * FROM articulos WHERE id=".$id ;
     $resultado = $connect->query($consulta);
     $fila = mysqli_fetch_assoc($resultado);
     $total = mysqli_num_rows($resultado);
     echo "<div id='articulo'>";
     echo "<h1>".utf8_encode($fila['titulo'])."</h1>";
     echo "<p>".utf8_encode($fila['articulo'])."</p>";
     echo "</div>";
?>
