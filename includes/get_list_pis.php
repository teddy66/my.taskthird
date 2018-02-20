<?php
// кешируем на 1 неделю
$arStat = \My\Taskthird\DbpisatelTable::getList(array(
		'select' => array(
        'ID',
        'NAME',
		'OTCH',
		'FAM',
        'KNIGA' => 'My\TaskThird\Dbknigadbpisatel:DBPISATEL.DBKNIGA.NAZV'
		),
		'group' => array('ID'),
            //'order' => array("FAM"=>'asc'),
		'cache'=>array("ttl"=>604800)
        ));
?>