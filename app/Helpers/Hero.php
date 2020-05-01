<?php
namespace App\Helpers;

use App\Model\Charac0;

class Hero
{
	public static $attrib1;
	public static $attrib2;
	public static $attrib3;
	public static $cid1;
	public static $cid2;
	public static $cid3;
	public static $cid4;
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
		$this->cid = $cid1;
		$this->cid = $cid2;
		$this->cid = $cid3;
		$this->cid = $cid4;
		$this->str = $str;
		$this->int = $int;
		$this->dex = $dex;
		$this->vit = $vit;
		$this->mana = $mana;
		$this->points = $points;
		$this->newstring1 = $newstring1;
	}

	//return value of the hero mbody part
	public static function get_hmbody($attrib1, $cid1)
		{
			$mbody = Charac0::where('c_id', $cid1)->first()->m_body;
			// dd($mbody);
			$temp = explode('\_1', $mbody);
			switch ($attrib1)
				{
					case 'EXP' :
						$EXP = explode('=',$temp[0]);
						return $EXP[1];
					break;

					case 'SKILL' :
						$SKILL = explode('=',$temp[1]);
						return $SKILL[1];
					break;

					case 'PK' :
						$PK = explode('=',$temp[2]);
						return $PK[1];
					break;

					case 'RTM' :
						$RTM = explode('=',$temp[3]);
						return $RTM[1];
					break;

					case 'SINFO' :
						$SINFO = explode('=',$temp[4]);
						return $SINFO[1];
					break;

					case 'WEAR' :
						$WEAR = explode('=',$temp[5]);
						return $WEAR[1];
					break;

					case 'INVEN' :
						$INVEN = explode('=',$temp[6]);
						return $INVEN[1];
					break;

					case 'PETINV' :
						$PETINV = explode('=',$temp[7]);
						return $PETINV[1];
					break;

					case 'CQUEST' :
						$CQUEST = explode('=',$temp[8]);
						return $CQUEST[1];
					break;

					case 'WAR' :
						$WAR = explode('=',$temp[9]);
						return $WAR[1];
					break;

					case 'SQUEST' :
						$SQUEST = explode('=',$temp[10]);
						return $SQUEST[1];
					break;

					case 'FAVOR' :
						$FAVOR = explode('=',$temp[11]);
						return $SQUEST[1];
					break;

					case 'PSKILL' :
						$PSKILL = explode('=',$temp[12]);
						return $PSKILL[1];
					break;

					case 'SKLSLT' :
						$SKLSLT = explode('=',$temp[13]);
						return $SKLSLT[1];
					break;

					case 'CHATOPT' :
						$CHATOPT = explode('=',$temp[14]);
						return $CHATOPT[1];
					break;

					case 'TYR' :
						$TYR = explode('=',$temp[15]);
						return $TYR[1];
					break;

					case 'SKILLEX' :
						$SKILLEX = explode('=',$temp[16]);
						return $SKILLEX[1];
					break;

					case 'SKLSLTEX' :
						$SKLSLTEX = explode('=',$temp[17]);
						return $SKLSLTEX[1];
					break;

					case 'PETACT' :
						$PETACT = explode('=',$temp[18]);
						return $PETACT[1];
					break;

					case 'LORE' :
						$LORE = explode('=',$temp[19]);
						return $LORE[1];
					break;

					case 'LQUEST' :
						$LQUEST = explode('=',$temp[20]);
						return $LQUEST[1];
					break;

					case 'RESRV0' :
						$RESRV0 = explode('=',$temp[21]);
						return $RESRV0[1];
					break;

					case 'RESRV1' :
						$RESRV1 = explode('=',$temp[22]);
						return $RESRV1[1];
					break;
				}
		}

	//return the whole  modified string
	public static function set_hmbody($attrib2, $newstring1, $cid2)
		{
			$mbody = Charac0::where('c_id', $cid2)->first()->m_body;
			$temp = explode('\_1', $mbody);
			switch ($attrib2)
				{
					case 'EXP' :
						$EXP = explode('=',$temp[0]);
						$EXP[1] = $newstring1;
						$temp[0] = implode('=', $EXP);
					break;

					case 'SKILL' :
						$SKILL = explode('=',$temp[1]);
						$SKILL[1] = $newstring1;
						$temp[1] = implode('=', $SKILL);
					break;

					case 'PK' :
						$PK = explode('=',$temp[2]);
						$PK[1] = $newstring1;
						$temp[2] = implode('=', $PK);
					break;

					case 'RTM' :
						$RTM = explode('=',$temp[3]);
						$RTM[1] = $newstring1;
						$temp[3] = implode('=', $RTM);
					break;

					case 'SINFO' :
						$SINFO = explode('=',$temp[4]);
						$SINFO[1] = $newstring1;
						$temp[4] = implode('=', $SINFO);
					break;

					case 'WEAR' :
						$WEAR = explode('=',$temp[5]);
						$WEAR[1] = $newstring1;
						$temp[5] = implode('=', $WEAR);
					break;

					case 'INVEN' :
						$INVEN = explode('=',$temp[6]);
						$INVEN[1] = $newstring1;
						$temp[6] = implode('=', $INVEN);
					break;

					case 'PETINV' :
						$PETINV = explode('=',$temp[7]);
						$PETINV[1] = $newstring1;
						$temp[7] = implode('=', $PETINV);
					break;

					case 'CQUEST' :
						$CQUEST = explode('=',$temp[8]);
						$CQUEST[1] = $newstring1;
						$temp[8] = implode('=', $CQUEST);
					break;

					case 'WAR' :
						$WAR = explode('=',$temp[9]);
						$WAR[1] = $newstring1;
						$temp[9] = implode('=', $WAR);
					break;

					case 'SQUEST' :
						$SQUEST = explode('=',$temp[10]);
						$SQUEST[1] = $newstring1;
						$temp[10] = implode('=', $SQUEST);
					break;

					case 'FAVOR' :
						$FAVOR = explode('=',$temp[11]);
						$SQUEST[1] = $newstring1;
						$temp[11] = implode('=', $FAVOR);
					break;

					case 'PSKILL' :
						$PSKILL = explode('=',$temp[12]);
						$PSKILL[1] = $newstring1;
						$temp[12] = implode('=', $PSKILL);
					break;

					case 'SKLSLT' :
						$SKLSLT = explode('=',$temp[13]);
						$SKLSLT[1] = $newstring1;
						$temp[13] = implode('=', $SKLSLT);
					break;

					case 'CHATOPT' :
						$CHATOPT = explode('=',$temp[14]);
						$CHATOPT[1] = $newstring1;
						$temp[14] = implode('=', $CHATOPT);
					break;

					case 'TYR' :
						$TYR = explode('=',$temp[15]);
						$TYR[1] = $newstring1;
						$temp[15] = implode('=', $TYR);
					break;

					case 'SKILLEX' :
						$SKILLEX = explode('=',$temp[16]);
						$SKILLEX[1] = $newstring1;
						$temp[16] = implode('=', $SKILLEX);
					break;

					case 'SKLSLTEX' :
						$SKLSLTEX = explode('=',$temp[17]);
						$SKLSLTEX[1] = $newstring1;
						$temp[17] = implode('=', $SKLSLTEX);
					break;

					case 'PETACT' :
						$PETACT = explode('=',$temp[18]);
						$PETACT[1] = $newstring1;
						$temp[18] = implode('=', $PETACT);
					break;

					case 'LORE' :
						$LORE = explode('=',$temp[19]);
						$LORE[1] = $newstring1;
						$temp[19] = implode('=', $LORE);
					break;

					case 'LQUEST' :
						$LQUEST = explode('=',$temp[20]);
						$LQUEST[1] = $newstring1;
						$temp[20] = implode('=', $LQUEST);
					break;

					case 'RESRV0' :
						$RESRV0 = explode('=',$temp[21]);
						$RESRV0[1] = $newstring1;
						$temp[21] = implode('=', $RESRV0);
					break;

					case 'RESRV1' :
						$RESRV1 = explode('=',$temp[22]);
						$RESRV1[1] = $newstring1;
						$temp[22] = implode('=', $RESRV1);
					break;
				}
			return implode('\_1', $temp);
		}

	//return whole edited value of the c_headera
	public static function set_cheadera($str, $int, $dex, $vit, $mana, $points, $cid3)
		{
			$stat = Charac0::where('c_id', $cid3)->first()->c_headera;
			$stat_temp = explode (';', $stat);
			$stat_temp[0] = $str;
			$stat_temp[1] = $int;
			$stat_temp[2] = $dex;
			$stat_temp[3] = $vit;
			$stat_temp[4] = $mana;
			$stat_temp[5] = $points;
			return implode(';', $stat_temp);
		}

	//return part of the string from c_headera
	public static function get_cheadera($attrib3, $cid4)
		{
			$stat = Charac0::where('c_id', $cid4)->first()->c_headera;
			$stat_temp = explode (';', $stat);
			switch($attrib3)
				{
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