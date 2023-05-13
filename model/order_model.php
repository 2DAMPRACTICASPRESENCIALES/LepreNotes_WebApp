<?php
    function getOrdersByUserId($user_id, $note_id)
    {
        $conection = new Conecction(); //Objeto conexion
        $dbh = $conection->getConection(); //Conectamos a la base de datos
        try {
            $stmt = $dbh->prepare('SELECT * FROM orders WHERE user_id=:user_id AND note_id=:note_id');
            
            $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $stmt->bindParam(':note_id', $note_id, PDO::PARAM_INT);
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $row = $stmt->rowCount(); //Contamos numero de filas que devuelve la consulta
            if ($row > 0) {
                return true;
            }
        } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
        }
        
        return false;
    }

    function addOrder($user_id, $note_id)
    {
        $conection = new Conecction(); //Objeto conexion
        $dbh = $conection->getConection(); //Conectamos a la base de datos
        try {
            $prefijo = 'COD';
            $code = $prefijo . uniqid();

            $orderDate = date('Y-m-d');

            $stmt = $dbh->prepare("INSERT INTO orders (code, order_date, user_id, note_id) VALUES (:code, :order_date, :user_id, :note_id)");
            $stmt->bindParam(':code', $code, PDO::PARAM_STR);
            $stmt->bindParam(':order_date', $orderDate, PDO::PARAM_STR);
            $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $stmt->bindParam(':note_id', $note_id, PDO::PARAM_INT);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
        }
    }