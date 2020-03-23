<?php
      

            require '_connect.php';

            $sql = ("
                  UPDATE tasks
                  SET archived = 0
                  WHERE id = ?
            ");

            $request = $db->prepare($sql);
            $id = $_POST['restore'];
            $request->execute([$id]);

            header("Location: ../index.php");
      
?>