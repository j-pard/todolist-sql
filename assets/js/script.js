const sectionBtns = [
      newBtn =  document.getElementById("newTitle"),
      dropNew = document.getElementById("dropNew"),
      activesBtn  = document.getElementById("activesTitle"),
      dropActives = document.getElementById("dropActives"),
      archivesBtn = document.getElementById("archivesTitle"),
      dropArchived = document.getElementById("dropArchived")
]

const sections = [
      addTaskSection = document.getElementById("addTaskSection"),
      currentTasksSection = document.getElementById("currentTasksSection"),
      archivedTasksSection = document.getElementById("archivedTasksSection")
]

sectionBtns.forEach(button => {
      button.addEventListener("click", () => {
            switch (button.id){
                  case "newTitle" :
                  case "dropNew":
                        addTaskSection.classList.toggle("retracted");
                        break;
                  case "activesTitle" :
                  case "dropActives" :
                        currentTasksSection.classList.toggle("retracted");
                        break;
                  case "archivesTitle":
                  case "dropArchived" :
                        archivedTasksSection.classList.toggle("retracted");
                        break;
            }
      })
});
