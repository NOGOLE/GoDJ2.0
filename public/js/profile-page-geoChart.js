google.load('visualization', '1', { 'packages': ['geochart'] });
    google.setOnLoadCallback(drawMap);
    
    

    function drawMap() {
         var jsonData = $.ajax({
          url: "api/v1/songs",
          dataType:"json",
          async: false
          }).responseText;

        
      var data = new google.visualization.DataTable(jsonData);


        

    var options = {height:200,keepAspectRatio:true};

    var map = new google.visualization.GeoChart(document.getElementById('google_map'));

    map.draw(data, options);
  };
