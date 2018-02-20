<div id="taskthird-container">
<?php 
    use Bitrix\Main\Page\Asset;
	
    Asset::getInstance()->addCss("/bitrix/css/main/bootstrap.min.css");	
	Asset::getInstance()->addCss("/local/modules/my.taskthird/assets/styles.css");
	Asset::getInstance()->addJs( "/local/modules/my.taskthird/assets/script.js"); 

    $name_array=array();
	$i = 0;
	$j = 0;
	// формируем массив для вывода
    while ($stat = $arStat->fetch())
    {	
		// если элемент с новой книгой, то добавляем всю книгу в массив, 
		//если с новым автором, то добавляем только элемент с автором.
        if($name_array[$i-1]['ID'] != $stat['ID']) {
			array_push($name_array, $stat);
			$i++;
		}
		else {
			$name_array[$i-1]['PISATEL_NAME'.$j] = $stat['PISATEL_NAME'];
			$j++;
		}
		
    }

	echo "<div class='my_row'><div class='row'>";
	echo "<div class='col-md-1'><b>".GetMessage("OUTPUT_TABLE_COL_ID")."</b></div>";
	echo "<div class='col-md-2'><b>".GetMessage("OUTPUT_TABLE_COL_NAZV")."</b></div>";
	echo "<div class='col-md-1'><b>".GetMessage("OUTPUT_TABLE_COL_STRAN")."</b></div>";
	echo "<div class='col-md-1'><b>".GetMessage("OUTPUT_TABLE_COL_OBL")."</b></div>";
	echo "<div class='col-md-1'><b>".GetMessage("OUTPUT_TABLE_COL_PER")."</b></div>";
	echo "<div class='col-md-4'><b>".GetMessage("OUTPUT_TABLE_COL_FOTO")."</b></div>";
	echo "<div class='col-md-2'><b>".GetMessage("OUTPUT_TABLE_COL_PISATEL_NAME")."</b></div>";
	echo "</div></div>";

	foreach($name_array as $key => $value) {
		echo "<div class='my_row'><div class='row'>";
		$def = 0;
		foreach($value as $key1 => $value1) {			
			switch ($key1) {
				case 'ID':	
					if ($def != 0) {
						$div_string = "</div>";
					}
					else {
						$div_string = "";
					}				
					echo $div_string." <div class='col-md-1'>".$value1."</div>";
					break;
				case 'NAZV':
					echo " <div class='col-md-2'>".$value1."<br/><button onclick='return ChangeForm(\"SIMPLE_FORM_1\", ".$value['ID'].", \"".$value1."\");'>Заказать</button></div>";
					break;
				case 'STRAN':	
					echo " <div class='col-md-1'>".$value1."</div>";
					break;
				case 'OBL':	
					echo " <div class='col-md-1'>".$value1."</div>";
					break;
				case 'PER':
					echo " <div class='col-md-1'>".$value1."</div>";
					break;
				case 'FOTO':	
					echo " <div class='col-md-4'><img class='img-responsive' src='".$value1."'/></div>";
					break;
				default:	
					if($def == 0) {
						echo "<div class='col-md-1'>".$value1;
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
	
echo "<div style='display:none;'>";
$APPLICATION->IncludeComponent("bitrix:form.result.new","",Array(
        "SEF_MODE" => "N", 
        "WEB_FORM_ID" => "1", 
		"AJAX_MODE" => "Y",
		"AJAX_OPTION_JUMP" => "N", 
        "AJAX_OPTION_STYLE" => "Y", 
        "AJAX_OPTION_HISTORY" => "Y", 
		"AJAX_OPTION_SHADOW" => "N", 
        "LIST_URL" => "", 
        "EDIT_URL" => "", 
        "SUCCESS_URL" => "", 
        "CHAIN_ITEM_TEXT" => "", 
        "CHAIN_ITEM_LINK" => "", 
        "IGNORE_CUSTOM_TEMPLATE" => "N", 
        "USE_EXTENDED_ERRORS" => "Y", 
        "CACHE_TYPE" => "A", 
        "CACHE_TIME" => "3600", 
        "SEF_FOLDER" => "/", 
        "VARIABLE_ALIASES" => Array(
        )
    )
);
echo "</div>";
?>
</div>