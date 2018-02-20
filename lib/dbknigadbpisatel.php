<?php
namespace My\TaskThird;

use Bitrix\Main\Entity;
use	Bitrix\Main\Localization\Loc;
	
Loc::loadMessages(__FILE__);

class DbknigadbpisatelTable extends Entity\DataManager
{
	/**
	 * Returns DB table name for entity.
	 *
	 * @return string
	 */
	public static function getTableName()
	{
		return 'my_kniga_pisatel_db';
	}

	/**
	 * Returns entity map definition.
	 *
	 * @return array
	 */
	public static function getMap()
	{
		return array(
		    'DBKNIGA_ID' => array(
				'data_type' => 'integer',
                'primary' => true,
                'required' => true,
                'title' => Loc::getMessage('DB_KNIGA_PISATEL_ID_KNIGA_FIELD'),
            ),
			'DBKNIGA' => array(
				'data_type' => 'Dbkniga',
				'reference' => array(
					'=this.DBKNIGA_ID' => 'ref.ID'
				)
			),
			'DBPISATEL_ID' => array(
				'data_type' => 'integer',
                'primary' => true,
                'required' => true,
                'title' => Loc::getMessage('DB_KNIGA_PISATEL_ID_PISATEL_FIELD'),
            ),
			'DBPISATEL' => array(
				'data_type' => 'Dbpisatel',
				'reference' => array(
					'=this.DBPISATEL_ID' => 'ref.ID'
				)
			),
		);
	}
}
