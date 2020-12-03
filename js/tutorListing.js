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

      grade = ui.values[0] + "-" + ui.values[1];
      sortAndFilter();
    }
  });
  $( "#amount" ).val("K" + " - " + $( "#slider-range" ).slider( "values", 1 ) );
} );


// AJAX for tutor listing cards
var course = null;
var grade = "";
var sortby = "";

// call when sort link is clicked
function sortBy(sort) {
  event.preventDefault();

  sortby = sort;
  sortAndFilter();

  return false;
}

// couse when course check box is selected
function courseSelect() {
  let courses = document.getElementsByName("courses[]");
  course = "";
  courses.forEach(checkCourse);
  sortAndFilter();
}



function checkCourse(item) {
  if (item.checked) {
    course = course + item.value + "-";
  }
}



function sortAndFilter() {
  let targetPage = 'shared/tutorListCards.php';
  let myRand = parseInt(Math.random() * 99999999999999999);
  let theURL = targetPage + "?rand=" + myRand;

  // add filter condition
  if (sortby != "") {
    theURL = theURL + "&sortby=" + sortby;
  }

  if (grade != "") {
    theURL = theURL + "&grade=" + grade;
  }

  if (course != null) {
    theURL = theURL + "&course=" + course;
  }


  myReq.open("GET", theURL, true);
  myReq.onreadystatechange = theHTTPResponse;
  myReq.send();
}

function theHTTPResponse() {
  if (myReq.readyState == 4) {
    if (myReq.status == 200) {

      var myObj = JSON.parse(myReq.responseText);
      document.getElementById("cardLists").innerHTML = myObj.newList;
    }
  }
}
