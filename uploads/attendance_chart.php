<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Portal</title>
    <link rel="stylesheet" href="chart.css">
    <link rel="stylesheet" href="navigation.css">
</head>
<body>
  <div class="main_container" id="home">

  <div class="navbar">
      <div class="logo">
      <a href="#">Student Performance Tracker</a>
    </div>
        <div class="navbar_items">
        <ul>
        <li><a href="home.php">LOGOUT</a></li>
          <li><a href="home.php">CONTACT US</a></li>
          <li><a href="stud_login.php">STUDENT</a></li>
          <li><a href="home.php">HOME</a></li>
        </ul>
        </div>
  </div> 
  <div class="banner_image">
        <div class="form-box">
          <div class="button-box">
                <div>
                <h2><center>Attendance Chart</center></h2></div>
                </div>

<?php
$con = mysqli_connect("localhost", "root", "", "spt");
if($con){
  echo " ";
}
?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<div id="chart_div"></div>
<script>
google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawColColors);

function drawColColors() {
    var data = google.visualization.arrayToDataTable([
        ['sub_id', 'total','attendance'],
        <?php
        $sql = "select * from `attendance` where stud_id=34 and month='January'";
        $fire = mysqli_query($con,$sql);
        while($result = mysqli_fetch_assoc($fire)){
          echo "['".$result['sub_id']."',".$result['total'].",".$result['attendance']."],";
        }
        ?>
        
      ]);

var options = {
title: 'Students Attendance',
// colors: ['#9575cd', '#33ac71'],
hAxis: {
title: 'Subject Code'
},
vAxis: {
title: 'Attendance'
}
};

var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
chart.draw(data, options);
}

</script>
 </div>
</div> 
<!-- Code injected by live-server -->
<script>
	// <![CDATA[  <-- For SVG support
	if ('WebSocket' in window) {
		(function () {
			function refreshCSS() {
				var sheets = [].slice.call(document.getElementsByTagName("link"));
				var head = document.getElementsByTagName("head")[0];
				for (var i = 0; i < sheets.length; ++i) {
					var elem = sheets[i];
					var parent = elem.parentElement || head;
					parent.removeChild(elem);
					var rel = elem.rel;
					if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
						var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
						elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
					}
					parent.appendChild(elem);
				}
			}
			var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
			var address = protocol + window.location.host + window.location.pathname + '/ws';
			var socket = new WebSocket(address);
			socket.onmessage = function (msg) {
				if (msg.data == 'reload') window.location.reload();
				else if (msg.data == 'refreshcss') refreshCSS();
			};
			if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
				console.log('Live reload enabled.');
				sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
			}
		})();
	}
	else {
		console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
	}
	// ]]>
</script>
</body>

</html>