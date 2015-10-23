<html>
<head>
<title> Quimicas Mundiales:: SOLID CON I :: Conductivdad </title>
<META HTTP-EQUIV="refresh" CONTENT="2"> 
<style type="text/css">
	p { display: table-cell; }
	button { width: 75px; margin: 2px auto; }
</style>
<?php
	$output = shell_exec( "/www/cgi-bin/condMeasure" );
		
	if(isset($_GET['led']) && isset($_GET['onOff']))
	{
		$led = $_GET['led'];
		$onOff = $_GET['onOff'];
		
		
	}

?>
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
	<!-- Conductivity Display Code -->
	<div style="width: 200px; margin: 0px auto;">
		<div style="width: 200px; float: left;">
			<p> Conductividad :</p>
			<?php echo htmlspecialchars($output); ?>
	</div>
	<!-- Buttons code -->
	<div style="width: 200px; margin: 0px auto;">
		<div style="width: 100px; float: left;">
			<p> LED #2:</p>
			<button type="button" onclick="location.href='conductivity_main.php?led=2&onOff=1'">ON</button>
			<button type="button" onclick="location.href='conductivity_main.php?led=2&onOff=0'">OFF</button>
		</div>

		<div style="width: 100px; margin-left: 100px;">
			<p> LED #3:</p>
			<button type="button" onclick="location.href='conductivity_main.php?led=3&onOff=1'">ON</button>
			<button type="button" onclick="location.href='conductivity_main.php?led=3&onOff=0'">OFF</button>
		</div>
	</div>
	<div id ="chart_div" style="width: 900px; height: 500px;"></div>
	<div> <p> Todos los derechos reservados QM - 2016 </p> </div>
</body>
</html>


	
