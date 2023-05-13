<?php
    function getNotes()
    {
        $conection = new Conecction(); //Objeto conexion
        $dbh = $conection->getConection(); //Conectamos a la base de datos
        try {
            $stmt = $dbh->prepare('SELECT * FROM notes');
            $stmt->execute();
        
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
        }
        
        return $result;
    }

    function addNote($title, $subject, $school_year, $price, $content, $user_id)
    {
        $conection = new Conecction(); //Objeto conexion
        $dbh = $conection->getConection(); //Conectamos a la base de datos
        try {
            $stmt = $dbh->prepare("INSERT INTO notes (title, subject, school_year, price, content, user_id) VALUES (:title, :subject, :school_year, :price, :content, :user_id)");
            $stmt->bindParam(':title', $title, PDO::PARAM_STR);
            $stmt->bindParam(':subject', $subject, PDO::PARAM_STR);
            $stmt->bindParam(':school_year', $school_year, PDO::PARAM_STR);
            $stmt->bindParam(':price', $price, PDO::PARAM_STR);
            $stmt->bindParam(':content', $content, PDO::PARAM_LOB);
            $stmt->bindParam(':user_id', $user_id, PDO::PARAM_LOB);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
        }
    }

    function deleteNote($id)
    {
        $conection = new Conecction(); //Objeto conexion
        $dbh = $conection->getConection(); //Conectamos a la base de datos
        try {
            $stmt = $dbh->prepare('DELETE FROM notes WHERE id=:id');
            $stmt->bindParam(':id', $id, PDO::PARAM_STR);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
        }
    }

    function getNotesByUserId($user_id)
    {
        $conection = new Conecction(); //Objeto conexion
        $dbh = $conection->getConection(); //Conectamos a la base de datos
        try {
            $stmt = $dbh->prepare('SELECT * FROM notes WHERE user_id=:user_id');
            $stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->rowCount();
        } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
        }
    }
?>