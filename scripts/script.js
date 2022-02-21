function fill(Value) {
  $('#search').val(Value);

  $('#display').hide();
}

function checkAll(checkBox) {
  var checkboxes = document.getElementsByName('requestsId[]');
  for (var i = 0; i < checkboxes.length; i++) {
    checkboxes[i].checked = checkBox.checked;
  }
}

$(document).ready(function () {
	


  $("#search").keyup(function () {
    var title = $("#search").val();
    if (title === '') {
      $("#display").hide();
    } else {
      $.ajax({
        type: "POST",
        url: "./scripts/searchBook.php",
        data: {
          search: title
        },
        success: function (result) {
          $('#display').html(result).show();
        }
      })
    }
  });
  
  $('.owlhero').owlCarousel({

    margin: 5,
    nav: false,
    loop: true,
    animateOut: 'fadeOut',
    autoplay: true,
    autoplayTimeout: 5000,
    autoplayHoverPause: true,


    responsive: {
      0: {
        items: 2
      },
      600: {
        items: 2
      },
      1000: {
        items: 3
      }
    }
  });

  $('.owlnew').owlCarousel({

    nav: false,
    loop: true,
    animateOut: 'fadeOut',
    autoplay: true,
    autoplayTimeout: 4000,
    autoplayHoverPause: true,

    responsive: {
      0: {
        items: 3
      },
      600: {
        items: 3
      },
      1000: {
        items: 4
      }
    }
  });
  $('#myModal').on('hidden.bs.modal', function (e) {
  $("#modalbtnclose").click();
});
  const signUpButton = document.getElementById('signUp');
  const signInButton = document.getElementById('signIn');
  const container = document.getElementById('container');
  const signUpButton2 = document.getElementById('signUp2');
  const signInButton2 = document.getElementById('signIn2');

  signUpButton.addEventListener('click', () => {
    container.classList.add("right-panel-active");
  });

  signInButton.addEventListener('click', () => {
    container.classList.remove("right-panel-active");
  });
  
   signUpButton2.addEventListener('click', () => {
    container.classList.add("right-panel-active");
  });

  signInButton2.addEventListener('click', () => {
    container.classList.remove("right-panel-active");
  });
  


});






function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $('.bookimg')
        .attr('src', e.target.result)

        .height(250);
    };

    reader.readAsDataURL(input.files[0]);
  }
}


function Opensidenav (){
  document.getElementById("Sidenav").style.width = "260px";
  document.getElementById("Sidenav").style.transition = "0.5s";
  document.getElementById("Sidenavbg").style.display = "block";
  






}
function Closesidenav (){
  document.getElementById("Sidenav").style.width = "0px";
  document.getElementById("Sidenav").style.transition = "0.2s";
   document.getElementById("Sidenavbg").style.display = "none";

 }