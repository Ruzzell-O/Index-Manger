function pagination (totalpages, currentpage) {
  var pagelist = '';
  if (totalpages > 1) {
    currentpage = parseInt (currentpage);
    pagelist += `<ul class="pagination justify-content-center">`;
    const prevClass = currentpage == 1 ? ' disabled' : '';
    pagelist += `<li class="page-item${prevClass}"><a class="page-link" href="#" data-page="${currentpage - 1}">Previous</a></li>`;
    for (let p = 1; p <= totalpages; p++) {
      const activeClass = currentpage == p ? ' active' : '';
      pagelist += `<li class="page-item${activeClass}"><a class="page-link" href="#" data-page="${p}">${p}</a></li>`;
    }
    const nextClass = currentpage == totalpages ? ' disabled' : '';
    pagelist += `<li class="page-item${nextClass}"><a class="page-link" href="#" data-page="${currentpage + 1}">Next</a></li>`;
    pagelist += `</ul>`;
  }

  $ ('#pagination').html (pagelist);
}

function getplayerrow (player) {
  var playerRow = '';
  if (player) {
    const userphoto = player.photo ? player.photo : 'default.png';
    const userdocument = player.document ? player.document : 'default.pdf';
    playerRow = `<tr>
          <td class="align-middle"><img src="uploads/${userphoto}" class="img-thumbnail rounded float-left"></td>
          <td class="align-middle">${player.pname}</td>
          <td class="align-middle">${player.occupation}</td>
          <td class="align-middle">${player.email}</td>
          <td class="align-middle">${player.phone}</td>
          <td class="align-middle"><a href="documents/${userdocument}">View Documents</a></td>
          <td class="align-middle">${player.date}</td>
          <td class="align-middle">
            <a href="#" class="btn btn-success mr-3 profile" data-toggle="modal" data-target="#userViewModal"
              title="Profile" data-id="${player.id}"><i class="fa fa-address-card-o" aria-hidden="true"></i></a>
            <a href="#" class="btn btn-warning mr-3 edituser" data-toggle="modal" data-target="#userModal"
              title="Edit" data-id="${player.id}"><i class="fa fa-pencil-square-o fa-lg"></i></a>
            <a href="#" class="btn btn-danger deleteuser" data-userid="14" title="Delete" data-id="${player.id}"><i
                class="fa fa-trash-o fa-lg"></i></a>
          </td>
        </tr>`;
  }
  return playerRow;
}

function getplayers () {
  var pageno = $ ('#currentpage').val ();
  $.ajax ({
    url: '/Group5X/ajax.php',
    type: 'GET',
    dataType: 'json',
    data: {page: pageno, action: 'getusers'},
    beforeSend: function () {
      $ ('#overlay').fadeIn ();
    },
    success: function (rows) {
      console.log (rows);
      if (rows.players) {
        var playerslist = '';
        $.each (rows.players, function (index, player) {
          playerslist += getplayerrow (player);
        });
        $ ('#userstable tbody').html (playerslist);
        let totalPlayers = rows.count;
        let totalpages = Math.ceil (parseInt (totalPlayers) / 6);
        const currentpage = $ ('#currentpage').val ();
        pagination (totalpages, currentpage);
        $ ('#overlay').fadeOut ();
      }
    },
    error: function () {
      console.log ('something went wrong');
    },
  });
}

$ (document).ready (function () {
  $ (document).on ('submit', '#addform', function (event) {
    event.preventDefault ();
    var alertmsg = $ ('#userid').val ().length > 0
      ? 'Applicant has been updated Successfully!'
      : 'New Applicant has been added Successfully!';
    $.ajax ({
      url: '/Group5X/ajax.php',
      type: 'POST',
      dataType: 'json',
      data: new FormData (this),
      processData: false,
      contentType: false,
      beforeSend: function () {
        $ ('#overlay').fadeIn ();
      },
      success: function (response) {
        console.log (response);
        if (response) {
          $ ('#addform')[0].reset ();
          $ ('.messages').html(alertmsg).fadeIn().delay(2000).fadeOut();
          getplayers();
          $ ('#overlay').fadeOut ();
        }
      },
      error: function () {
        console.log ('Oops! Something went wrong!');
      },
    });
  });

  $ (document).on ('submit', '#addforms', function (event) {
    event.preventDefault ();
    var alertmsg = $ ('#userid').val ().length > 0
      ? 'Applicant has been updated Successfully!'
      : 'New Applicant has been added Successfully!';
    $.ajax ({
      url: '/Group5X/ajax.php',
      type: 'POST',
      dataType: 'json',
      data: new FormData (this),
      processData: false,
      contentType: false,
      beforeSend: function () {
        $ ('#overlay').fadeIn ();
      },
      success: function (response) {
        console.log (response);
        if (response) {
          $ ('#userModal').modal ('hide');
          $ ('#addforms')[0].reset ();
          $ ('.messages').html(alertmsg).fadeIn().delay(2000).fadeOut();
          getplayers();
          response.redirect = "index.php"
          window.location.href = response.redirect;
          $ ('#overlay').fadeOut ();
        }
      },
      error: function () {
        console.log ('Oops! Something went wrong!');
      },
    });
  });
  
  

  $ (document).on ('click', 'ul.pagination li a', function (e) {
    e.preventDefault ();
    var $this = $ (this);
    const pagenum = $this.data ('page');
    $ ('#currentpage').val (pagenum);
    getplayers ();
    $this.parent ().siblings ().removeClass ('active');
    $this.parent ().addClass ('active');
  });
  $ ('#addnewbtn').on ('click', function () {
    $ ('#addform')[0].reset ();
    $ ('#userid').val ('');
  });

  $ (document).on ('click', 'a.edituser', function () {
    var pid = $ (this).data ('id');
    $.ajax ({
      url: '/Group5X/ajax.php',
      type: 'GET',
      dataType: 'json',
      data: {id: pid, action: 'getuser'},
      beforeSend: function () {
        $ ('#overlay').fadeIn ();
      },
      success: function (player) {
        if (player) {
          $ ('#username').val (player.pname);
          $ ('#occupation').val (player.occupation);
          $ ('#gender').val (player.gender);
          $ ('#email').val (player.email);
          $ ('#phone').val (player.phone);
          $ ('#address').val (player.address);
          $ ('#city').val (player.city);
          $ ('#zip').val (player.zipcode);
          $ ('#birth').val (player.birthdate);
          $ ('input:radio[name=civilstatus]').map (function (index, item) {
            if (item.value == player.civilstatus) {
              $ (item).attr ('checked', 'checked');
            }
          });
          $ ('#citizenship').val (player.citizenship);
          $ ('#religion').val (player.religion);
          $ ('#sss').val (player.sssidno);
          $ ('#umid').val (player.umidno);
          $ ('#gsis').val (player.gsis);
          $ ('#pagibig').val (player.pagibig);
          $ ('#philhealth').val (player.philhealth);
          $ ('#date').val (player.date);
          $ ('#userid').val (player.id);
        }
        $ ('#overlay').fadeOut ();
      },
      error: function () {
        console.log ('something went wrong');
      },
    });
  });

  $ (document).on ('click', 'a.deleteuser', function (e) {
    e.preventDefault ();
    var pid = $ (this).data ('id');
    if (confirm ('Are you sure want to delete this?')) {
      $.ajax ({
        url: '/Group5X/ajax.php',
        type: 'GET',
        dataType: 'json',
        data: {id: pid, action: 'deleteuser'},
        beforeSend: function () {
          $ ('#overlay').fadeIn ();
        },
        success: function (res) {
          if (res.deleted == 1) {
            $ ('.message')
              .html ('Player has been deleted successfully!')
              .fadeIn ()
              .delay (3000)
              .fadeOut ();
            getplayers ();
            $ ('#overlay').fadeOut ();
          }
        },
        error: function () {
          console.log ('something went wrong');
        },
      });
    }
  });

  $ (document).on ('click', 'a.profile', function () {
    var pid = $ (this).data ('id');
    $.ajax ({
      url: '/Group5X/ajax.php',
      type: 'GET',
      dataType: 'json',
      data: {id: pid, action: 'getuser'},
      success: function (player) {
        if (player) {
          const userphoto = player.photo ? player.photo : 'default.png';
          const userdocument = player.document
            ? player.document
            : 'default.pdf';
          const profile = `<div class="row">
                <div class="col-sm-6 col-md-4">
                  <img src="uploads/${userphoto}" class="rounded responsive" />
                </div>
                <div class="col-sm-6 col-md-8">
                  <h4 class="text-primary">${player.pname}</h4>
                  <h4 class="text-primary">${player.occupation}</h4>
                  <a href="documents/${userdocument}">View Applicant's Document</a>
                  <p class="text-secondary">
                    <i class="fa fa-calendar-o" aria-hidden="true"></i> ${player.date}
                    <br/>
                    <i class="fa fa-genderless" aria-hidden="true"></i> ${player.gender}
                    <br/>
                    <i class="fa fa-envelope-o" aria-hidden="true"></i> ${player.email}
                    <br/>
                    <i class="fa fa-phone" aria-hidden="true"></i> ${player.phone}
                    <br/>
                    <i class="fa fa-address-book" aria-hidden="true"></i> ${player.address}
                    <br/>
                    <i class="fa fa-building" aria-hidden="true"></i> ${player.city}
                    <br/>
                    <i class="fa fa-address-card" aria-hidden="true"></i> ${player.zipcode}
                    <br/>
                    <i class="fa fa-birthday-cake" aria-hidden="true"></i> ${player.birthdate}
                    <br/>
                    <i class="fa fa-user" aria-hidden="true"></i> ${player.civilstatus}
                    <br/>
                    <i class="fa fa-flag" aria-hidden="true"></i> ${player.citizenship}
                    <br/>
                    <i class="fa fa-book" aria-hidden="true"></i> ${player.religion}
                    <br/>
                    <i class="fa fa-id-card-o" aria-hidden="true"></i> ${player.sssidno}
                    <br/>
                    <i class="fa fa-id-card" aria-hidden="true"></i> ${player.umidno}
                    <br/>
                    <i class="fa fa-id-card" aria-hidden="true"></i> ${player.gsis}
                    <br/>
                    <i class="fa fa-id-card" aria-hidden="true"></i> ${player.pagibig}
                    <br/>
                    <i class="fa fa-id-card" aria-hidden="true"></i> ${player.philhealth}
                  </p>
                </div>
              </div>`;
          $ ('#profile').html (profile);
        }
      },
      error: function () {
        console.log ('something went wrong');
      },
    });
  });

  $ ('#searchinput').on ('keyup', function () {
    const searchText = $ (this).val ();
    if (searchText.length > 1) {
      $.ajax ({
        url: '/Group5X/ajax.php',
        type: 'GET',
        dataType: 'json',
        data: {searchQuery: searchText, action: 'search'},
        success: function (players) {
          if (players) {
            var playerslist = '';
            $.each (players, function (index, player) {
              playerslist += getplayerrow (player);
            });
            $ ('#userstable tbody').html (playerslist);
            $ ('#pagination').hide ();
          }
        },
        error: function () {
          console.log ('something went wrong');
        },
      });
    } else {
      getplayers ();
      $ ('#pagination').show ();
    }
  });
  getplayers ();
});

//nav and dark mode
$ (function () {
    const body = document.querySelector ('body'),
    sidebar = body.querySelector ('nav'),
    toggle = body.querySelector ('.toggle'),
    searchBtn = body.querySelector ('.search-box'),
    modeSwitch = body.querySelector ('.toggle-switch'),
    modeText = body.querySelector ('.mode-text');

  toggle.addEventListener ('click', () => {
    sidebar.classList.toggle ('close');

    if (sidebar.classList.contains ('close')) {
      localStorage.setItem ('collapsed', 'on');
    } else {
      localStorage.setItem ('collapsed', 'off');
    }
  });

  if (localStorage.getItem ('collapsed') == 'off') {
    sidebar.classList.remove ('close');
  }

  // searchBtn.addEventListener("click" , () =>{
  //     document.sidebar.classList.remove("close");
  // })

  modeSwitch.addEventListener ('click', () => {
    body.classList.toggle ('dark');

    if (body.classList.contains ('dark')) {
      modeText.innerText = 'Light mode';
      localStorage.setItem ('darkMode', 'enabled');
    } else {
      modeText.innerText = 'Dark mode';
      localStorage.setItem ('darkMode', 'disabled');
    }
  });

  if (localStorage.getItem ('darkMode') == 'enabled') {
    document.body.classList.toggle ('dark');
  }
});

//shadow for title div
$ (document).ready (function () {
  window.addEventListener ('scroll', e => {
    const nav = document.querySelector ('.titles');
    if (window.pageYOffset > 0) {
      nav.classList.add ('add-shadow');
    } else {
      nav.classList.remove ('add-shadow');
    }
  });
});

//animation for text

function reveal () {
  var reveals = document.querySelectorAll ('.reveal');

  for (var i = 0; i < reveals.length; i++) {
    var windowHeight = window.innerHeight;
    var elementTop = reveals[i].getBoundingClientRect ().top;
    var elementVisible = 150;

    if (elementTop < windowHeight - elementVisible) {
      reveals[i].classList.add ('active');
    } else {
      reveals[i].classList.remove ('active');
    }
  }
}

window.addEventListener ('scroll', reveal);

$ (function () {
  var minloadingtime = 100;
  var maxloadingtime = 3000;

  var startTime = new Date ();
  var elapsedTime;
  var dismissonloadfunc, maxloadingtimer;

  window.addEventListener (
    'load',
    (dismissonloadfunc = function () {
      // when page loads
      clearTimeout (maxloadingtimer); // cancel dismissal of transition after maxloadingtime time
      elapsedTime = new Date () - startTime; // get time elapsed once page has loaded
      var hidepageloadertimer = elapsedTime > minloadingtime
        ? 0
        : minloadingtime - elapsedTime;

      setTimeout (function () {
        document.getElementById ('pageloader').classList.add ('dimissloader'); // dismiss transition
      }, hidepageloadertimer);
    }),
    false
  );

  maxloadingtimer = setTimeout (function () {
    // force dismissal of page transition after maxloadingtime time
    window.removeEventListener ('load', dismissonloadfunc, false); // cancel onload event function call
    document.getElementById ('pageloader').classList.add ('dimissloader'); // dismiss transition
  }, maxloadingtime);
});

$ (function () {
  var animation = false,
    animationstring = 'animation',
    keyframeprefix = '',
    domPrefixes = 'Webkit Moz O ms Khtml'.split (' '),
    pfx = '',
    elm = document.createElement ('div');

  if (elm.style.animationName !== undefined) {
    animation = true;
  }

  if (animation === false) {
    for (var i = 0; i < domPrefixes.length; i++) {
      if (elm.style[domPrefixes[i] + 'AnimationName'] !== undefined) {
        pfx = domPrefixes[i];
        animationstring = pfx + 'Animation';
        keyframeprefix = '-' + pfx.toLowerCase () + '-';
        animation = true;
        break;
      }
    }
  }

  var minloadingtime = 100;
  var maxloadingtime = 3000;

  var startTime = new Date ();
  var elapsedTime;
  var dismissonloadfunc, maxloadingtimer;

  if (
    animation &&
    document.documentElement &&
    document.documentElement.classList
  ) {
    document.documentElement.classList.add ('hidescrollbar');

    window.addEventListener (
      'load',
      (dismissonloadfunc = function () {
        // when page loads
        clearTimeout (maxloadingtimer); // cancel dismissal of transition after maxloadingtime time
        elapsedTime = new Date () - startTime; // get time elapsed once page has loaded
        var hidepageloadertimer = elapsedTime > minloadingtime
          ? 0
          : minloadingtime - elapsedTime;

        setTimeout (function () {
          document.getElementById ('pageloader').classList.add ('dimissloader'); // dismiss transition
        }, hidepageloadertimer);

        setTimeout (function () {
          document.documentElement.classList.remove ('hidescrollbar');
        }, hidepageloadertimer + 100); // 100 is the duration of the fade out effect
      }),
      false
    );

    maxloadingtimer = setTimeout (function () {
      // force dismissal of page transition after maxloadingtime time
      window.removeEventListener ('load', dismissonloadfunc, false); // cancel onload event function call
      document.getElementById ('pageloader').classList.add ('dimissloader'); // dismiss transition

      setTimeout (function () {
        document.documentElement.classList.remove ('hidescrollbar');
      }, 100); // 100 is the duration of the fade out effect
    }, maxloadingtime);
  } else {
    document.getElementById ('pageloader').style.display = 'none';
  }
});
window.addEventListener (
  'beforeunload',
  function () {
    document.body.classList.add ('fadeout');
  },
  false
);

// jQuery(function($) {
//   $('input[type="file"]').change(function() {
//     if ($(this).val()) {
//          var filename = $(this).val();
//          $(this).closest('.custom-file').find('.custom-file-label').html(filename);
//     }
//   });
// });

$(document).ready(function(){
  $('input[type="file"]').change(function(e){
      var filename = e.target.files[0].name;
      $(this).closest('.custom-file').find('.custom-file-label').html(filename);
  });
});
