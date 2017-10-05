<?php
include ('../../babanta_header.php');

if(!$wuser->admod){ die('x'); }

if(isset($_GET['ajax'])){
		header('Content-Type: application/json');
		switch ($_GET['ajax']) {
			case 'cps':
				date_default_timezone_set('America/Argentina/Buenos_Aires');
				$time_now=time();
				$time_now=date('m-d-Y', $time_now);
				$today_cash = mysql_fetch_assoc(mysql_query("SELECT p_id, p_dia, p_total FROM plata_diaria WHERE p_dia='$time_now'"));
				$cash_today=str_replace(',', '.', $today_cash['p_total']);
				$seconds_elapsed=time() - strtotime("today");
				$cash_by_second=$cash_today/$seconds_elapsed;
				$response['data']=$cash_by_second;
				break;
			case 'today':
				date_default_timezone_set('America/Argentina/Buenos_Aires');
				$time_now=time();
				$time_now=date('m-d-Y', $time_now);
				$today_cash = mysql_fetch_assoc(mysql_query("SELECT p_id, p_dia, p_total, p_visitas FROM plata_diaria WHERE p_dia='$time_now'"));
				$cash_today=str_replace(',', '.', $today_cash['p_total']);
				$seconds_elapsed=time() - strtotime("today");
				$cash_by_second=$cash_today/$seconds_elapsed;
				$response['today']=$cash_today;
				$response['second']=$cash_by_second;
				$response['percent']=($cash_by_second*100)/0.005;
				$response['visitas']=$today_cash['p_visitas'];
				break;
		}
		echo json_encode($response);
}else{
$infocobro = mysql_query("SELECT c.c_user_id,c.c_dinero,u.buser_id,u.buser_register,u.buser_nick FROM u_cobros AS c LEFT JOIN babanta_usuarios AS u ON c.c_user_id = u.buser_id WHERE c.c_type='1'");

$total=0;
$mensual=0;
$day = $_GET['day'];
$month = $_GET['month'];
while ($row = mysql_fetch_assoc($infocobro)){
	$isbanned = mysql_num_rows(mysql_query("SELECT bbb_obj, bbb_type, bbb_state FROM babanta_banned WHERE bbb_obj='".$row['c_user_id']."' AND bbb_type='2' AND bbb_state='1' "));
	if($isbanned <= 0) { 
		$valores_plata[$row['c_user_id'].'%'.$row['buser_register'].'%'.$row['buser_nick']]=$new_cash = floatval(str_replace(',', '.', $row['c_dinero']));
		if($row['c_user_id'] != 1587 && $row['c_user_id'] != 1094 && $row['c_user_id'] != 1668 && $new_cash>=1){
		$total=$total+$new_cash; 
	    }
		if($new_cash>=130 && $row['c_user_id'] != 1587 && $row['c_user_id'] != 1094 && $row['c_user_id'] != 1668){
			$mensual = $mensual+$new_cash;
		}
		//$mensual = ($new_cash >= 100) ? $mensual+$new_cash : $mensual;
	}
}
		date_default_timezone_set('America/Argentina/Buenos_Aires');
		$time_now=time();
		$time_now=date('m-d-Y', $time_now);
		$today_cash = mysql_fetch_assoc(mysql_query("SELECT p_id, p_dia, p_total FROM plata_diaria WHERE p_dia='$time_now'"));
		$cash_today=str_replace(',', '.', $today_cash['p_total']);
		$seconds_elapsed=time() - strtotime("today");
		$cash_by_second=$cash_today/$seconds_elapsed;
		
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script>
var latest=0;
var cash_aumento=0;
var aumont_last=0;
var old_aumont_last=0;
var visitas_contadas=0;
var old_total_hits=0;
var old_hit_now=0;
function per_second(){
	$.get('http://www.babanta.net/bbnt_resource/pages/test.php?ajax=today').done(function(data){
		if(data.second>latest){
			$('#cash_second').css('color','red');
			$('#up_0').show();
			$('#down_0').hide();
		}else{
			$('#cash_second').css('color','green');
			$('#up_0').hide();
			$('#down_0').show();
		}
		if(aumont_last==0){
			aumont_last=0.001;
			visitas_contadas=data.visitas;
		}else{
			aumont_last=data.today-cash_aumento;
		}
		now_hits=data.visitas-old_total_hits;
		old_total_hits=data.visitas;
		if(now_hits>old_hit_now){
			$('#now_hits').css('color','green');
			$('#up_2').show();
			$('#down_2').hide();
		}else{
			$('#now_hits').css('color','red');
			$('#up_2').hide();
			$('#down_2').show();
		}
		old_hit_now=now_hits;
		if(aumont_last>old_aumont_last){
			$('#now_mismo').css('color','red');
			$('#up_1').show();
			$('#down_1').hide();
		}else{
			$('#now_mismo').css('color','green');
			$('#up_1').hide();
			$('#down_1').show();
		}
		$('#cash_today').html('$'+data.today);
		$('#now_mismo').text('$'+aumont_last);
		$('#cash_second').text('$'+data.second);
		$('#total_hits').text(data.visitas);
		$('#now_hits').text(now_hits);
		cash_aumento=data.today;
		latest=data.second;
		old_aumont_last=aumont_last;
		setTimeout(function(){ per_second(); }, 1000);
	}).fail(function(data){
		setTimeout(function(){ per_second(); }, 1000);
	})
}
$( document ).ready(function() {
	per_second();
});
</script>
<script type="text/javascript">
	window.onload = function () {

		// dataPoints
		var dataPoints1 = [];
		var dataPoints2 = [];

		var chart = new CanvasJS.Chart("chartContainer",{
			zoomEnabled: true,
			title: {
				text: "Tiempo Real"		
			},
			toolTip: {
				shared: true
				
			},
			legend: {
				verticalAlign: "top",
				horizontalAlign: "center",
                                fontSize: 14,
				fontWeight: "bold",
				fontFamily: "calibri",
				fontColor: "dimGrey"
			},
			axisX: {
				title: "Estadisticas por segundo y promedios"
			},
			axisY:{
				prefix: '$',
				includeZero: false
			}, 
			data: [{ 
				// dataSeries1
				type: "area",
				xValueType: "dateTime",
				showInLegend: true,
				name: "Costo Ultimo Segundo",
				dataPoints: dataPoints1
			},
			{				
				// dataSeries2
				type: "area",
				xValueType: "dateTime",
				showInLegend: true,
				name: "Costo Promedio Por Segundo" ,
				dataPoints: dataPoints2
			}],
          legend:{
            cursor:"pointer",
            itemclick : function(e) {
              if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                e.dataSeries.visible = false;
              }
              else {
                e.dataSeries.visible = true;
              }
              chart.render();
            }
          }
		});



		var updateInterval = 400;
		// initial value
		var yValue1 = 0.05; 
		var yValue2 = 0.05;
		var d = new Date();
		var time = new Date;
		time.setHours(d.getHours());
		time.setMinutes(d.getMinutes());
		time.setSeconds(d.getSeconds());
		time.setMilliseconds(00);
		// starting at 9.30 am

		var updateChart = function (count) {
			count = count || 1;

			// count is number of times loop runs to generate random dataPoints. 

			for (var i = 0; i < count; i++) {
				
				// add interval duration to time				
				time.setTime(time.getTime()+ updateInterval);


				// generating random values
				//var deltaY1 = .5 + Math.random() *(-.5-.5);
				//var deltaY2 = .5 + Math.random() *(-.5-.5);

				// adding random value and rounding it to two digits. 
				yValue1 = aumont_last;
				yValue2 = latest;
				
				// pushing the new values
				dataPoints1.push({
					x: time.getTime(),
					y: yValue1
				});
				dataPoints2.push({
					x: time.getTime(),
					y: yValue2
				});


			};

			// updating legend text with  updated with y Value 
			chart.options.data[0].legendText = " Costo Ultimo Segundo  $" + yValue1;
			chart.options.data[1].legendText = " Costo Promedio Por Segundo  $" + yValue2; 

			chart.render();

		};

		// generates first set of dataPoints 
		updateChart(1000);	
		 
		// update chart after specified interval 
		setInterval(function(){updateChart()}, updateInterval);
	}
	</script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/canvasjs/1.7.0/canvasjs.min.js"></script>
	<style>
	table#datienzo {
		width: 100%;
		text-align:center;
	}
	table#datienzo tr td{
		width: 16,66666666666667% !important;
		text-align: center !important;
		border: 1px solid #BBBBBB;
		font-size: 15px;
	}
	table#datienzo tr:nth-child(2) td{
		font-size: 19px;
	}
	table#datienzo tr:first-child {
		background-color: #BBBBBB;
		color: white;
	}
	#datienzo img{
		display:none;
		height: 19px;
		float: right;
		margin-top: 2px;
	}
	</style>
<table id="datienzo" >
	<tr>
	<td>Fecha</td>
	<td>Monto Total</td>
	<td>Monto Ultimo Segundo</td>
	<td>Costo Promedio Por Segundo (CPS)</td>
	<td>Visitas Totales</td>
	<td>Visitas Ultimo Segundo</td>
	</tr>
	<tr>
	<td><?=$today_cash['p_dia']?></td>
	<td><span id="cash_today">$<?=$today_cash['p_total']?></span></td>
	<td><span id="now_mismo" ></span><img id="up_1" src="http://s32.postimg.org/hmy1o0slt/Aij_Ma9_V.png" /><img id="down_1" src="http://s32.postimg.org/xmgp7konl/23_Tvhp_Q.png" /></td>
	<td><span id="cash_today"><span id="cash_second" >$<?=$cash_by_second?></span></span><img id="up_0" src="http://s32.postimg.org/hmy1o0slt/Aij_Ma9_V.png" /><img id="down_0" src="http://s32.postimg.org/xmgp7konl/23_Tvhp_Q.png" /></td>
	<td id="total_hits"></td>
	<td><span id="now_hits" ></span><img id="up_2" src="http://s32.postimg.org/p5h6wnjyp/IF3_Qy_De.png" /><img id="down_2" src="http://s32.postimg.org/3x83syuvl/m_A2fb_Rl.png" /></td>
	</tr>
</table>
<div id="chartContainer" style="height: 300px;width: 99.55%;border: 1px solid #BBBBBB;margin: 2px;"></div>
<center><h2 style="color:red;text-transform:uppercase;">Debemos <?=$total?></h2></center>
<hr>
<center><h4 style="color:blue;">A pagar este mes: <?=$mensual?></h4></center>
<hr>
<?
	natsort($valores_plata);
	$datalkslw = '';
	foreach ($valores_plata as $useridinfo =>$plata){ 
	if($plata >= 1 && ($data[0] != 1587 || $data[0] != 1094 || $data[0] != 1668)){
		$data = explode('%', $useridinfo);
		$this_day = date('j', $data[1]);
		$this_moth = date('F', $data[1]);
		$thos_month = date('n', $data[1]);
		if($day && $month && ($this_day == $day && $thos_month == $month) || !$day && !$month && $plata){
		$lñasdfw[$data[0]] = 1;
		$datalkslw .= $data[2].'('.$data[0].')'.' => <b>'.$plata.'</b><br>';
	    }
	}
	}
	echo $datalkslw;
	echo '<hr><center>SK: '.count($lñasdfw).'</center>';
}
?>