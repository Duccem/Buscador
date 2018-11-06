<?php
     require_once('../conexion/connect.php');
     $search = '';
     if(isset($_POST['search'])){
          $search = $_POST['search'];
     }
     $consulta = "SELECT * FROM articulos WHERE articulo LIKE '%".$search."%' OR titulo LIKE '%".$search."%' ORDER BY visitas LIMIT 5" ;
     $resultado = $connect->query($consulta);
     $fila = mysqli_fetch_assoc($resultado);
     $total = mysqli_num_rows($resultado);
     if($total>0 & $search!=''){
          echo "<h2 class='center'>Resultados de la busqueda</h2>";
          do{
               echo "<div>";
               echo"<a id='busqueda' href='articulo.html?id=".$fila['id']."'?search='".$search."'>";
               echo "<h3>".str_replace($search,'<strong>'.$search.'</strong>',utf8_encode($fila['titulo']))."</h3>";
               echo "<p>".str_replace($search,'<strong>'.$search.'</strong>',substr(utf8_encode($fila['titulo']),0,150))."</p>";
               echo "<br><br>";
               echo "</a>";
               echo "</div>";
          }while($fila=mysqli_fetch_assoc($resultado));
     }else if($total>0 & $search==''){
          echo "<h2 class='center'>Ingrese una busqueda</h2>";
     }else{
          echo "<h2 class='center'>No se han encontrado resultados</h2>";
     }

 ?>
