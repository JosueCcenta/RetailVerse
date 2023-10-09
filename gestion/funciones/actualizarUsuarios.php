<?php
    try {
        $columnas = ['id','nombre','apellido','usuario','contrasena','correoElectronico','idCargo'];
        $pdo = new PDO('mysql:host=localhost;dbname=test', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $campo=$_POST['campo'] ?? null;
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
        $consulta = "SELECT " . implode(", ", $columnas) . " FROM usuarios $where ";
        $stmt = $pdo->prepare($consulta);
        $stmt->execute();
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
        echo json_encode($html, JSON_UNESCAPED_UNICODE);
    } catch (PDOException $e) {

        echo "Error de conexión a la base de datos: " . $e->getMessage();
    }finally{
        $pdo=null;
    }
 



?>