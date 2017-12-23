$( document ).ready(function() {
  $('button').off('click');
});


function filterTable(input, table) {
    var filter, tr, td, i, j;
    filter = input.value.toUpperCase();
    tr = table.getElementsByTagName('tr');

    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName('td');
      for (j = 0; j < td.length; j++) {
        if (td[j] && td[j].innerHTML.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
          break;
        }
        else {
          tr[i].style.display = "none";
        }
      }
    }
}
