<?php
namespace My\TaskThird;

use Bitrix\Main\Entity;
use	Bitrix\Main\Localization\Loc;
	
Loc::loadMessages(__FILE__);

class DbknigaTable extends Entity\DataManager
{
	/**
	 * Returns DB table name for entity.
	 *
	 * @return string
	 */
	public static function getTableName()
	{
		return 'my_kniga_db';
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
				'title' => Loc::getMessage('DB_KNIGA_ID_FIELD'),
			),
			'NAZV' => array(
				'data_type' => 'string',
				'required' => true,
				'validation' => array(__CLASS__, 'validateNazv'),
				'title' => Loc::getMessage('DB_KNIGA_NAZV_FIELD'),
			),
			'STRAN' => array(
				'data_type' => 'integer',
				'title' => Loc::getMessage('DB_KNIGA_STRAN_FIELD'),
			),
			'IZD' => array(
				'data_type' => 'string',
				'validation' => array(__CLASS__, 'validateIzd'),
				'title' => Loc::getMessage('DB_KNIGA_IZD_FIELD'),
			),
			'OBL' => array(
				'data_type' => 'string',
				'validation' => array(__CLASS__, 'validateObl'),
				'title' => Loc::getMessage('DB_KNIGA_OBL_FIELD'),
			),
			'PER' => array(
				'data_type' => 'string',
				'validation' => array(__CLASS__, 'validatePer'),
				'title' => Loc::getMessage('DB_KNIGA_PER_FIELD'),
			),
			'FOTO' => array(
				'data_type' => 'text',
				'title' => Loc::getMessage('DB_KNIGA_FOTO_FIELD'),
			),
		);
	}
	/**
	 * Returns validators for nazv field.
	 *
	 * @return array
	 */
	public static function validateNazv()
	{
		return array(
			new Main\Entity\Validator\Length(null, 255),
		);
	}
	/**
	 * Returns validators for izd field.
	 *
	 * @return array
	 */
	public static function validateIzd()
	{
		return array(
			new Main\Entity\Validator\Length(null, 255),
		);
	}
	/**
	 * Returns validators for obl field.
	 *
	 * @return array
	 */
	public static function validateObl()
	{
		return array(
			new Main\Entity\Validator\Length(null, 255),
		);
	}
	/**
	 * Returns validators for per field.
	 *
	 * @return array
	 */
	public static function validatePer()
	{
		return array(
			new Main\Entity\Validator\Length(null, 255),
		);
	}
}