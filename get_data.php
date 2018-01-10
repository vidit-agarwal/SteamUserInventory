<?php
			$url = 'http://127.0.0.1:8000';
			sd
			$contents = file_get_contents($url);
			$json_inventory = (json_decode($contents,true)); // this will convert json object string to associative array

			

			//echo "<div class = 'content'>" ;

			$inventoryTable= '<table align= "center" border="1" cellpadding="10" style="text-align:center ;">' ;
			//data 

			foreach ($json_inventory as $key => $inventoryItem) {
					//echo "Item :".($key+1)."<br />" ;
					$i= $key ;
						if(($i)%3==0)
						{		
								
								$rare.="#";
								$rare.= $inventoryItem['color'] ;
							

								$inventoryTable.='<tr><td BGCOLOR="'.$rare.'">' ;
								unset($rare);
								foreach ($inventoryItem as $itemName => $itemValue) {
					
									
									if($itemName=="assetid")
									{
										$assetid=$itemValue;
										$inventoryTable.="<p style='font-family:sans-serif'><strong>Asset Id:</strong>".$assetid."</p><br />" ;

									}
									else if($itemName=="type")
									{
										$type=$itemValue;
										$inventoryTable.="<p style='font-family:sans-serif'><strong>Type :</strong>".$type."</p><br />" ;

									}
									else if($itemName=="name")
									{
										$name=$itemValue;
										$inventoryTable.="<p style='font-family:sans-serif'><strong>Name :</strong>".$name."</p><br />" ;

									}
									
									else if($itemName=="image")
									{
											$imageofitem='<img src="'.$itemValue.'" alt="Image_View" style="height :250px ;width:250px;">' ;

											$inventoryTable.=$imageofitem.'</td>';
									}
									
								}
						}
						else
						{
								$rare.="#";
								$rare.= $inventoryItem['color'] ;
								$inventoryTable.='<td BGCOLOR="'.$rare.'">' ;
								unset($rare) ;
								foreach ($inventoryItem as $itemName => $itemValue) {
					
									if($itemName=="icon_url")
									{}
									else if($itemName=="assetid")
									{
										$assetid=$itemValue;
										$inventoryTable.="<p style='font-family:sans-serif;'><strong>Asset Id:</strong>".$assetid."</p><br />" ;

									}
									else if($itemName=="type")
									{
										$type=$itemValue;
										$inventoryTable.="<p style='font-family:sans-serif;'><strong>Type :</strong>".$type."</p><br />" ;

									}
									else if($itemName=="name")
									{
										$name=$itemValue;
										$inventoryTable.="<p style='font-family:sans-serif;'><strong>Name :</strong>".$name."</p><br />" ;

									}
									
									else if($itemName=="image")
									{
											$imageofitem='<img src="'.$itemValue.'" alt="Image_View" style="height :250px ;width:250px;">' ;

											$inventoryTable.=$imageofitem.'</td>';
									}
									else {
									//$inventoryTable.='<td>'.$itemValue ; 	}
										}
								}
						}
			}
			$inventoryTable.='</tr></table>' ;
			


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>User Inventory Page</title>
	<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
	<div class="inventory_wrapper">

	<?php
		echo "<h1 class='total_inv' style='text-align:center ;'>Total Item in inventory :<b>".(count($json_inventory))."</b><br /></h1>" ;
		echo $inventoryTable ;
	?>
	</div>

</body>
</html>

