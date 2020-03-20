<?php
      require 'controllers/_connect.php';

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
                              <label for="title">Détails ?</label>
                              <textarea name="comment" maxlength="300" placeholder="N'oublie rien, même pas les # !"></textarea>
                        </div>
                        <div>
                              <label for="title">Pour quand ?</label>
                              <input type="date" name="endDate" id="dateInput">
                        </div>
                        <div>
                              <input type="checkbox" name="reminder">
                              <label for="reminder" class="small-label">Ne pas oublier</label>
                        </div>
                        <div>
                              <input type="submit" value="Ajouter">
                        </div>
                  </form>
            </section>

            <section id="currentTasksSection">
                  <h2>A faire</h2>
                  <ul id="currentList">

                  </ul>
            </section>

            <section id="archivedTasksSection">
                  <h2>Archives</h2>
                  <ul id="archivedList">

                  </ul>
            </section>
      </main>

      <footer class="wide"></footer>

      <script src="./assets/js/form.js"></script>
</body>
</html>