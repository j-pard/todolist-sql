<!DOCTYPE html>
<html lang="fr">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="../assets/css/style.css">
      <title>Ajout de tâche</title>
</head>
<body>
      <?php
            if(isset($_POST['title']) && !empty($_POST['title'])) {

                  function sanitize($input) {
                        $input = filter_var($input, FILTER_SANITIZE_STRING);
                        $input = trim($input); // Must have to trim AFTER sanitizing
                        return $input;
                  }

                  require '_connect.php';

                  // INIT
                  $date = getdate();
                  $today = date("Y-m-d");

                  $title = sanitize($_POST['title']);
                  $comment = sanitize($_POST['comment']);
                  $add_date = $today;

                  $values = [];
                  $sql = "";

                  if(isset($_POST['reminder']) && isset($_POST['endDate'])) { // TASK WITH END DATE
                        $reminder = sanitize($_POST['reminder']);
                        $end_date = sanitize($_POST['endDate']);

                        $values = [
                              $title,
                              $comment, 
                              $reminder,
                              $add_date,
                              $end_date
                        ];

                        $sql = ("
                                    INSERT INTO tasks
                                    (title, comment, reminder, add_date, end_date)
                                    VALUES
                                    (?, ?, ?, ?, ?)
                              ");
                  }

                  else { // TASK WITHOUT END DATE

                        $values = [
                              $title,
                              $comment, 
                              $add_date,
                        ];

                        $sql = ("
                                    INSERT INTO tasks
                                    (title, comment, add_date)
                                    VALUES
                                    (?, ?, ?)
                              ");
                  }

                  $request = $db->prepare($sql);
                  $request->execute($values);

                  header("Location: ../index.php");
            }
            else {
                  echo "<h1 class='warning'>Le titre de la tâche ne peut être vide !</h1>";
                  echo "<div><a class='return' href='../index.php'>Retour</a>";
            }   

      ?>
</body>
</html>