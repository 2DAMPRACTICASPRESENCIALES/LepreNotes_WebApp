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

    function addNote($title, $subject, $school_year, $price, $content)
    {
        $conection = new Conecction(); //Objeto conexion
        $dbh = $conection->getConection(); //Conectamos a la base de datos
        try {
            $stmt = $dbh->prepare("INSERT INTO notes (title, subject, school_year, price, content) VALUES (:title, :subject, :school_year, :price, :content)");
            $stmt->bindParam(':title', $title, PDO::PARAM_STR);
            $stmt->bindParam(':subject', $subject, PDO::PARAM_STR);
            $stmt->bindParam(':school_year', $school_year, PDO::PARAM_STR);
            $stmt->bindParam(':price', $price, PDO::PARAM_STR);
            $stmt->bindParam(':content', $content, PDO::PARAM_LOB);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
        }
    }
?>