<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// load helper
use App\Helpers\Hero;

// load validation
use App\Http\Requests\OfflineTownPortalRequest;
use App\Http\Requests\AcquireSuperShueRequest;
use App\Http\Requests\BuyLoreRequest;
use App\Http\Requests\MercenaryRebirthRequest;

// load carbon
use Carbon\Carbon;

// load model
use App\Model\Account;
use App\Model\Charac0;
use App\Model\HSTable;
use App\Model\HS;

// load session
use Session;



class NormalController extends Controller
{
	public function __construct()
	{
		$this->middleware(['auth', 'verified']);
		$this->middleware('ownOTP')->only(['offedit', 'offupdate']);
		$this->middleware('ownASShue')->only(['asshueedit', 'asshueupdate']);
		$this->middleware('ownBASkill')->only(['basedit', 'basupdate']);
		$this->middleware('ownESSS')->only(['essshedit', 'essshupdate']);
		$this->middleware('ownBLore')->only(['buyloreedit', 'buyloreupdate']);
		$this->middleware('ownHRebirth')->only(['herorebirthedit', 'herorebirthupdate']);
		$this->middleware('ownHRRebirth')->only(['heroresetrebirthedit', 'heroresetrebirthupdate']);
		$this->middleware('ownMRebirth')->only(['mercenaryrebirthedit', 'mercenaryrebirthupdate']);
		$this->middleware('ownMRRebirth')->only(['mercenaryresetrebirthedit', 'mercenaryresetrebirthupdate']);
	}

	public function offedit(Account $offline_town_portal)
	{
		return view('normal.offlinetownportal', compact('offline_town_portal'));
	}

	public function offupdate(OfflineTownPortalRequest $request, Account $offline_town_portal)
	{
		// dd($request->all());
		$offline_town_portal->hasmanycharac()->where('c_id', $request->c_id)->update($request->only('c_headerb'));
		Session::flash('flash_message', 'Data successfully updated!');
		return redirect(route('off.edit', \Auth::user()->c_id));
	}

	public function asshueedit(Account $acquire_super_shue)
	{
		return view('normal.acquiresupershue', compact('acquire_super_shue'));
	}

	public function asshueupdate(AcquireSuperShueRequest $request, Account $acquire_super_shue)
	{
		$core = $acquire_super_shue->hasmanycharac()->where('c_id', $request->c_id);

		// get c_sheaderb (type)
		$type = $core->first()->c_sheaderb;
		$level = $core->first()->c_sheaderc;
		$wz = $core->first()->c_headerc;
		$rb = $core->first()->rb;

		// echo Hero::set_hmbody('PETACT', config('a3.shero'.$type), $request->c_id);

		if($rb >= 1){
			if ($wz >= config('a3.wzacquireshue')) {
				$acquire_super_shue->hasmanycharac()->where('c_id', $request->c_id)->update([
					'm_body' => Hero::set_hmbody('PETACT', config('a3.shero'.$type), $request->c_id),
					'c_headerc' => $wz - config('a3.wzacquireshue'),
				]);
				Session::flash('flash_message', 'Success acquire super shue.');
			} else {
				Session::flash('flash_message', 'Minimum Wz requirement is '.config('a3.wzacquireshue'));
			}
		} else {
			if($level >= config('a3.levelacquireshue')){
				if ($wz >= config('a3.wzacquireshue')) {
					$acquire_super_shue->hasmanycharac()->where('c_id', $request->c_id)->update([
						'm_body' => Hero::set_hmbody('PETACT', config('a3.shero'.$type), $request->c_id),
					]);
					Session::flash('flash_message', 'Success acquire super shue.');
				} else {
					Session::flash('flash_message', 'Minimum Wz requirement is '.config('a3.wzacquireshue'));
				}
			} else {
				Session::flash('flash_message', 'Minimum Level requirement is '.config('a3.levelacquireshue'));
			}
		}
		return redirect(route('asshue.edit', \Auth::user()->c_id));
	}

	public function basedit(Account $buy_all_skill)
	{
		return view('normal.buyallskill', compact('buy_all_skill'));
	}

	public function basupdate(AcquireSuperShueRequest $request, Account $buy_all_skill)
	{
		$core = $buy_all_skill->hasmanycharac()->where('c_id', $request->c_id);

		// get c_sheaderb (type)
		$type = $core->first()->c_sheaderb;
		$level = $core->first()->c_sheaderc;
		$wz = $core->first()->c_headerc;
		$rb = $core->first()->rb;

		// dd(Hero::set_hmbody('SKILL', config('a3.skhero'.$type), $request->c_id));

		if ($rb >= 1) {
			if ($wz >= config('a3.wzbuyskill')) {
				$buy_all_skill->hasmanycharac()->where('c_id', $request->c_id)->update([
					'm_body' => Hero::set_hmbody('SKILL', config('a3.skhero'.$type), $request->c_id),
				]);
				Session::flash('flash_message', 'Data successfully updated!');
			} else {
				Session::flash('flash_message', 'Minimum Wz requirement is '.config('a3.wzbuyskill'));
			}
		} else {
			if($level >= config('a3.levelbuyskill')){
				if ($wz >= config('a3.wzbuyskill')) {
					$buy_all_skill->hasmanycharac()->where('c_id', $request->c_id)->update([
						'm_body' => Hero::set_hmbody('SKILL', config('a3.skhero'.$type), $request->c_id),
						'c_headerc' => $wz - config('a3.wzbuyskill'),
					]);
					Session::flash('flash_message', 'Data successfully updated!');
				} else {
					Session::flash('flash_message', 'Minimum Wz requirement is '.config('a3.wzbuyskill'));
				}
			} else {
				Session::flash('flash_message', 'Minimum Level requirement is '.config('a3.levelbuyskill'));
			}
		}
		return redirect(route('asshue.edit', \Auth::user()->c_id));
	}

	public function essshedit(Account $equip_super_super_shue)
	{
		return view('normal.equipsupersupershue', compact('equip_super_super_shue'));
	}

	public function essshupdate(AcquireSuperShueRequest $request, Account $equip_super_super_shue)
	{
		$core = $equip_super_super_shue->hasmanycharac()->where('c_id', $request->c_id);
		$wz = $core->first()->c_headerc;
		$type = $core->first()->c_sheaderb;
		$mbody = $core->first()->m_body;

		//explode the string
		$temp = explode("\_1",$mbody);

		//initialize variable for the string
		$PETINV = explode("=",$temp[7]);
		$PETACT = explode("=",$temp[18]);

		############################################################################################

		//--------------------get PETINV values----------------------------------
		$PETINV[1] = Hero::get_hmbody('PETINV', $request->c_id);
		// dd($PETINV[1]);

		//--------------------explode PETINV values----------------------------------
		$TEMPPETINV = explode(";",$PETINV[1]);
		$count = count($TEMPPETINV);
		// dd( count($TEMPPETINV) );
		// dd($TEMPPETINV);

		$sstype = config('a3.ssshuehero'.$type);
		// dd($sstype);

		//explode sstype for making a different between sstype n shue in inventory
		$temp_sstype = explode (";",$sstype);
		$partial_sstype = $temp_sstype [0].";".$temp_sstype [1];
		// dd($partial_sstype);

		if ($wz >= config('a3.wzequipsss')) {
			if ($PETINV[1] != NULL) {
				if($count == 4) {
					//sss in 1st shue inventory
					$sss_one = $TEMPPETINV[0].";".$TEMPPETINV[1].";".$TEMPPETINV[2].";".$TEMPPETINV[3];
					$part_sss_one = $TEMPPETINV[0].";".$TEMPPETINV[1];
					//echo "$sss_one sss_one<br />";

					if($partial_sstype == $part_sss_one) {
						//change the petact value value
						$PETACT[1] = $sss_one;
						//construct back the string by changing shue inventory 1 and left others
						$newString1 = $temp[0]."\_1".$temp[1]."\_1".$temp[2]."\_1".$temp[3]."\_1".$temp[4]."\_1".$temp[5]."\_1".$temp[6]."\_1".$PETINV[0]."=".$sss_two.";".$sss_three.";".$sss_four.";".$sss_five."\_1".$temp[8]."\_1".$temp[9]."\_1".$temp[10]."\_1".$temp[11]."\_1".$temp[12]."\_1".$temp[13]."\_1".$temp[14]."\_1".$temp[15]."\_1".$temp[16]."\_1".$temp[17]."\_1".$PETACT[0]."=".$PETACT[1]."\_1".$temp[19]."\_1".$temp[20]."\_1".$temp[21]."\_1".$temp[22]."\_1";
						//echo "$newString1";
						$message = 'Succesfull equip your super super shue.';
					} else {
						$newString1 = $mbody;
						$wz = $wz + config('a3.wzequipsss');													// to make sure that there is no wz been decrease
						$message = 'Sorry, you don\'t have super super shue in your shue inventory';
					}

				} elseif ($count == 8) {
					//sss in 1st shue inventory
					$sss_one = $TEMPPETINV[0].";".$TEMPPETINV[1].";".$TEMPPETINV[2].";".$TEMPPETINV[3];
					$part_sss_one = $TEMPPETINV[0].";".$TEMPPETINV[1];
					//echo "$sss_one sss_one<br />";

					//sss in 2nd shue inventory
					$sss_two = $TEMPPETINV[4].";".$TEMPPETINV[5].";".$TEMPPETINV[6].";".$TEMPPETINV[7];
					$part_sss_two = $TEMPPETINV[4].";".$TEMPPETINV[5];
					//echo "$sss_two <br>";

					if($partial_sstype == $part_sss_one) {
						//change the petact value value
						$PETACT[1] = $sss_one;
						//construct back the string by changing shue inventory 1 and left others
						$newString1 = $temp[0]."\_1".$temp[1]."\_1".$temp[2]."\_1".$temp[3]."\_1".$temp[4]."\_1".$temp[5]."\_1".$temp[6]."\_1".$PETINV[0]."=".$sss_two.";".$sss_three.";".$sss_four.";".$sss_five."\_1".$temp[8]."\_1".$temp[9]."\_1".$temp[10]."\_1".$temp[11]."\_1".$temp[12]."\_1".$temp[13]."\_1".$temp[14]."\_1".$temp[15]."\_1".$temp[16]."\_1".$temp[17]."\_1".$PETACT[0]."=".$PETACT[1]."\_1".$temp[19]."\_1".$temp[20]."\_1".$temp[21]."\_1".$temp[22]."\_1";
						//echo "$newString1";
						$message = 'Succesfull equip your super super shue.';
					} elseif ($partial_sstype == $part_sss_two) {
						//change the petact value value
						$PETACT[1] = $sss_two;
						//construct back the string by changing shue inventory 2 and left others
						$newString1 = $temp[0]."\_1".$temp[1]."\_1".$temp[2]."\_1".$temp[3]."\_1".$temp[4]."\_1".$temp[5]."\_1".$temp[6]."\_1".$PETINV[0]."=".$sss_one.";".$sss_three.";".$sss_four.";".$sss_five."\_1".$temp[8]."\_1".$temp[9]."\_1".$temp[10]."\_1".$temp[11]."\_1".$temp[12]."\_1".$temp[13]."\_1".$temp[14]."\_1".$temp[15]."\_1".$temp[16]."\_1".$temp[17]."\_1".$PETACT[0]."=".$PETACT[1]."\_1".$temp[19]."\_1".$temp[20]."\_1".$temp[21]."\_1".$temp[22]."\_1";
						//echo "$newString12";
						$message = 'Succesfull equip your super super shue.';
					} else {
						$newString1 = $mbody;
						$wz = $wz + config('a3.wzequipsss');
						$message = 'Sorry, you don\'t have super super shue in your shue inventory';
					}

				} elseif ($count == 12) {
					//sss in 1st shue inventory
					$sss_one = $TEMPPETINV[0].";".$TEMPPETINV[1].";".$TEMPPETINV[2].";".$TEMPPETINV[3];
					$part_sss_one = $TEMPPETINV[0].";".$TEMPPETINV[1];
					//echo "$sss_one sss_one<br />";

					//sss in 2nd shue inventory
					$sss_two = $TEMPPETINV[4].";".$TEMPPETINV[5].";".$TEMPPETINV[6].";".$TEMPPETINV[7];
					$part_sss_two = $TEMPPETINV[4].";".$TEMPPETINV[5];
					//echo "$sss_two <br>";

					//sss in 3rd shue inventory
					$sss_three = $TEMPPETINV[8].";".$TEMPPETINV[9].";".$TEMPPETINV[10].";".$TEMPPETINV[11];
					$part_sss_three = $TEMPPETINV[8].";".$TEMPPETINV[9];
					//echo "$sss_three <br>";

					if($partial_sstype == $part_sss_one) {
						//change the petact value value
						$PETACT[1] = $sss_one;
						//construct back the string by changing shue inventory 1 and left others
						$newString1 = $temp[0]."\_1".$temp[1]."\_1".$temp[2]."\_1".$temp[3]."\_1".$temp[4]."\_1".$temp[5]."\_1".$temp[6]."\_1".$PETINV[0]."=".$sss_two.";".$sss_three.";".$sss_four.";".$sss_five."\_1".$temp[8]."\_1".$temp[9]."\_1".$temp[10]."\_1".$temp[11]."\_1".$temp[12]."\_1".$temp[13]."\_1".$temp[14]."\_1".$temp[15]."\_1".$temp[16]."\_1".$temp[17]."\_1".$PETACT[0]."=".$PETACT[1]."\_1".$temp[19]."\_1".$temp[20]."\_1".$temp[21]."\_1".$temp[22]."\_1";
						//echo "$newString1";
						$message = 'Succesfull equip your super super shue.';
					} elseif ($partial_sstype == $part_sss_two) {
						//change the petact value value
						$PETACT[1] = $sss_two;
						//construct back the string by changing shue inventory 2 and left others
						$newString1 = $temp[0]."\_1".$temp[1]."\_1".$temp[2]."\_1".$temp[3]."\_1".$temp[4]."\_1".$temp[5]."\_1".$temp[6]."\_1".$PETINV[0]."=".$sss_one.";".$sss_three.";".$sss_four.";".$sss_five."\_1".$temp[8]."\_1".$temp[9]."\_1".$temp[10]."\_1".$temp[11]."\_1".$temp[12]."\_1".$temp[13]."\_1".$temp[14]."\_1".$temp[15]."\_1".$temp[16]."\_1".$temp[17]."\_1".$PETACT[0]."=".$PETACT[1]."\_1".$temp[19]."\_1".$temp[20]."\_1".$temp[21]."\_1".$temp[22]."\_1";
						//echo "$newString12";
						$message = 'Succesfull equip your super super shue.';
					} elseif ($partial_sstype == $part_sss_three) {
						//change the petact value value
						$PETACT[1] = $sss_three;
						//construct back the string by changing shue inventory 3 and left others
						$newString1 = $temp[0]."\_1".$temp[1]."\_1".$temp[2]."\_1".$temp[3]."\_1".$temp[4]."\_1".$temp[5]."\_1".$temp[6]."\_1".$PETINV[0]."=".$sss_one.";".$sss_two.";".$sss_four.";".$sss_five."\_1".$temp[8]."\_1".$temp[9]."\_1".$temp[10]."\_1".$temp[11]."\_1".$temp[12]."\_1".$temp[13]."\_1".$temp[14]."\_1".$temp[15]."\_1".$temp[16]."\_1".$temp[17]."\_1".$PETACT[0]."=".$PETACT[1]."\_1".$temp[19]."\_1".$temp[20]."\_1".$temp[21]."\_1".$temp[22]."\_1";
						//echo "$newString123";
						$message = 'Succesfull equip your super super shue.';
					} else {
						$newString1 = $mbody;
						$wz = $wz + config('a3.wzequipsss');
						$message = 'Sorry, you don\'t have super super shue in your shue inventory';
					}

				} elseif ($count == 16) {
					//sss in 1st shue inventory
					$sss_one = $TEMPPETINV[0].";".$TEMPPETINV[1].";".$TEMPPETINV[2].";".$TEMPPETINV[3];
					$part_sss_one = $TEMPPETINV[0].";".$TEMPPETINV[1];
					//echo "$sss_one sss_one<br />";

					//sss in 2nd shue inventory
					$sss_two = $TEMPPETINV[4].";".$TEMPPETINV[5].";".$TEMPPETINV[6].";".$TEMPPETINV[7];
					$part_sss_two = $TEMPPETINV[4].";".$TEMPPETINV[5];
					//echo "$sss_two <br>";

					//sss in 3rd shue inventory
					$sss_three = $TEMPPETINV[8].";".$TEMPPETINV[9].";".$TEMPPETINV[10].";".$TEMPPETINV[11];
					$part_sss_three = $TEMPPETINV[8].";".$TEMPPETINV[9];
					//echo "$sss_three <br>";

					//sss in 4th shue inventory
					$sss_four = $TEMPPETINV[12].";".$TEMPPETINV[13].";".$TEMPPETINV[14].";".$TEMPPETINV[15];
					$part_sss_four = $TEMPPETINV[12].";".$TEMPPETINV[13];
					//echo "$sss_four <br>";

					if($partial_sstype == $part_sss_one) {
						//change the petact value value
						$PETACT[1] = $sss_one;
						//construct back the string by changing shue inventory 1 and left others
						$newString1 = $temp[0]."\_1".$temp[1]."\_1".$temp[2]."\_1".$temp[3]."\_1".$temp[4]."\_1".$temp[5]."\_1".$temp[6]."\_1".$PETINV[0]."=".$sss_two.";".$sss_three.";".$sss_four.";".$sss_five."\_1".$temp[8]."\_1".$temp[9]."\_1".$temp[10]."\_1".$temp[11]."\_1".$temp[12]."\_1".$temp[13]."\_1".$temp[14]."\_1".$temp[15]."\_1".$temp[16]."\_1".$temp[17]."\_1".$PETACT[0]."=".$PETACT[1]."\_1".$temp[19]."\_1".$temp[20]."\_1".$temp[21]."\_1".$temp[22]."\_1";
						//echo "$newString1";
						$message = 'Succesfull equip your super super shue.';
					} elseif ($partial_sstype == $part_sss_two) {
						//change the petact value value
						$PETACT[1] = $sss_two;
						//construct back the string by changing shue inventory 2 and left others
						$newString1 = $temp[0]."\_1".$temp[1]."\_1".$temp[2]."\_1".$temp[3]."\_1".$temp[4]."\_1".$temp[5]."\_1".$temp[6]."\_1".$PETINV[0]."=".$sss_one.";".$sss_three.";".$sss_four.";".$sss_five."\_1".$temp[8]."\_1".$temp[9]."\_1".$temp[10]."\_1".$temp[11]."\_1".$temp[12]."\_1".$temp[13]."\_1".$temp[14]."\_1".$temp[15]."\_1".$temp[16]."\_1".$temp[17]."\_1".$PETACT[0]."=".$PETACT[1]."\_1".$temp[19]."\_1".$temp[20]."\_1".$temp[21]."\_1".$temp[22]."\_1";
						//echo "$newString12";
						$message = 'Succesfull equip your super super shue.';
					} elseif ($partial_sstype == $part_sss_three) {
						//change the petact value value
						$PETACT[1] = $sss_three;
						//construct back the string by changing shue inventory 3 and left others
						$newString1 = $temp[0]."\_1".$temp[1]."\_1".$temp[2]."\_1".$temp[3]."\_1".$temp[4]."\_1".$temp[5]."\_1".$temp[6]."\_1".$PETINV[0]."=".$sss_one.";".$sss_two.";".$sss_four.";".$sss_five."\_1".$temp[8]."\_1".$temp[9]."\_1".$temp[10]."\_1".$temp[11]."\_1".$temp[12]."\_1".$temp[13]."\_1".$temp[14]."\_1".$temp[15]."\_1".$temp[16]."\_1".$temp[17]."\_1".$PETACT[0]."=".$PETACT[1]."\_1".$temp[19]."\_1".$temp[20]."\_1".$temp[21]."\_1".$temp[22]."\_1";
						//echo "$newString123";
						$message = 'Succesfull equip your super super shue.';
					} elseif ($partial_sstype == $part_sss_four) {
						//change the petact value value
						$PETACT[1] = $sss_four;
						//construct back the string by changing shue inventory 4 and left others
						$newString1 = $temp[0]."\_1".$temp[1]."\_1".$temp[2]."\_1".$temp[3]."\_1".$temp[4]."\_1".$temp[5]."\_1".$temp[6]."\_1".$PETINV[0]."=".$sss_one.";".$sss_two.";".$sss_three.";".$sss_five."\_1".$temp[8]."\_1".$temp[9]."\_1".$temp[10]."\_1".$temp[11]."\_1".$temp[12]."\_1".$temp[13]."\_1".$temp[14]."\_1".$temp[15]."\_1".$temp[16]."\_1".$temp[17]."\_1".$PETACT[0]."=".$PETACT[1]."\_1".$temp[19]."\_1".$temp[20]."\_1".$temp[21]."\_1".$temp[22]."\_1";
						//echo "$newString1234";
						$message = 'Succesfull equip your super super shue.';
					} else {
						$newString1 = $mbody;
						$wz = $wz + config('a3.wzequipsss');
						$message = 'Sorry, you don\'t have super super shue in your shue inventory';
					}

				} elseif ($count == 20) {
					//sss in 1st shue inventory
					$sss_one = $TEMPPETINV[0].";".$TEMPPETINV[1].";".$TEMPPETINV[2].";".$TEMPPETINV[3];
					$part_sss_one = $TEMPPETINV[0].";".$TEMPPETINV[1];
					//echo "$sss_one sss_one<br />";

					//sss in 2nd shue inventory
					$sss_two = $TEMPPETINV[4].";".$TEMPPETINV[5].";".$TEMPPETINV[6].";".$TEMPPETINV[7];
					$part_sss_two = $TEMPPETINV[4].";".$TEMPPETINV[5];
					//echo "$sss_two <br>";

					//sss in 3rd shue inventory
					$sss_three = $TEMPPETINV[8].";".$TEMPPETINV[9].";".$TEMPPETINV[10].";".$TEMPPETINV[11];
					$part_sss_three = $TEMPPETINV[8].";".$TEMPPETINV[9];
					//echo "$sss_three <br>";

					//sss in 4th shue inventory
					$sss_four = $TEMPPETINV[12].";".$TEMPPETINV[13].";".$TEMPPETINV[14].";".$TEMPPETINV[15];
					$part_sss_four = $TEMPPETINV[12].";".$TEMPPETINV[13];
					//echo "$sss_four <br>";

					//sss in 5th shue inventory
					$sss_five = $TEMPPETINV[16].";".$TEMPPETINV[17].";".$TEMPPETINV[18].";".$TEMPPETINV[19];
					$part_sss_five = $TEMPPETINV[16].";".$TEMPPETINV[17];
					//echo "$sss_five <br>";

					if($partial_sstype == $part_sss_one) {
						//change the petact value value
						$PETACT[1] = $sss_one;
						//construct back the string by changing shue inventory 1 and left others
						$newString1 = $temp[0]."\_1".$temp[1]."\_1".$temp[2]."\_1".$temp[3]."\_1".$temp[4]."\_1".$temp[5]."\_1".$temp[6]."\_1".$PETINV[0]."=".$sss_two.";".$sss_three.";".$sss_four.";".$sss_five."\_1".$temp[8]."\_1".$temp[9]."\_1".$temp[10]."\_1".$temp[11]."\_1".$temp[12]."\_1".$temp[13]."\_1".$temp[14]."\_1".$temp[15]."\_1".$temp[16]."\_1".$temp[17]."\_1".$PETACT[0]."=".$PETACT[1]."\_1".$temp[19]."\_1".$temp[20]."\_1".$temp[21]."\_1".$temp[22]."\_1";
						//echo "$newString1";
						$message = 'Succesfull equip your super super shue.';
					} elseif ($partial_sstype == $part_sss_two) {
						//change the petact value value
						$PETACT[1] = $sss_two;
						//construct back the string by changing shue inventory 2 and left others
						$newString1 = $temp[0]."\_1".$temp[1]."\_1".$temp[2]."\_1".$temp[3]."\_1".$temp[4]."\_1".$temp[5]."\_1".$temp[6]."\_1".$PETINV[0]."=".$sss_one.";".$sss_three.";".$sss_four.";".$sss_five."\_1".$temp[8]."\_1".$temp[9]."\_1".$temp[10]."\_1".$temp[11]."\_1".$temp[12]."\_1".$temp[13]."\_1".$temp[14]."\_1".$temp[15]."\_1".$temp[16]."\_1".$temp[17]."\_1".$PETACT[0]."=".$PETACT[1]."\_1".$temp[19]."\_1".$temp[20]."\_1".$temp[21]."\_1".$temp[22]."\_1";
						//echo "$newString12";
						$message = 'Succesfull equip your super super shue.';
					} elseif ($partial_sstype == $part_sss_three) {
						//change the petact value value
						$PETACT[1] = $sss_three;
						//construct back the string by changing shue inventory 3 and left others
						$newString1 = $temp[0]."\_1".$temp[1]."\_1".$temp[2]."\_1".$temp[3]."\_1".$temp[4]."\_1".$temp[5]."\_1".$temp[6]."\_1".$PETINV[0]."=".$sss_one.";".$sss_two.";".$sss_four.";".$sss_five."\_1".$temp[8]."\_1".$temp[9]."\_1".$temp[10]."\_1".$temp[11]."\_1".$temp[12]."\_1".$temp[13]."\_1".$temp[14]."\_1".$temp[15]."\_1".$temp[16]."\_1".$temp[17]."\_1".$PETACT[0]."=".$PETACT[1]."\_1".$temp[19]."\_1".$temp[20]."\_1".$temp[21]."\_1".$temp[22]."\_1";
						//echo "$newString123";
						$message = 'Succesfull equip your super super shue.';
					} elseif ($partial_sstype == $part_sss_four) {
						//change the petact value value
						$PETACT[1] = $sss_four;
						//construct back the string by changing shue inventory 4 and left others
						$newString1 = $temp[0]."\_1".$temp[1]."\_1".$temp[2]."\_1".$temp[3]."\_1".$temp[4]."\_1".$temp[5]."\_1".$temp[6]."\_1".$PETINV[0]."=".$sss_one.";".$sss_two.";".$sss_three.";".$sss_five."\_1".$temp[8]."\_1".$temp[9]."\_1".$temp[10]."\_1".$temp[11]."\_1".$temp[12]."\_1".$temp[13]."\_1".$temp[14]."\_1".$temp[15]."\_1".$temp[16]."\_1".$temp[17]."\_1".$PETACT[0]."=".$PETACT[1]."\_1".$temp[19]."\_1".$temp[20]."\_1".$temp[21]."\_1".$temp[22]."\_1";
						//echo "$newString1234";
						$message = 'Succesfull equip your super super shue.';
					} elseif ($partial_sstype == $part_sss_five) {
						//change the petact value value
						$PETACT[1] = $sss_five;
						//construct back the string by changing shue inventory 5 and left others
						$newString1 = $temp[0]."\_1".$temp[1]."\_1".$temp[2]."\_1".$temp[3]."\_1".$temp[4]."\_1".$temp[5]."\_1".$temp[6]."\_1".$PETINV[0]."=".$sss_one.";".$sss_two.";".$sss_three.";".$sss_four."\_1".$temp[8]."\_1".$temp[9]."\_1".$temp[10]."\_1".$temp[11]."\_1".$temp[12]."\_1".$temp[13]."\_1".$temp[14]."\_1".$temp[15]."\_1".$temp[16]."\_1".$temp[17]."\_1".$PETACT[0]."=".$PETACT[1]."\_1".$temp[19]."\_1".$temp[20]."\_1".$temp[21]."\_1".$temp[22]."\_1";
						//echo "$newString12345";
						$message = 'Succesfull equip your super super shue.';
					} elseif ($partial_sstype !== $part_sss_one && $partial_sstype !== $part_sss_two && $partial_sstype !== $part_sss_three && $partial_sstype !== $part_sss_four && $partial_sstype !== $part_sss_five ) {
						$newString1 = $mbody;
						$message = 'Sorry, you don\'t have super super shue in your shue inventory';
					} else {
						$newString1 = $mbody;
						$wz = $wz + config('a3.wzequipsss');
						$message = 'Sorry, you don\'t have super super shue in your shue inventory';
					}
				}

				//--------------- equipping sss operation to char begin-----------------------------
				$equip_super_super_shue->hasmanycharac()->where('c_id', $request->c_id)->update([
					'm_body' => $newString1,
					'c_headerc' => $wz - config('a3.wzequipsss'),
				]);
				Session::flash('flash_message', $message);
			} else {
				Session::flash('flash_message', 'I find nothing inside your shue inventory. Please put your super super shue inside your shue inventory and its already have been revived with shue potion');
			}
		} else {
			Session::flash('flash_message', 'Minimum Wz requirement is '.config('a3.wzequipsss'));
		}
		return redirect(route('esssh.edit', \Auth::user()->c_id));
	}

	public function buyloreedit(Account $buy_lore)
	{
		return view('normal.buylore', compact('buy_lore'));
	}

	public function buyloreupdate(BuyLoreRequest $request, Account $buy_lore)
	{
		$core = $buy_lore->hasmanycharac()->where('c_id', $request->c_id);
		$wz = $core->first()->c_headerc;
		$type = $core->first()->c_sheaderb;
		$mbody = $core->first()->m_body;
		$rb = $core->first()->rb;
		$rbtimes = $core->first()->times_rb;

		$reqwz = $request->lore * config('a3.buy_lore');

		$newlore = Hero::get_hmbody('LORE', $request->c_id);

		if ($rb >= config('a3.lore_rb_buy') || $rbtimes >= 1) {
			if($wz >= $reqwz) {
				//change the lore value
				// dd(Hero::get_hmbody('LORE', $request->c_id), $request->c_id);
				$newlore += $request->lore;
				dd($newlore);

				//initializing wz
				$newwz = $wz - $reqwz;
				// echo $newwz.' new wz.<br />';
				$message = 'Success buy lore';
			} else {
				$newwz = $wz;
				$message = 'Insufficient Wz';
			}
		} else {
			$newwz = $wz;
			$message = "Your current rebirth lvl is $rb, you need at least rebirth lvl ".config('a3.lore_rb_buy')." to buy lore";
		}
		// echo $newlore.'<br />'.$newwz.'<br />'.$message;
		$buy_lore->hasmanycharac()->where('c_id', $request->c_id)->update([
			'm_body' => Hero::set_hmbody('LORE', $newlore, $request->c_id),
			'c_headerc' => $newwz,
		]);
		Session::flash('flash_message', $message);
		return redirect(route('buylore.edit', \Auth::user()->c_id));
	}

	public function herorebirthedit(Account $hero_rebirth)
	{
		return view('normal.herorebirth', compact(['hero_rebirth']));
	}

	public function herorebirthupdate(AcquireSuperShueRequest $request, Account $hero_rebirth)
	{
		$core = $hero_rebirth->hasmanycharac()->where('c_id', $request->c_id);
		$wz = $core->first()->c_headerc;
		$type = $core->first()->c_sheaderb;
		$level = $core->first()->c_sheaderc;
		$mbody = $core->first()->m_body;
		$rb = $core->first()->rb;
		$rbtimes = $core->first()->times_rb;
		$exp = Hero::get_hmbody('EXP', $request->c_id);

		$rblvl = config('a3.rebirthlevel');				// minimum lvl to rebirth
		$rbwz = config('a3.rebirthwz');				// minimum wz to rebirth

		$wzforrb = $rbwz * $rb;

		$lvlforrb = $rb + $rblvl;

		// check wz
		if ($wz >= $wzforrb) {
			if($level >= $lvlforrb) {
				$newexp = 0;
				$newwz = $wz - $wzforrb;
				$newlevel = 1;
				$newrb = $rb + 1;
				$message = 'Successfull update data!';

				$hero_rebirth->hasmanycharac()->where('c_id', $request->c_id)->update([
					'm_body' => Hero::set_hmbody('EXP', $newexp, $request->c_id),
					'c_headerc' => $newwz,
					'c_sheaderc' => $newlevel,
					'rb' => $newrb,
				]);
			} else {
				$message = 'Unmet level condition';
			}
		} else {
			$message = 'Insufficient Wz';
		}
		Session::flash('flash_message', $message);
		return redirect(route('herorebirth.edit', \Auth::user()->c_id));
	}

	public function heroresetrebirthedit(Account $hero_reset_rebirth)
	{
		return view('normal.heroresetrebirth', compact(['hero_reset_rebirth']));
	}

	public function heroresetrebirthupdate(AcquireSuperShueRequest $request, Account $hero_reset_rebirth)
	{
		$core = $hero_reset_rebirth->hasmanycharac()->where('c_id', $request->c_id);
		$wz = $core->first()->c_headerc;
		$type = $core->first()->c_sheaderb;
		$level = $core->first()->c_sheaderc;
		$mbody = $core->first()->m_body;
		$rb = $core->first()->rb;
		$rbtimes = $core->first()->times_rb;
		$exp = Hero::get_hmbody('EXP', $request->c_id);

		if ($rbtimes < 3) {
			if ($rb >= config('a3.rebirthcount')) {
				if ($wz >= config('a3.resetrebirthwz')) {
					$hero_reset_rebirth->hasmanycharac()->where('c_id', $request->c_id)->update([
						'c_headerc' => ($wz - config('a3.resetrebirthwz')),
						'rb' => 0,
						'times_rb' => ($rbtimes + 1),
					]);
					$message = 'Successful reset rebirth';
				} else {
					$message = "Insufficient wz, your ".$request->c_id." only have $wz wz";
				}
			} else {
				$message = $request->c_id." rebirth level is $rb, ".$request->c_id." need to have at least rebirth level ".config('a3.rebirthcount')." to reset its rebirth";
			}
		} else {
			$message = 'You are now a '.config('a3.rank'.$rbtimes).' in this server, you cant reset rebirth anymore';
		}
		Session::flash('flash_message', $message);
		return redirect(route('heroresetrebirth.edit', \Auth::user()->c_id));
	}

	public function mercenaryrebirthedit(Account $mercenary_rebirth)
	{
		return view('normal.mercenaryrebirth', compact(['mercenary_rebirth']));
	}

	public function mercenaryrebirthupdate(MercenaryRebirthRequest $request, Account $mercenary_rebirth)
	{
		$hero = $mercenary_rebirth->hasmanycharac()->where('c_id', $request->c_id);
		$wz = $hero->first()->c_headerc;
		$merc = HSTable::where('HSID', $request->HSID);

		$mlevel = $merc->first()->HSLevel;
		$mrb = $merc->first()->hasonehs()->first()->rb;
		$mrbtimes = $merc->first()->hasonehs()->first()->reset_rb;
		// dd($mlevel);

		$mlvlrb = config('a3.merclvlrb');
		$mwzrb = config('a3.mercwzrb');

		//---------------------------rebirth operation----------------------------------------------------
		//initializing lvl to rebirth
		$lvllvlrb = $mrb * 10;
		$merclvlforrb = $lvllvlrb + $mlvlrb;

		//initializing rebirth lvl
		$mercrblvlforrb = $mrb + 1;

		//initializing wz for rebirth
		$wzforrb = $mwzrb * $lvllvlrb;

		//balance wz
		$sqlwz = $wz - $wzforrb;
		$sqlrblvl = $mrb + 1;

		if ($mlevel >= $merclvlforrb) {
			//then we check its wz
			if ($wz >= $wzforrb) {

				//update char part
				$hero->update([
					'c_headerc' => $sqlwz,
				]);

				//update merc part at HS table
				$merc->first()->hasonehs()->update([
					'rb' => $sqlrblvl,
				]);

				//update HSTable part
				$merc->update([
					'HSLevel' => 1,
					'HSExp' => 0,
				]);
				$message = 'Success rebirth mercenary';
			} else {
				$message = 'Not enough wz to rebirth your mercenary. You need at least '.$wzforrb.' wz for rebirth lvl '.$mrb;
			}
		} else {
			$message = 'Your mercenary level is lower than a minimum level. You need at least lvl '.$merclvlforrb.' for rebirth level '.$mrb;
		}

		Session::flash('flash_message', $message);
		return redirect(route('mercenaryrebirth.edit', \Auth::user()->c_id));
	}

	public function mercenaryresetrebirthedit(Account $mercenary_reset_rebirth)
	{
		return view('normal.mercenaryresetrebirth', compact(['mercenary_reset_rebirth']));
	}

	public function mercenaryresetrebirthupdate(MercenaryRebirthRequest $request, Account $mercenary_reset_rebirth)
	{
		$hero = $mercenary_reset_rebirth->hasmanycharac()->where('c_id', $request->c_id);
		$wz = $hero->first()->c_headerc;

		$merc = HSTable::where('HSID', $request->HSID);

		$mlevel = $merc->first()->HSLevel;
		$mrb = $merc->first()->hasonehs()->first()->rb;
		$mrbtimes = $merc->first()->hasonehs()->first()->reset_rb;
		// dd($mlevel);

		//--------------------reset rebirth operation----------------------------
		// 1st we check the reset rebirth lvl...
		if ($mrbtimes <= 6) {
			//then we check its rb level
			if ($mrb == config('a3.mercrblevel')) {
				//then we check its level
				if ($mlevel == config('a3.mercresetlvl')) {
					//then we check the wz
					if ($wz >= config('a3.mercwzreset')) {

						//reset rebirth for HS begin
						$reset_rb_merc = $mrbtimes + 1;	//up 1 lvl of reset_rb table
						$balance = $wz - config('a3.mercwzreset'); 

						//update the MERC table
						$merc->first()->hasonehs()->update([
							'reset_rb' => $reset_rb_merc,
							'rb' => 0,
						]);

						//update the charac0 table for the wz
						$hero->update([
							'c_headerc' => $balance,
						]);

						$message = 'Successfully reset rebirth mercenary';
					} else {
						$message = "Your ".$request->c_id." only have $wz, please make sure you have more than ".config('a3.mercwzreset')." wz to use reset rebirth for your mercenary";
					}
				} else {
					$message = "Your mercenary rebirth level is $mlevel, please make sure your mercenary is at least level ".config('a3.mercresetlvl');
				}
			} else {
				$message = "Your mercenary rebirth level is $mrb, please make sure your mercenary is at least rebirth level ".config('a3.mercrblevel');
			}
		} else {
			$message = "Your mercenary reset rebirth level is $mrbtimes, you cant use anymore reset rebirth for ur mercenary. Its at the peak of the reset";
		}
		Session::flash('flash_message', $message);
		return redirect(route('mercenaryresetrebirth.edit', \Auth::user()->c_id));
	}



}

