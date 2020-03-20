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
</body>
</html>