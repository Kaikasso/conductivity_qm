<html>
<head>
<title> Quimicas Mundiales:: SOLID CON I :: Conducitivdad </title>
<META HTTP-EQUIV="refresh" CONTENT="2">
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
	google.load("visualization", "1", {packages:["corechart"]});
	google.setOnLoadCallback(drawChart);
	function drawChart() {
		var data = google.visualization.arrayToDataTable([
			   ['Time', 'Conductivity'],
			   <?php
				$con = mysqli_connect("localhost","bone","bone","TempDB");
				
				$query = "SELECT * FROM ConducMeasure";
				$result = mysqli_query($con,$query);
				
				mysqli_close($con);
			
				while($row = mysqli_fetch_array($result))
				{
					$time = $row['MeasureTime'];
					$conductivity = $row['Conductivity'];
					echo "['$time', $conductivity],";
				}
			   ?>
			]);

		var options = {
			title: 'Conductividad Medida',
			vAxis: { title: "Partes por Millon TSD" }
		};

		var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
		chart.draw(data,options);
	}
</script>
</head>
<body>
	<div id ="chart_div" style="width: 900px; height: 500px;"></div>
	<div> <p> Todos los derechos reservados QM - 2015 </p> </div>
</body>
</html>


