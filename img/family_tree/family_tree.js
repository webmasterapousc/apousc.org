var parseQueryString = function() {

    var str = window.location.search;
    var objURL = {};

    str.replace(
        new RegExp( "([^?=&]+)(=([^&]*))?", "g" ),
        function( $0, $1, $2, $3 ){
            objURL[ $1 ] = $3;
        }
    );
    return objURL;
};

var params = parseQueryString();


$.ajax('family_tree/family_tree_ajax.php', {
  type: 'GET',
  async: false,
  data: {user: params["user"]},
  success: function (r) {
    if (r.errors) {
      console.log("Error: " + r.errors);
      return;
    }
    google.load("visualization", "1", {packages:["orgchart"]});
    google.setOnLoadCallback( function() { return drawChart(r); } );
  }
});

function drawChart(r) {
  var obj = r;
  var user = params["user"];
  var family = ["alpha", "phi", "omega", "all"];
  var numTables = 1;
  if (user == 'all') {
    // need three tables
    numTables = 3;
  }

  // create google datatable objects, one for each family
  var data = new Array(); // global data table object
  var dataMore = new Array(); // global data table object containing additional info
  var chart = new Array(); // global charts object

  for (var i = 0; i < numTables; i++) {
    data[i] = new google.visualization.DataTable();
    dataMore[i] = new google.visualization.DataTable();
    data[i].addColumn('string', 'Name');
    data[i].addColumn('string', 'Parent');
    data[i].addColumn('string', 'ToolTip');
    dataMore[i].addColumn('string', 'Username');
  }

  // might want to pass in this data from PHP in a different form
  // for example, maybe organize by families in php for quicker filter in js
  // that way we could avoid running through all data three times
  // but depends on the situation
  for (var d = 0; d < data.length; d++) {

    for (var i = 0; i < obj.length; i++) {
      if (numTables == 1) {
        // just add regardless of family, because we have only one table
        data[d].addRow([obj[i].name, obj[i].parent, obj[i].pledgeClass]);
        dataMore[d].addRow([obj[i].username]);
      } else {
        // now we need to make sure we are adding to the correct family
        if (obj[i].family == d) {
          data[d].addRow([obj[i].name, obj[i].parent, obj[i].pledgeClass]);
          dataMore[d].addRow([obj[i].username]);
        }
      }
    }

    // here we figure out which div to draw the table to
    var divName;
    if (numTables == 1) {
      var familyIndex = $.inArray(user, family);
      if (familyIndex == -1) {
        divName = 'user';
      } else {
        divName = family[familyIndex];
      }
    } else {
      divName = family[d];
    }
    
    chart[d] = new google.visualization.OrgChart(document.getElementById(divName+'_chart_div'));
    chart[d].draw(data[d], {allowHtml:true});

    (function(i) {
      google.visualization.events.addListener(chart[i], 'select', function() {
        var username = dataMore[i].getFormattedValue(chart[i].getSelection()[0].row, 0);
        window.open("http://www.apousc.org/userinfo.php?user="+username);
      });
    }(d))

  }

  // $('.google-visualization-orgchart-node').css('background', '-webkit-gradient(linear, left top, left bottom, from(#D8A802), to(#890000))');
  // $('.google-visualization-orgchart-node').css('border', '2px solid #000000');

}