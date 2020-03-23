const sectionBtns = [
      newBtn =  document.getElementById("newTitle"),
      activesBtn  = document.getElementById("activesTitle"),
      archivesBtn = document.getElementById("archivesTitle")
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
                        addTaskSection.classList.toggle("retracted");
                        break;
                  case "activesTitle" :
                        currentTasksSection.classList.toggle("retracted");
                        break;
                  case "archivesTitle":
                        archivedTasksSection.classList.toggle("retracted");
                        break;
            }
      })
});
