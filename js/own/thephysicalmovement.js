$( document ).ready(function() {
  $('button').off('click');

  if ($('#accordion')[0] != undefined) {
    accordion();
  }
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

function accordion() {
  var fun = function() {
    $('#accordion .btn-accordion').each(function() {
      var classList = $(this).attr('class').split(/\s+/);
      var found = false;
      for (var i = 0; i < classList.length; i++) {
        if (classList[i] == 'collapsed') {
          $(this).find('.fa').removeClass('fa-caret-up');
          $(this).find('.fa').addClass('fa-caret-down');
          found = true;
          break;
        }
      }
      if (!found) {
        $(this).find('.fa').removeClass('fa-caret-down');
        $(this).find('.fa').addClass('fa-caret-up');
      }
    })
  }

  $('#accordion .btn-accordion').on('click', function() {
    window.setTimeout(fun, 0);
  });
}
