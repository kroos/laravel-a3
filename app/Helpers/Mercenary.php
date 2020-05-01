<?php
namespace App\Helpers;

use App\Model\HSTable;

class Mercenary
{
	public static $attrib1;
	public static $attrib2;
	public static $attrib3;
	public static $hsid1;
	public static $hsid2;
	public static $hsid3;
	public static $hsid4;
	public static $str;
	public static $int;
	public static $dex;
	public static $vit;
	public static $mana;
	public static $points;
	public static $newstring1;

	public function __construct()
	{
		$this->attrib1 = $attrib1;
		$this->attrib2 = $attrib2;
		$this->attrib3 = $attrib3;
		$this->hsid = $hsid1;
		$this->hsid = $hsid2;
		$this->hsid = $hsid3;
		$this->hsid = $hsid4;
		$this->str = $str;
		$this->int = $int;
		$this->dex = $dex;
		$this->vit = $vit;
		$this->mana = $mana;
		$this->points = $points;
		$this->newstring1 = $newstring1;
	}

	// return value of the mercenary hsbody part
	public static function get_hsbody($attrib1, $hsid1) {
		$mbody = HSTable::where('HSID', $hsid1)->first()->HSBody;
		$temp = preg_split("/[\s]+/", $mbody);
		switch ($attrib1)
			{
				case 'SKILL' :
					$SKILL = explode('=',$temp[0]);
					return $SKILL[1];
				break;
	
				case 'PK' :
					$PK = explode('=',$temp[1]);
					return $PK[1];
				break;
	
				case 'WEAR' :
					$WEAR = explode('=',$temp[2]);
					return $WEAR[1];
				break;
	
				case 'OPTION' :
					$OPTION = explode('=',$temp[3]);
					return $OPTION[1];
				break;
			}
	}

	//return the whole  modified string
	public static function set_hsbody($attrib2, $newstring1, $hsid2) {
		$mbody = HSTable::where('HSID', $hsid2)->first()->HSBody;
		$temp = preg_split("/[\s]+/", $mbody);
		switch ($attrib2) {
			case 'SKILL' :
				$SKILL = explode('=',$temp[0]);
				$SKILL[1] = $newstring1;
				$temp[0] = implode('=', $SKILL);
			break;

			case 'PK' :
				$PK = explode('=',$temp[1]);
				$PK[1] = $newstring1;
				$temp[1] = implode('=', $PK);
			break;

			case 'WEAR' :
				$WEAR = explode('=',$temp[2]);
				$WEAR[1] = $newstring1;
				$temp[2] = implode('=', $WEAR);
			break;

			case 'OPTION' :
				$OPTION = explode('=',$temp[3]);
				$OPTION[1] = $newstring1;
				$temp[3] = implode('=', $OPTION);
			break;
		}
		return implode(' ', $temp);
	}

	// return whole edited value of the Ability
	public static function set_ability($str, $int, $dex, $vit, $mana, $points, $hsid3) {
		$stat = HSTable::where('HSID', $hsid3)->first()->Ability;
		$stat_temp = explode (';', $stat);
		$stat_temp[0] = $str;
		$stat_temp[1] = $int;
		$stat_temp[2] = $dex;
		$stat_temp[3] = $vit;
		$stat_temp[4] = $mana;
		$stat_temp[5] = $points;
		return implode(';', $stat_temp);
	}

	// return part of the string from Ability
	public static function get_ability($attrib3, $hsid4) {
		$stat = HSTable::where('HSID', $hsid4)->first()->Ability;
		$stat_temp = explode (';', $stat);
		switch($attrib3) {
			case 'STR':
				return $stat_temp[0];
			break;

			case 'INT':
				return $stat_temp[1];
			break;

			case 'DEX':
				return $stat_temp[2];
			break;

			case 'VIT':
				return $stat_temp[3];
			break;

			case 'MANA':
				return $stat_temp[4];
			break;

			case 'POINTS':
				return $stat_temp[5];
			break;
		}
	}
}