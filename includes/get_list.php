<?php
// кешируем на 1 неделю
$arStat = \My\Taskthird\DbknigaTable::getList(array(
    'cache'=>array("ttl"=>604800),
    'select' => array(
        'ID',
        'NAZV',
		'STRAN',
		'OBL',
		'PER',
		'FOTO',
        'PISATEL_NAME' => 'My\TaskThird\Dbknigadbpisatel:DBKNIGA.DBPISATEL.FAM'
    )
));
?>