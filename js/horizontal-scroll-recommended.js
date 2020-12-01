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

    var elem = $("#elemRecommended");
    var items = elem.children();

    var outer = $('#outerRecommended');
    var actualWidth = 0;

    var updateUI = function() {
        width = outer.outerWidth(true);
        $.each($('#innerRecommended >'), function(i, item) {
            actualWidth += $(item).outerWidth(true);
        });

        if (actualWidth <= width) {
            setInvisible($('#right-button-recommended'));
        }
    };
    updateUI();



    $('#left-button-recommended').click(function() {
        setVisible($('#right-button-recommended'));
        var leftPos = outer.scrollLeft();
        outer.animate({
            scrollLeft: leftPos - (width / 1.5)
        }, 800, function() {
            if ($('#outerRecommended').scrollLeft() <= 0) {
                setInvisible($('#left-button-recommended'));
            }
        });

        return false;
    });

    $('#right-button-recommended').click(function() {
        setVisible($('#left-button-recommended'));
        var leftPos = outer.scrollLeft();
        outer.animate({
            scrollLeft: leftPos + (width / 1.5)
        }, 800, function() {
            console.log("leftPos: " + leftPos);
            if ($('#outerRecommended').scrollLeft() >= (actualWidth - outer.outerWidth(true)) * 0.95) {
                setInvisible($('#right-button-recommended'));
            }
        });

        return false;
    });

    $(window).resize(function() {
        updateUI();
    });
});