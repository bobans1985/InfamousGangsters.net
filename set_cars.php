<?php
	include 'included.php';
	$cars_query = mysql_query("SELECT * FROM cars");
	$cars_qty = mysql_num_rows($cars_query);
	while ($car_info = mysql_fetch_array($cars_query)) {
		print '<pre>';
		print_r ($car_info);
		print '</pre>';
		$id = $car_info['id'];
		$carid = $car_info['carid'];
		if($carid == 1){$carname = 'Volvo';$bullets = 22;}
	    elseif($carid == 2){$carname = 'Renault Clio';$bullets = 37;}
	    elseif($carid == 3){$carname = 'Porsche 911';$bullets = 315;}
	    elseif($carid == 4){$carname = 'BMW';$bullets = 139;}
	    elseif($carid == 5){$carname = 'Aston Martin';$bullets = 264;}
	    elseif($carid == 6){$carname = 'Alfa Romeo';$bullets = 209;}
	    elseif($carid == 7){$carname = 'Continental GT';$bullets = 352;}
	    elseif($carid == 8){$carname = 'Maybach 62';$bullets = 96;}
	    elseif($carid == 9){$carname = 'Maserati';$bullets = 430;}
	    elseif($carid == 10){$carname = 'Audi TT';$bullets = 399;}
	    elseif($carid == 11){$carname = 'Porsche Carrera GT';$bullets = 495;}
	    elseif($carid == 12){$carname = 'Pagani Zonda';$bullets = 720;}
	    elseif($carid == 13){$bullets = 800;}
	    elseif($carid == 14){$carname = 'Bugatti Veyron';$bullets = 7250;}
	    elseif($carid == 15){$carname = 'Ferrari 458 Italia';$bullets = 5271;}
	    elseif($carid == 16){$carname = 'Lamborghini Murcielago';$bullets = 590;}
	    elseif($carid == 17){$carname = 'Koenigsegg Agera R';$bullets = 660;}
	    elseif($carid == 18){$carname = 'Lamborghini Aventador';$bullets = 6450;}		
	    elseif($carid == 19){$carname = 'Audi Prologue';$bullets = 8650;}
	    mysql_query("UPDATE cars SET bullets = '$bullets' WHERE id = '$id'");
	}
	
?>