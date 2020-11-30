// XHR object
var myReq = getXMLHTTPRequest();

// function to get XHR object, should works on all browser
function getXMLHTTPRequest() {
  var req = false;
  try
  {
    // for fire fox
    req = new XMLHttpRequest();
  } catch (err) {
    try
    {
      // for some versions of IE
      req = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (err) {
      try
      {
        // for some other versions of IE
        req = new ActiveXObject("Microsoft.XMLHTTP");
      } catch (err) {
        req = false;
      }
    }
  }

  return req;
}

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
var course;
var age;
var sortby = "";

// call when sort link is clicked
function sortBy(sort) {
  event.preventDefault();

  sortby = sort;
  sortAndFilter();

  return false;
}

function sortAndFilter() {
  let targetPage = 'shared/tutorListCards.php';
  let myRand = parseInt(Math.random() * 99999999999999999);
  let theURL = targetPage + "?rand=" + myRand;

  // add filter condition
  if (sortby != "") {
    theURL = theURL + "&sortby=" + sortby;
  }


  myReq.open("GET", theURL, true);
  myReq.onreadystatechange = theHTTPResponse;
  myReq.send();
}

function theHTTPResponse() {
  if (myReq.readyState == 4) {
    if (myReq.status == 200) {
      document.getElementById("cardLists").innerHTML = myReq.responseText;
    }
  }
}
