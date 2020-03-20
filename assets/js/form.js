const dateInput = document.getElementById("dateInput");


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

      const today = year + "-" + month + "-" + day; 
      
      dateInput.setAttribute("value", today);
}

getDate();