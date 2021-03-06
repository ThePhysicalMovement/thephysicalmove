$( document ).ready(function() {
  $('button').off('click');

  if ($('#accordion')[0] != undefined) {
    accordion();
  }

  if (typeof(localStorage.username) != 'undefined'
    && typeof(localStorage.password) != 'undefined') {
      document.getElementById('login-user').value = localStorage.username;
      document.getElementById('login-password').value = localStorage.password;
      document.getElementById('remember-me').checked = true;
  }

  // Condition reCAPTCHA
  if ($('#signup-recaptcha').length) {
    setTimeout(function () {
      signupWidgetId = grecaptcha.render('signup-recaptcha', {
        'sitekey' : '6LeGtEIUAAAAALCBGcS43KmqgNuFhs0yyZxW5QSR',
        'callback' : onSubmitSignup,
        'size' : 'invisible',
        'badge' : 'inline'
      });
    }, 1000);
  }
  // FORM
  // if ($('#signup-recaptcha').length) {
  //   setTimeout(function () {
  //     signupWidgetId = grecaptcha.render('signup-recaptcha', {
  //       'sitekey' : '6LeGtEIUAAAAALCBGcS43KmqgNuFhs0yyZxW5QSR',
  //       'callback' : onSubmit,
  //       'size' : 'invisible',
  //       'badge' : 'inline'
  //     });
  //   }, 1000);
  // }


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

function authenticate(ev) {
  // Prevent form submission
  ev.preventDefault();

  // Verify if user want to be remembered and save the information in localStorage
  if (!document.getElementById('remember-me').checked) {
    localStorage.clear();
  }

  authenticateAjax();
}

function authenticateAjax() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      if (this.responseText == 'true') {
        // Verify if user want to be remembered and save the information in localStorage
        if (document.getElementById('remember-me').checked) {
          localStorage.username = document.getElementById('login-user').value;
          localStorage.password = document.getElementById('login-password').value;
        }

        window.location.reload();
      }
      else {
        document.getElementById('wrong-login').innerHTML = this.responseText;
      }
    }
  };
  xhttp.open("POST", "../php/authentication.php", true);
  xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  var username = document.getElementById('login-user').value;
  var password = document.getElementById('login-password').value;
  var str = 'login=true';
  str += '&user_name=' + encodeURIComponent(username);
  str += '&user_password=' + encodeURIComponent(password);

  // console.log(str);
  xhttp.send(str);
}

function register(ev) {
  ev.preventDefault();
  validation();
}

function validation() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      if (this.responseText == 'Success') {
        grecaptcha.execute();
      }
      else {
        document.getElementById('wrong-signup').style.color = '#C42420';
        document.getElementById('wrong-signup').innerHTML = this.responseText;
      }
    }
  };
  xhttp.open("POST", "../php/signupValidation.php", true);
  xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  var fullname = document.getElementById('signup-fullname').value;
  var username = document.getElementById('signup-username').value;
  var email = document.getElementById('signup-email').value;
  var phone = document.getElementById('signup-phone').value;
  var password = document.getElementById('signup-password').value;
  var passwordConfirm = document.getElementById('signup-password-confirm').value;
  var str = 'validate=true';
  str += '&user_fullname=' + encodeURIComponent(fullname);
  str += '&user_name=' + encodeURIComponent(username);
  str += '&user_email=' + encodeURIComponent(email);
  str += '&user_phone=' + encodeURIComponent(phone);
  str += '&user_password_new=' + encodeURIComponent(password);
  str += '&user_password_repeat=' + encodeURIComponent(passwordConfirm);

  xhttp.send(str);
}

function registerAjax(token) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      if (this.responseText.length >= 14 && this.responseText.substring(0, 15) == 'Congratulations') {
        // Success
        document.getElementById('wrong-signup').style.color = '#518005';
      }
      else {
        // Unsuccess
        document.getElementById('wrong-signup').style.color = '#C42420';
      }
      document.getElementById('wrong-signup').innerHTML = this.responseText;
    }
  };
  xhttp.open("POST", "../php/registration.php", true);
  xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  var fullname = document.getElementById('signup-fullname').value;
  var username = document.getElementById('signup-username').value;
  var email = document.getElementById('signup-email').value;
  var phone = document.getElementById('signup-phone').value;
  var password = document.getElementById('signup-password').value;
  var passwordConfirm = document.getElementById('signup-password-confirm').value;
  var str = 'register=true';
  str += '&user_fullname=' + encodeURIComponent(fullname);
  str += '&user_name=' + encodeURIComponent(username);
  str += '&user_email=' + encodeURIComponent(email);
  str += '&user_phone=' + encodeURIComponent(phone);
  str += '&user_password_new=' + encodeURIComponent(password);
  str += '&user_password_repeat=' + encodeURIComponent(passwordConfirm);
  str += '&response=' + encodeURIComponent(token);

  // console.log(str);
  xhttp.send(str);
}

function toggleModal(hideModalId, showModalId) {
  $(hideModalId).modal('hide');
  setTimeout(function () { $(showModalId).modal('show') }, 200);
}

function logout(ev) {
  ev.preventDefault();
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      var base = document.getElementsByTagName('base')[0];
      var redirectURL = base.href + 'homepage.php';
      window.location.replace(redirectURL);
    }
  };
  xhttp.open("POST", "../php/logout.php", true);
  xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  var str = 'logout=true';

  xhttp.send(str);
}

function toggleClass(classNameRemove, classNameAdd) {
  setTimeout(function () {
    $('.' + classNameRemove).toggleClass(classNameAdd);
    $('.' + classNameRemove).toggleClass(classNameRemove);
  }, 250);
}

function setFavorite(element, centreId) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      // console.log(this.responseText);
      var centreName = document.getElementById("centre-name");
      centreName = $.trim(centreName.textContent);
      var eventFun = element.onclick
      element.onclick = null;
      snackbar(centreName + " is now your favorite centre.");
      setTimeout(function () {
        element.onclick = eventFun;
      }, 4000);
    }
  };
  xhttp.open("GET", "../php/ajaxcalls.php?fun_name=setFavorite&centre_id=" + centreId, true);
  xhttp.send();

  toggleMouseEvent(element);

  element.onclick = function onclick(event) {
    unsetFavorite(element, centreId);
  }
}

function unsetFavorite(element, centreId) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      // console.log(this.responseText);
      var centreName = document.getElementById("centre-name");
      centreName = $.trim(centreName.textContent);
      var eventFun = element.onclick
      element.onclick = null;
      snackbar(centreName + " is no longer your favorite centre.");
      setTimeout(function () {
        element.onclick = eventFun;
      }, 4000);
    }
  };
  xhttp.open("GET", "../php/ajaxcalls.php?fun_name=unsetFavorite&centre_id=0", true);
  xhttp.send();

  toggleMouseEvent(element);

  element.onclick = function onclick(event) {
    setFavorite(element, centreId);
  }

  var sql = "UPDATE `users` SET `CommunityCentre_Id`= 0 WHERE `users`.`User_Id` = 1;"
}

function toggleMouseEvent(element) {
  console.log(element.onclick);
  var oldMouseoverFun = element.onmouseover;
  var oldMouseoutFun = element.onmouseout;

  element.onmouseover = oldMouseoutFun;
  element.onmouseout = oldMouseoverFun;
}

function snackbar(content) {
    var x = document.getElementById("snackbar");
    var centreName = document.getElementById("centre-name");
    x.textContent = content;
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 4000);
}
