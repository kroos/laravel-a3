<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// load db facade, not eloquent
use Illuminate\Support\Facades\DB;

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
// use App\Http\Requests\MercenaryRebirthRequest;

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
		// dd(config('a3.inserGOS.INVEN'));
		Charac0::where($request->only('c_id'))->update([
			'm_body' => Hero::set_hmbody('INVEN', config('a3.inserGOS.INVEN'), $request->c_id),
		]);

		$msg = 'Success update '.$request->c_id;
		Session::flash('flash_message', $msg);
		return redirect(route('insertgraceofsilbadu.create'));
	}





















}
