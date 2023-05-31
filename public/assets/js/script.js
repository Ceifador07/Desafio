//* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
  });
} 


function toggleSidebar(){
  document.getElementById("sidebar").classList.toggle('active');
  }

  function startTime()
      {
      var today=new Date();
      var h=today.getHours();
      var m=today.getMinutes();
      var s=today.getSeconds();
      // adicione um zero na frente de números<10
      m=checkTime(m);
      s=checkTime(s);
      document.getElementById('txt').innerHTML=h+":"+m+":"+s;
      t=setTimeout('startTime()',500);
      }
      function checkTime(i)
      {
      if (i<10)
      {
      i="0" + i;
      }
      return i;
      }