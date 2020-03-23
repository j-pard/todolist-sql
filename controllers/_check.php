<?php
      

            require '_connect.php';

            $sql = ("
                  UPDATE tasks
                  SET archived = 1
                  WHERE id = ?
            ");

            $request = $db->prepare($sql);
            $id = $_POST['check'];
            $request->execute([$id]);

            header("Location: ../index.php");
      
?>