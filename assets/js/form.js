const dateInput = document.getElementById("dateInput");
const remindInput = document.getElementById("reminder");
const deadlineDiv = document.getElementById("deadlineDiv");

let today;

// Today is the default date value
const getDate = () => {
      const fullDate = new Date();
      const year = fullDate.getFullYear();
      let month = (fullDate.getMonth() +1);
      if (month < 10) {
            month = "0" + month;
      }

      let day = fullDate.getDate();
      if (day < 10) {
            day = "0" + day;
      }

      today = year + "-" + month + "-" + day; 
      
      dateInput.setAttribute("value", today);
}

getDate();

// Deadline menu
remindInput.addEventListener("click", () => {
      if(remindInput.checked) {
            deadlineDiv.classList.remove("not-displayed");
            dateInput.removeAttribute("disabled");
      }
      else {
            deadlineDiv.classList.add("not-displayed");
            dateInput.setAttribute("disabled", true);
      }
});

// Check deadline for actives tasks

const tasksList = currentTasksSection.querySelectorAll(".task");

tasksList.forEach(task => {
      if(task.querySelector(".endDate")) {
            let endDate = task.querySelector(".endDate").textContent;
                  if(endDate <= today) {
                        task.classList.add("urgent");
                  }
                  else {
                        task.classList.remove("urgent");
                  }
      }
            
});

//console.log(task.querySelector(".endDate").textContent);