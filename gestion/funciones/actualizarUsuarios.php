<?php
    try {
        $columnas = ['id','nombre','apellido','usuario','contrasena','correoElectronico','idCargo'];
        $pdo = new PDO('mysql:host=localhost;dbname=test', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $campo=$_POST['campo'] ?? null;
        /* El bloque de código está construyendo una cláusula WHERE para la consulta SQL basada en el valor de la propiedad
        '' where. */
        $where="";
        if($campo!=null){
            $where="WHERE (";
            $cont = count($columnas);
            for($i=0;$i<$cont;$i++){
                $where .=$columnas[$i] . " LIKE '%". $campo . "%' OR ";
            }
            $where = substr_replace($where,"",-3);
            $where .= ")";
        }
        /* El código está preparando y ejecutando una consulta SQL para seleccionar datos de la tabla "productos" en
       la base de datos. */
        $consulta = "SELECT " . implode(", ", $columnas) . " FROM usuarios $where ";
        $stmt = $pdo->prepare($consulta);
        $stmt->execute();
       /* El bloque de código está construyendo una tabla HTML iterando sobre el conjunto de resultados obtenido de
       la consulta de la base de datos. */ 
        $html="";
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $html .= '<tr>';
            $html .= '<td>' .$row['id'] .'</td>';
            $html .= '<td>' .$row['nombre'] .'</td>';
            $html .= '<td>' .$row['apellido'] .'</td>';
            $html .= '<td>' .$row['usuario'] .'</td>';
            $html .= '<td>' .$row['contrasena'] .'</td>';
            $html .= '<td>' .$row['correoElectronico'] .'</td>';
            $html .= '<td>' .$row['idCargo'] .'</td>';
            $html .= '</tr>';
        }
        if (!$stmt->rowCount()) {
            $html .='<tr>';
            $html .= '<td colspan="7">Sin Resultados</td>';
            $html .= '</tr>';
        }
        /* La función 'json_encode()' se utiliza para convertir la variable 'html', que contiene la tabla HTML
        data, en una cadena JSON. El indicador 'JSON_UNESCAPED_UNICODE' se utiliza para garantizar que cualquier Unicode
        Los caracteres en el HTML no se escapan y se representan tal como están en la cadena JSON. */
        echo json_encode($html, JSON_UNESCAPED_UNICODE);
    } catch (PDOException $e) {

        echo "Error de conexión a la base de datos: " . $e->getMessage();
    }finally{
        $pdo=null;
    }
 



?>