<?php
      

            require '_connect.php';

            $sql = ("
                  DELETE FROM tasks
                  WHERE id = ?
            ");

            $request = $db->prepare($sql);
            $id = $_POST['delete'];
            $request->execute([$id]);

            header("Location: ../index.php");
      
?>