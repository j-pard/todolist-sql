<?php
      require 'controllers/_connect.php';

      $sqlActives = ("SELECT * FROM tasks WHERE archived = 0");
      $sqlArchived = ("SELECT * FROM tasks WHERE archived = 1");

      $activeTasks = $db->query($sqlActives);
      $archivedTasks = $db->query($sqlArchived);


      function createTask($data) {
            echo  "<tr class='task'>"
                  . "<td class='task-title'>"
                        . $data['title']
                  . "</td>"

                  . "<td class='task-actions'>"
                        . "X - X - X"
                  . "</td>"
            . "</tr>" 
            ."<tr class='task-secondary'>"
                  . "<td class='task-comment'>";
                        if($data['comment']) {
                              echo $data['comment'];
                        }
                  echo "</td>"
                  . "<td class='task-date'>"
                        . "<p class='task-addDate'>"
                              . $data['add_date']
                        ."</p>"
                        . "<p class='task-endDate'>"
                              . $data['end_date']
                        ."</p>"
                  . "</td>"
            . "</tr>";
      }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <link rel="stylesheet" href="./assets/css/style.css">
      <meta name="author" content="Jonathan PARDONS">
      <meta name="organization" content="BeCode">
      <script src="https://kit.fontawesome.com/126bbe9047.js" crossorigin="anonymous"></script>
      
      <title>Do It</title>
</head>
<body>

      <header class="wide">
            <h1>Do <span class='subtitle-lightgray'>sh</span><span class='subtitle-red'>It</span> Today</h1>
      </header>

      <main class="wide">
            <section id="addTaskSection">
                  <h2>Nouveau</h2>
                  <form action="controllers/_add.php" method="post">
                        <div>
                              <label for="title">Quoi ?</label>
                              <input type="text" name="title" placeholder="A quoi tu penses ?">
                        </div>
                        <div>
                              <label for="comment">Détails ?</label>
                              <textarea name="comment" maxlength="300" placeholder="N'oublie rien, même pas les # !"></textarea>
                        </div>
                        <div>
                              <input type="checkbox" name="reminder" id="reminder">
                              <label for="reminder" class="small-label">Deadline ?</label>
                        </div>
                        <div id="deadlineDiv" class="not-displayed">
                              <label for="endDate">Pour quand ?</label>
                              <input type="date" name="endDate" id="dateInput" disabled>
                        </div>
            
                        <div>
                              <input type="submit" value="Ajouter">
                        </div>
                  </form>
            </section>

            <section id="currentTasksSection">
                  <h2>A faire</h2>
                  <table id="currentList">

                        <?php
                              while($task = $activeTasks->fetch()) {
                                    createTask($task);
                              }
                              $activeTasks->closeCursor();
                        ?>

                  </table>
            </section>

            <section id="archivedTasksSection">
                  <h2>Archives</h2>
                  <table id="archivedList">

                        <?php
                              while($task = $archivedTasks->fetch()) {
                                    createTask($task);
                              }
                              $archivedTasks->closeCursor();
                        ?>

                  </table>
            </section>
      </main>

      <footer class="wide">

      </footer>

      <script src="./assets/js/form.js"></script>
</body>
</html>