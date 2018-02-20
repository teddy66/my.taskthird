<div id="taskthird-container">
<?php 
    use Bitrix\Main\Page\Asset;
	
    Asset::getInstance()->addCss("/bitrix/css/main/bootstrap.min.css");	
	Asset::getInstance()->addCss("/local/modules/my.taskthird/assets/styles.css");
		
    $name_array=array();
	$i = 0;
	// формируем массив для вывода
	$j = 0;
    while ($stat = $arStat->fetch())
    {
			// если элемент с новой книгой, то добавляем всю книгу в массив, 
		//если с новым автором, то добавляем только элемент с автором.
        if($name_array[$i-1]['ID'] != $stat['ID']) {
			array_push($name_array, $stat);
			$i++;
		}
		else {
			$name_array[$i-1]['KNIGA'.$j] = $stat['KNIGA'];
			$j++;
		}
    }
	//шапка таблицы
echo "<div class='my_row'><div class='row'>";
	echo "<div class='col-md-1'><b>".GetMessage("OUTPUT_TABLE_COL_ID")."</b></div>";
	echo "<div class='col-md-2'><b>".GetMessage("OUTPUT_TABLE_COL_NAME")."</b></div>";
	echo "<div class='col-md-2'><b>".GetMessage("OUTPUT_TABLE_COL_OTCH")."</b></div>";
	echo "<div class='col-md-2'><b>".GetMessage("OUTPUT_TABLE_COL_FAM")."</b></div>";
	echo "<div class='col-md-5'><b>".GetMessage("OUTPUT_TABLE_COL_KNIGA")."</b></div>";
	echo "</div></div>";

	foreach($name_array as $key => $value) {
		echo "<div class='my_row'><div class='row'>";
		$def = 0;
		foreach($value as $key1 => $value1) {				
			// выводим все книги каждого писателя вместе, если их несколько
			switch ($key1) {
				case 'ID':	
					if ($def != 0) {
						$div_string = "</div>";
					}
					else {
						$div_string = "";
					}
					echo $div_string."<div class='col-md-1'>".$value1."</div>";
					break;
				case 'NAME':
					echo "<div class='col-md-2'>".$value1."</div>";
					break;
				case 'OTCH':	
					echo "<div class='col-md-2'>".$value1."</div>";
					break;
				case 'FAM':	
					echo "<div class='col-md-2'>".$value1."</div>";
					break;					
				default:	
					if($def == 0) {
						echo "<div class='col-md-2'>".$value1;
						$def = 1;
					}
					else {
						echo "<br/>".$value1;
					}
					break;
			}			
		}
		echo "</div></div></div>";
	}
?>
</div>