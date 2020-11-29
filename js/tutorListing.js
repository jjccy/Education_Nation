
// pop out filter
$(document).ready(function() {
  $("#adjust-filter").click(function(event) {
    event.preventDefault();
    changeFilter();

    return false;
  });
});


function changeFilter() {

    if(!$('.filter-popout').hasClass('hide'))
    {
      $('.filter-popout').addClass('hide');
    }
    else if($('.filter-popout').hasClass('hide'))
    {
      $('.filter-popout').removeClass('hide');
    }
};

// double side slider
$( function() {
  var low;
  $( "#slider-range" ).slider({
    range: true,
    min: 0,
    max: 12,
    values: [ 0, 12 ],
    slide: function( event, ui ) {
      if (ui.values[0] == 0) {
        low = "K";
      }
      else {
        low = ui.values[ 0 ];
      }
      $( "#amount" ).val( low + " - " + ui.values[ 1 ] );
    }
  });
  $( "#amount" ).val("K" + " - " + $( "#slider-range" ).slider( "values", 1 ) );
} );


// AJAX for tutor listing cards

function sortAndFilter(str) {
  var xmlhttp = new XMLHttpRequest();
  if (this.readyState == 4 && this.status == 200) {
    document.getElementById("cardLists").innerHTML = this.responseText;
  }

  if (str.length == 0) {
    xmlhttp.open("tutorListCards.php", true);
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "tutorListCards.php?q=" + str, true);  
  }

  xmlhttp.send();
}
