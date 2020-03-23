<?php
      require 'controllers/_connect.php';

      $sqlActives = ("SELECT * FROM tasks WHERE archived = 0 ORDER BY id DESC");
      $sqlArchived = ("SELECT * FROM tasks WHERE archived = 1");

      $activeTasks = $db->query($sqlActives);
      $archivedTasks = $db->query($sqlArchived);


      function createTask($data, $actions) {
            echo  "<li class='task'>";
                  // ROW TOP
                  echo "<div class='task-top row'>"
                        . "<div class='title-cont'>"
                              . "<h4>"
                                    . $data['title']
                              . "</h4>"
                        . "</div>";

                        // Buttons config
                        if($actions == "active") {
                              echo  "<form action='controllers/_check.php' method='POST' class='actions-form'>"
                                          //. "<button type='submit' name='edit' value=" . $data['id'] . "><i class='fas fa-edit edit-btn'></i></button>"
                                          . "<button type='submit' name='check' value=" . $data['id'] . "><i class='fas fa-check check-btn'></i></i></button>"
                                    . "</form>";
                        }
                        else if ($actions == "archived") {
                              echo  "<form action='controllers/_restore.php' method='POST' class='actions-form'>"
                                    . "<button type='submit' name='restore' value=" . $data['id'] . "><i class='fas fa-angle-double-up restore-btn'></i></button>"
                                    . "</form>";

                              echo  "<form action='controllers/_delete.php' method='POST' class='actions-form'>"
                                          . "<button type='submit' name='delete' value=" . $data['id'] . "><i class='fas fa-times delete-btn'></i></button>"
                                    . "</form>";
                        }
                        else {
                              echo "<p class:'error'>Uuuuh ...</p>";
                        }

                  echo "</div>";

                  // ROW BOTTOM
                  echo "<div class='task-bottom row'>";
                        echo  "<div class='task-comment'>";
                              if($data['comment']) {
                                    echo $data['comment'];
                              }
                        echo  "</div>";
                  
                        echo  "<div class='task-date'>"
                                    . "<p class='task-date'>"
                                          . $data['add_date'];
                                          if(isset($data['end_date'])) {
                                                echo " - " . $data['end_date'];
                                          }
                                    echo "</p>"
                              . "</div>"
                  . "</div>"
            . "</li>";
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
                  <div class="h2row">
                        <h2 id="newTitle" class="sectionTitle">Nouvelle tâche</h2>
                        <i class="fas fa-sort-down afterH2"></i>
                  </div>
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
                              <label for="reminder" class="small-label"> Deadline ?</label>
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
                  <div class="h2row">
                        <h2 id="activesTitle" class="sectionTitle">A faire</h2>
                        <i class="fas fa-sort-down afterH2"></i>
                  </div>
                  <ul id="currentList" class='tasksList'>

                        <?php
                              while($task = $activeTasks->fetch()) {
                                    createTask($task, "active");
                              }
                              $activeTasks->closeCursor();
                        ?>

                  </ul>
            </section>

            <section id="archivedTasksSection" class="retracted">
                  <div class="h2row">
                        <h2 id="archivesTitle" class="sectionTitle">Archives</h2>
                        <i class="fas fa-sort-down afterH2"></i>
                  </div>
                  <ul id="archivedList" class='tasksList'>

                        <?php
                              while($task = $archivedTasks->fetch()) {
                                    createTask($task, "archived");
                              }
                              $archivedTasks->closeCursor();
                        ?>

                  </ul>
            </section>
      </main>

      <footer class="wide">

      </footer>

      <script src="./assets/js/script.js"></script>
      <script src="./assets/js/form.js"></script>
</body>
</html>