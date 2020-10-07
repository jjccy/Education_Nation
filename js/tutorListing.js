

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

$( function() {
  $( "#slider-range" ).slider({
    range: true,
    min: 0,
    max: 500,
    values: [ 75, 300 ],
    slide: function( event, ui ) {
      $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
    }
  });
  $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
    " - $" + $( "#slider-range" ).slider( "values", 1 ) );
} );
