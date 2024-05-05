<?php
require_once('Database.php');

class Masaje {
    public static function get_all_masajes() {
        $database = new Database();
        $conn = $database->getConnection();

        $stmt = $conn->prepare('SELECT * FROM masaje');

        
        if ($stmt->execute()) {
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC); 
            header('Content-Type: application/json');
            echo json_encode($result);
            header('HTTP/1.1 201 Consulta exitosa a la tabla Masaje OK');
        } else {
            header('HTTP/1.1 404 No se ha podido consultar con la lista masajes');
        }
    }

    public static function create_masaje($nombre, $descripcion, $duracion, $precio) {
        $database = new Database();
        $conn = $database->getConnection();

        $stmt = $conn->prepare('INSERT INTO masaje (nombre, descripcion, duracion, precio) VALUES (:nombre, :descripcion, :duracion, :precio)');
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->bindParam(':duracion', $duracion);
        $stmt->bindParam(':precio', $precio);

        if ($stmt->execute()) {
             // Obtener el nuevo masaje insertado
            $stmt = $conn->prepare('SELECT * FROM masaje WHERE id = LAST_INSERT_ID()');
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            header('Content-Type: application/json');
            echo json_encode($result);
            header('HTTP/1.1 201 Consulta creada con éxito OK');
        } else {
            header('HTTP/1.1 404 No se ha podido dar la consulta con la lista masajes');
        }
    }

    public static function delete_masaje($id) {
        $database = new Database();
        $conn = $database->getConnection();

        $stmt = $conn->prepare('DELETE FROM masaje WHERE id=:id');
        $stmt->bindParam(':id', $id);
        if ($stmt->execute()) {
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            header('Content-Type: application/json');
            echo json_encode($result);
            header('HTTP/1.1 201 Consulta borrada con éxito OK');
            echo json_encode(array("id" => $id)); 
        } else {
            header('HTTP/1.1 404 No se ha podido borrar la consulta con la lista masajes');
        }
    }

    public static function get_id_masaje($id){
            $database = new Database();
            $conn = $database->getConnection();
        
            $stmt = $conn->prepare('SELECT * FROM masaje WHERE id = :id');
            $stmt->bindParam(':id',$id);
            
        
            if ($stmt->execute()) {
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                header('Content-Type: application/json');
                header('HTTP/1.1 202 ok');
                echo json_encode($result);
                return json_encode($result);
            } else {
                header('HTTP/1.1 401 fallo');
                echo "Error en el listado";
            }
        }

    public static function update_masaje($id, $nombre, $descripcion, $duracion, $precio) {
        $database = new Database();
        $conn = $database->getConnection();

        $stmt = $conn->prepare('UPDATE masaje SET nombre=:nombre, descripcion=:descripcion, duracion=:duracion, precio=:precio WHERE id=:id');
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->bindParam(':duracion', $duracion);
        $stmt->bindParam(':precio', $precio);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            // Obtener los datos actualizados del masaje
            $stmt = $conn->prepare('SELECT * FROM masaje WHERE id = :id');
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            header('Content-Type: application/json');
            echo json_encode($result);
            header('HTTP/1.1 201 Consulta Actualizada correctamente');
        } else {
            header('HTTP/1.1 204 La consulta no se pudo Actualizar');
        }
    }
}
?>
