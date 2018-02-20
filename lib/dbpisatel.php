<?php
namespace My\TaskThird;

use Bitrix\Main\Entity;
use	Bitrix\Main\Localization\Loc;
	
Loc::loadMessages(__FILE__);

class DbpisatelTable extends Entity\DataManager
{
	/**
	 * Returns DB table name for entity.
	 *
	 * @return string
	 */
	public static function getTableName()
	{
		return 'my_pisatel_db';
	}

	/**
	 * Returns entity map definition.
	 *
	 * @return array
	 */
	public static function getMap()
	{
		return array(
			'ID' => array(
				'data_type' => 'integer',
				'primary' => true,
				'autocomplete' => true,
				'title' => Loc::getMessage('DB_PISATEL_ID_FIELD'),
			),
			'NAME' => array(
				'data_type' => 'string',
				'required' => true,
				'validation' => array(__CLASS__, 'validateName'),
				'title' => Loc::getMessage('DB_PISATEL_NAME_FIELD'),
			),
			'OTCH' => array(
				'data_type' => 'string',
				'required' => true,
				'validation' => array(__CLASS__, 'validateOtch'),
				'title' => Loc::getMessage('DB_PISATEL_OTCH_FIELD'),
			),
			'FAM' => array(
				'data_type' => 'string',
				'required' => true,
				'validation' => array(__CLASS__, 'validateFam'),
				'title' => Loc::getMessage('DB_PISATEL_FAM_FIELD'),
			),
		);
	}
	/**
	 * Returns validators for name field.
	 *
	 * @return array
	 */
	public static function validateName()
	{
		return array(
			new Main\Entity\Validator\Length(null, 255),
		);
	}
	/**
	 * Returns validators for otch field.
	 *
	 * @return array
	 */
	public static function validateOtch()
	{
		return array(
			new Main\Entity\Validator\Length(null, 255),
		);
	}
	/**
	 * Returns validators for fam field.
	 *
	 * @return array
	 */
	public static function validateFam()
	{
		return array(
			new Main\Entity\Validator\Length(null, 255),
		);
	}
}