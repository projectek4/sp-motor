<script type="text/javascript">
	google.charts.load('current', {packages: ['corechart', 'line']});
	google.charts.setOnLoadCallback(drawBackgroundColor);
	function drawBackgroundColor() {
	var data = new google.visualization.DataTable();
	data.addColumn('string', 'Tanggal');
	data.addColumn('number', 'Pengunjung');
	data.addColumn({type: 'string', role: 'tooltip'});
	data.addRows(<?= $detail ?>);
	var options = {
		legend: 'none',
		lineWidth: 4,
		hAxis: {
			gridlines: {color: "#EEE",},
			baselineColor: '#EEE',
			title: 'Tanggal'
		},
		vAxis: {
			gridlines: {color: "#EEE",},
			baselineColor: '#EEE',
		},
		backgroundColor: '#FFFFFF',
		tooltip: {isHtml: true},
	};
	var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
	chart.draw(data, options);
	}
</script>

<div class="row">
	<div class="col-sm-12">
		<h3 class="text-center">Grafik Pengunjung <?= bulan(date('m')).' '.date('Y') ?></h3>
		 <div style="border:1px solid #EEE" id="chart_div"></div>
	</div>
</div>