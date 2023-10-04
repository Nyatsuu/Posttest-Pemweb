$(document).ready(function() {
    $('#LightMode').click(function() {
      $('header').toggleClass('Light-Mode');
      $('body').toggleClass('Light-Mode');
      $('h2').toggleClass('Light-Mode');
      $('#subtitle').toggleClass('Light-Mode');
      showPopup();
    });
  });

  document.body.addEventListener('transitionend', function(event) {
    if (event.propertyName === 'background-color') {
      showPopup();
    }
  });

  function showPopup() {
    $('#popupBox').fadeIn();
    setTimeout(function() {
      $('#popupBox').fadeOut();
    }, 2000);
  }

