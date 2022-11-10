const toggleButton = document.getElementById("side-nav-button");

toggleButton.addEventListener("click", function() {
    let sidebarWidth = document.getElementById("sidebar").offsetWidth;
    if(sidebarWidth == 0) {
        document.getElementById("sidebar").style.width = "300px";
        document.getElementById("main-section").style.marginLeft = "calc(300px + 1em)";
        document.getElementById("header-bg").style.marginLeft = "300px";
    }
    else {
        document.getElementById("sidebar").style.width = "0";
        document.getElementById("main-section").style.marginLeft = "1em";
        document.getElementById("header-bg").style.marginLeft = "0";
    }
});

function openForm() {
    document.getElementById("myForm").style.display = "block";

  }
  
  function closeForm() {
    document.getElementById("myForm").style.display = "none";
  }

  function addData(el) {
    var table = document.getElementById('list');
    var tr = table.insertRow();
    el.form.querySelectorAll('input').forEach(function(el) {
      var cell = tr.appendChild(document.createElement('td'));
      cell.textContent = el.value;
    });
  }

  $(document).ready(function () {

    $.getJSON('https://reqres.in/api/users', function (data) {

    console.log(data.data);
      var employee_data = '';
      localStorage.setItem(emp,JSON.stringify(each) )

      $.each(data.data, function (key, value) {
        // console.log(value);
        // console.log(key)
        employee_data += '<tr>';

        employee_data += '<td>' + data.id + '</td>';

        employee_data += '<td>' + data.email + '</td>';

        employee_data += '<td>' + data.first_name + '</td>';

        employee_data += '<td>' + data.last_name + '</td>';

        employee_data += '<td>' + data.avatar + '</td>';

        employee_data += '</tr>';



      });

      console.log(employee_data);
    });

     $('#employee_table').append(employee_data);

  });



