var width;

$(function() {
  var print = function(msg) {
    alert(msg);
  };

  var setInvisible = function(elem) {
    if (elem.hasClass('active')) {
      elem.removeClass("active");
    }
  };
  var setVisible = function(elem) {
    if (!elem.hasClass('active')) {
      elem.addClass("active");
    }
  };

  var elem = $("#elem");
  var items = elem.children();

  var outer = $('#outer');
  var actualWidth = 0;

  var updateUI = function() {
    width = outer.outerWidth(true);
    $.each($('#inner >'), function(i, item) {
      actualWidth += $(item).outerWidth(true);
    });

    if (actualWidth <= width) {
      setInvisible($('#right-button'));
    }
  };
  updateUI();



  $('#left-button').click(function() {
    setVisible($('#right-button'));
    var leftPos = outer.scrollLeft();
    outer.animate({
      scrollLeft: leftPos - (width / 1.5)
    }, 800, function() {
      if ($('#outer').scrollLeft() <= 0) {
        setInvisible($('#left-button'));
      }
    });

    return false;
  });

  $('#right-button').click(function() {
    setVisible($('#left-button'));
    var leftPos = outer.scrollLeft();
    outer.animate({
      scrollLeft: leftPos + (width / 1.5)
    }, 800, function() {
      console.log("leftPos: " + leftPos);
      if ($('#outer').scrollLeft() >= (actualWidth - outer.outerWidth(true)) * 0.95) {
        setInvisible($('#right-button'));
      }
    });

    return false;
  });

  $(window).resize(function() {
    updateUI();
  });
});
