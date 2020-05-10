<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// load db facade, not eloquent
use Illuminate\Support\Facades\DB;

// load helper array
use Illuminate\Support\Arr;

// load validation
use App\Http\Requests\ConvertPMRequest;
use App\Http\Requests\BanAccountRequest;
use App\Http\Requests\HeroStatRequest;
use App\Http\Requests\MercenaryStatRequest;
use App\Http\Requests\HeroArmorRequest;
use App\Http\Requests\MercenaryArmorRequest;
use App\Http\Requests\Epi5SkillRequest;
use App\Http\Requests\MercEditLevelRequest;
use App\Http\Requests\MercenaryRebirthRequest;
use App\Http\Requests\Insert1BoxOfItemRequest;
use App\Http\Requests\HeroCloneRequest;
use App\Http\Requests\InfoPKRequest;
use App\Http\Requests\SerialListRequest;

// load helper
use App\Helpers\Hero;
use App\Helpers\Mercenary;

// load carbon
use Carbon\Carbon;

// load model
use App\Model\Account;
use App\Model\Charac0;
use App\Model\HSTable;
use App\Model\HS;
use App\Model\SerialList;

// load session
use Session;

// use Carbon;
use CarbonPeriod;

class GMController extends Controller
{
	public function __construct()
	{
		$this->middleware(['auth', 'verified']);
		$this->middleware('ownByGM');
	}

	public function infoaccount()
	{
		return view('gm.infoaccount');
	}

	public function convertgm()
	{
		return view('gm.convertgm');
	}

	public function cpmcreate()
	{
		return view('gm.convertpaidmembership');
	}

	public function cpmstore(ConvertPMRequest $request)
	{
		Charac0::find($request->c_id)->belongstoaccount()->update([
			'c_sheaderb' => $request->c_sheaderb,
			'last_salary' => Carbon::now()->addMonths($request->dur),
		]);
		Session::flash('flash_message', 'Success update data.');
		return redirect(route('convertpaidmembership.create'));
	}

	public function listpm()
	{
		return view('gm.listpaidmembership');
	}

	public function bancreate()
	{
		return view('gm.banaccount');
	}

	public function banstore(BanAccountRequest $request)
	{
		if($request->ban == 1) {
			// temporary ban
			Charac0::find($request->c_id)->belongstoaccount()->update([
				'c_status' => 'X',
				'c_sheaderc' => 'ban_account'
			]);
			$msg = 'Success temporary ban people.';
		} else {
			$acc = Charac0::find($request->c_id)->belongstoaccount()->get();
			// dd($acc);
			// delete itemstorage
			$acc->hasonestorage()->delete();

			// delete mercenary & friends
			foreach($acc->hasmanycharac->get() as $k) {
				$k->hasmanyhsstonetable()->delete();
				$k->hasmanyhstable()->delete();
				$k->hasmanyfriend()->delete();
			}

			// delete all charac0
			$acc->hasmanycharac()->delete();
			// finally delete account
			$acc->delete();
			$msg = 'Success DELETING account';
		}
		Session::flash('flash_message', $msg);
		return redirect(route('banaccount.create'));
	}

	public function unbanaccount ()
	{
		return view('gm.unbanaccount');
	}

	public function heroeditpointscreate()
	{
		return view('gm.heroeditpoints');
	}

	public function heroeditpointsstore(HeroStatRequest $request)
	{
		// dd($request->all());
		Charac0::find($request->c_id)->update([
			'c_headera' => Hero::set_cheadera( $request->str, $request->int, $request->dex, $request->vit, $request->mana, $request->points, $request->c_id ),
		]);
		$msg = 'Success update '.$request->c_id;
		Session::flash('flash_message', $msg);
		return redirect(route('heroeditpoints.create'));
	}

	public function merceditpointscreate()
	{
		return view('gm.mercenaryeditpoints');
	}

	public function merceditpointsstore(MercenaryStatRequest $request)
	{
		// dd($request->all());
		HSTable::find($request->HSID)->whereNull('DelDate')->update([
			'Ability' => Mercenary::set_ability( $request->str, $request->int, $request->dex, $request->vit, $request->mana, $request->points, $request->HSID ),
		]);
		$msg = 'Success update '.$request->HSID;
		Session::flash('flash_message', $msg);
		return redirect(route('merceditpoints.create'));
	}

	public function equiparmorcreate()
	{
		return view('gm.equiparmor');
	}

	public function equiparmorstore(HeroArmorRequest $request)
	{
		// dd($request->all());
		Charac0::where($request->only('c_id'))->update([
			'm_body' => Hero::set_hmbody('WEAR', $request->m_body, $request->c_id),
		]);
		$msg = 'Success update '.$request->c_id;
		Session::flash('flash_message', $msg);
		return redirect(route('equiparmor.create'));
	}

	public function learnpsvskillcreate()
	{
		return view('gm.learnpsvskill');
	}

	public function learnpsvskillstore(HeroArmorRequest $request)
	{
		// dd($request->all());
		Charac0::where($request->only('c_id'))->update([
			'm_body' => Hero::set_hmbody('PSKILL', $request->m_body, $request->c_id),
		]);
		$msg = 'Success update '.$request->c_id;
		Session::flash('flash_message', $msg);
		return redirect(route('learnpsvskill.create'));
	}

	public function merclearnpsvskillcreate()
	{
		return view('gm.merclearnpsvskill');
	}

	public function merclearnpsvskillstore(MercenaryRebirthRequest $request)
	{
		// dd(config('a3.mercpassiveskill.SKILL'));
		HSTable::where($request->only('HSID'))->update([
			'HSBody' => Mercenary::set_hsbody('SKILL', config('a3.mercpassiveskill.SKILL'), $request->HSID),
		]);
		$msg = 'Success update '.$request->HSID;
		Session::flash('flash_message', $msg);
		return redirect(route('merclearnpsvskill.create'));
	}

	public function mercequiparmorcreate()
	{
		return view('gm.mercequiparmor');
	}

	public function mercequiparmorstore(MercenaryArmorRequest $request)
	{
		// dd($request->all());
		HSTable::where($request->only('HSID'))->update([
			'HSBody' => Mercenary::set_hsbody('WEAR', $request->hsbody, $request->HSID),
		]);
		$msg = 'Success update '.$request->HSID;
		Session::flash('flash_message', $msg);
		return redirect(route('mercequiparmor.create'));
	}

	public function equipsupersupershuecreate()
	{
		return view('gm.equipsupersupershue');
	}

	public function equipsupersupershuestore(HeroArmorRequest $request)
	{
		// dd($request->all());
		Charac0::where($request->only('c_id'))->update([
			'm_body' => Hero::set_hmbody('PETACT', $request->m_body, $request->c_id),
		]);
		$msg = 'Success update '.$request->c_id;
		Session::flash('flash_message', $msg);
		return redirect(route('equipsupersupershue.create'));
	}

	public function learnepi5skillcreate()
	{
		return view('gm.learnepi5skill');
	}

	public function learnepi5skillstore(Epi5SkillRequest $request)
	{
		// dd($request->all());
		Charac0::where($request->only('c_id'))->update([
			'm_body' => Hero::set_hmbody('SKILLEX', config('a3.SKILLEX'), $request->c_id),
		]);
		Charac0::where($request->only('c_id'))->update([
			'm_body' => Hero::set_hmbody('SKILL', config('a3.SKILL'), $request->c_id),
		]);
		$msg = 'Success update '.$request->c_id;
		Session::flash('flash_message', $msg);
		return redirect(route('learnepi5skill.create'));
	}

	public function editlevelcreate()
	{
		return view('gm.editlevel');
	}

	public function editlevelstore(HeroArmorRequest $request)
	{
		// dd($request->all());
		Charac0::where($request->only('c_id'))->update([
			'm_body' => Hero::set_hmbody('EXP', $request->m_body, $request->c_id),
		]);

		$msg = 'Success update '.$request->c_id;
		Session::flash('flash_message', $msg);
		return redirect(route('editlevel.create'));
	}

	public function merceditlevelcreate()
	{
		return view('gm.merceditlevel');
	}

	public function merceditlevelstore(MercEditLevelRequest $request)
	{
		// dd($request->all());
		HSTable::find($request->HSID)->whereNull('DelDate')->update($request->only('HSExp'));

		$msg = 'Success update '.$request->HSID;
		Session::flash('flash_message', $msg);
		return redirect(route('merceditlevel.create'));
	}

	public function editlorecreate()
	{
		return view('gm.editlore');
	}

	public function editlorestore(HeroArmorRequest $request)
	{
		// dd($request->all());
		Charac0::where($request->only('c_id'))->update([
			'm_body' => Hero::set_hmbody('LORE', $request->m_body, $request->c_id),
		]);

		$msg = 'Success update '.$request->c_id;
		Session::flash('flash_message', $msg);
		return redirect(route('editlore.create'));
	}

	public function insertgraceofsilbaducreate()
	{
		return view('gm.insertgraceofsilbadu');
	}

	public function insertgraceofsilbadustore(Epi5SkillRequest $request)
	{
		// dd($request->only('c_id'));
		$r = Hero::get_hmbody('INVEN', $request->c_id);
		Charac0::where('c_id', $request->c_id)->update([
			'm_body' => Hero::set_hmbody('INVEN', config('a3.insertGOS.INVEN').$r, $request->c_id),
		]);

		$msg = 'Success update '.$request->c_id;
		Session::flash('flash_message', $msg);
		return redirect(route('insertgraceofsilbadu.create'));
	}

	public function insert1boxofitemcreate()
	{
		return view('gm.insert1boxofitem');
	}

	public function insert1boxofitemstore(Insert1BoxOfItemRequest $request)
	{
		// dd($request->all());
		if ($request->has('box')) {
			foreach($request->box as $k => $v) {
				// echo $v['item'].' => '.$v['slot'].'<br />';
				$r = Hero::get_hmbody('INVEN', $request->c_id);
				// echo '17;164'.$v['item'].';131845;'.$v['slot'].';'.$r.'<br />';
				Charac0::where('c_id', $request->c_id)->update([
					'm_body' => Hero::set_hmbody('INVEN', '17;164'.$v['item'].';131845;'.$v['slot'].';'.$r, $request->c_id),
				]);
			}
		}
		$msg = 'Success update '.$request->c_id;
		Session::flash('flash_message', $msg);
		return redirect(route('insert1boxofitem.create'));
	}

	public function insert1itemcreate()
	{
		return view('gm.insert1item');
	}

	public function insert1itemstore(Insert1BoxOfItemRequest $request)
	{
		// dd($request->all());
		if ($request->has('box')) {
			foreach($request->box as $k => $v) {
				// echo $v['item'].' => '.$v['slot'].'<br />';
				$r = Hero::get_hmbody('INVEN', $request->c_id);
				Charac0::where('c_id', $request->c_id)->update([
					'm_body' => Hero::set_hmbody('INVEN', $v['item'].';'.$v['slot'].';'.$r, $request->c_id),
				]);
			}
		}
		$msg = 'Success update '.$request->c_id;
		Session::flash('flash_message', $msg);
		return redirect(route('insert1item.create'));
	}

	public function heroclonecreate()
	{
		return view('gm.heroclone');
	}

	public function heroclonestore(HeroCloneRequest $request)
	{
		// dd($request->all());
		// check target is sctive and both type are same
		$h1 = Charac0::where('c_id', $request->c_id1);
		$h2 = Charac0::where('c_id', $request->c_id2);

		if($h2->first()->c_status == 'X'){
			$msg = 'It seems your target hero is inactive. Please choose another one.';
		} if($h1->first()->c_sheaderb != $h2->first()->c_sheaderb) {
			$msg = 'It seems your hero type is not match between each other. Please choose another one.';
		} else {
			$h2->update([
				'c_sheaderc' => $h1->first()->c_sheaderc,
				'c_headera' => $h1->first()->c_headera,
				'c_headerb' => $h1->first()->c_headerb,
				'c_headerc' => $h1->first()->c_headerc,
				'd_cdate' => $h1->first()->d_cdate,
				'd_udate' => $h1->first()->d_udate,
				'm_body' => Hero::set_hmbody('SINFO', 0, $request->c_id1),				// remove knigthood
				'rb' => $h1->first()->rb,
				'times_rb' => $h1->first()->times_rb,
			]);
			$msg = 'Done cloning process for '.$request->c_id1;
		}
		Session::flash('flash_message', $msg);
		return redirect(route('heroclone.create'));
	}

	public function removeknighthoodcreate()
	{
		return view('gm.removeknighthood');
	}

	public function removeknighthoodstore(Request $request)
	{
		// dd($request->all());
		Charac0::where($request->only('c_id'))->update([
			'm_body' => Hero::set_hmbody('SINFO', 0, $request->c_id),
		]);
		$msg = 'Success remove knighthood from '.$request->c_id;
		Session::flash('flash_message', $msg);
		return redirect(route('removeknighthood.create'));
	}

	public function infoPKcreate()
	{
		return view('gm.infoPK');
	}

	public function infoPKstore(InfoPKRequest $request)
	{
		// dd($request->all());
		Charac0::where($request->only('c_id'))->update([
			'm_body' => Hero::set_hmbody('RTM', $request->timer, $request->c_id),
		]);
		$msg = 'Success edit timer for '.$request->c_id;
		Session::flash('flash_message', $msg);
		return redirect(route('infoPK.create'));
	}

	public function insertitemmanuallycreate()
	{
		return view('gm.insertitemmanually');
	}

	public function insertitemmanuallystore(Request $request)
	{
		// dd($request->all());
		$r = Hero::get_hmbody('INVEN', $request->c_id);
		Charac0::where($request->only('c_id'))->update([
			'm_body' => Hero::set_hmbody('INVEN', $request->inven.$r, $request->c_id),
		]);
		$msg = 'Success input item in the inventory for '.$request->c_id;
		Session::flash('flash_message', $msg);
		return redirect(route('insertitemmanually.create'));
	}

	public function seriallistcreate()
	{
		return view('gm.seriallist');
	}

	public function serialliststore(SerialListRequest $request)
	{
		// dd($request->all());
		SerialList::insert($request->except(['_token']));
		$msg = 'Success insert data. ';
		Session::flash('flash_message', $msg);
		return redirect(route('seriallist.create'));
	}

	public function itemcalculator()
	{
		return view('gm.itemcalculator');
	}





















}
