<?php
$url = 'http://127.0.0.1:8000';
			$contents = file_get_contents($url);
			$json_inventory = (json_decode($contents,true)); // this will convert json object string to associative array

			echo "Total Item in inventory : <b>" . (count($json_inventory)). "</b><br />" ;
			foreach ($json_inventory as $key => $inventoryItem) {
					echo "Item :".($key)."<br />" ;
				foreach ($inventoryItem as $itemName => $itemValue) {
					echo $itemName ;
					echo " : ".$itemValue ;
					echo "<br />" ;
				}

				echo "<br /><br /><b>Next item goes here :</b><br />" ;
			}


?>