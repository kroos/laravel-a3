@extends('layouts.app')

@section('content')
<div class="card">
	<div class="card-header">
		<h1>Item Calculator</h1>
	</div>
	<div class="card-body">
	@include('layouts.info')
	@include('layouts.errorform')

	<h6>Item Calculator</h6>

	<table class="table">
		<tr>
			<th>Option & Attribute</th>
			<th>Original Item Code</th>
			<th>Modify Item Code</th>
			<th>Total Amount</th>
		</tr>
		<tr>
			<td>Mount</td>
			<td>
				<select name="mountori" id="mount1">
					<option value="0">No Mount</option>
					<option value="65536">Mount 10%</option>
					<option value="131072">Mount 20%</option>
					<option value="196608">Mount 30%</option>
				</select>
			</td>
			<td>
				<select name="mountmod" id="mount2">
					<option value="0">No Mount</option>
					<option value="65536">Mount 10%</option>
					<option value="131072">Mount 20%</option>
					<option value="196608">Mount 30%</option>
				</select>
			</td>
			<td>
				<span id="mount3" class="itemtotalpoint"></span>
			</td>
		</tr>
		<tr>
			<td>Blessing</td>
			<td>
				<select name="blessori" id="bless1">
					<option value="0">No Blessing</option>
					<option value="32768">With Blessing</option>
				</select>
			</td>
			<td>
				<select name="blessmod" id="bless2">
					<option value="0">No Blessing</option>
					<option value="32768">With Blessing</option>
				</select>
			</td>
			<td>
				<span id="bless3" class="itemtotalpoint"></span>
			</td>
		</tr>
		<tr>
			<td>Level</td>
			<td><input name="levelori" value="0" type="number" id="level1" min="0" max="15"></td>
			<td><input name="levelmod" value="0" type="number" id="level2" max="15"></td>
			<td><span id="level" class="attributetotalpoint"></span></td>
		</tr>
		<tr>
			<td>Additional Attack/Defense</td>
			<td>
				<select name="addattdefori" id="addattdef1">
					<option value="0">No Additional Attack/Defense</option>
					<option value="16">With Additional Attack/Defense</option>
				</select>
			</td>
			<td>
				<select name="addattdefmod" id="addattdef2">
					<option value="0">No Additional Attack/Defense</option>
					<option value="16">With Additional Attack/Defense</option>
				</select>
			</td>
			<td><span id="addattdef3" class="attributetotalpoint"></span></td>
		</tr>
		<tr>
			<td>Ice Elemental</td>
			<td><input name="iceori" type="number" value="0" id="ice1" min="0" max="63"></td>
			<td><input name="icemod" type="number" value="0" id="ice2" min="0" max="63"></td>
			<td><span id="ice" class="attributetotalpoint"></span></td>
		</tr>
		<tr>
			<td>Fire Elemental</td>
			<td><input name="fireori" type="number" value="0" id="fire1" min="0" max="63"></td>
			<td><input name="firemod" type="number" value="0" id="fire2" min="0" max="63"></td>
			<td><span id="fire" class="attributetotalpoint"></span></td>
		</tr>
		<tr>
			<td>Lightning Elemental</td>
			<td><input name="lightningori" type="number" value="0" id="lightning1" min="0" max="63"></td>
			<td><input name="lightningmod" type="number" value="0" id="lightning2" min="0" max="63"></td>
			<td><span id="lightning" class="attributetotalpoint"></span></td>
		</tr>
		<tr>
			<td>Item & Attribute Code</td>
			<td>
				Item : <input name="itemori" type="text" id="item1" value="1093"><br />
				Attribute : <input name="attribori" type="text" id="attrib1" value="1441"><br />
			</td>
			<td>
				Item : <input name="itemmod" type="text" id="item2" value="230469"><br />
				Attribute : <input name="attribmod" type="text" id="attrib2" value="4294952382"><br />
			</td>
			<td>
				<span id="itemgrandtotal"></span>
					<br />
				<span id="attributegrandtotal"></span>
			</td>
		</tr>
	</table>

	</div>
</div>
@endsection

@section('js')
////////////////////////////////////////////////////////////////////////////////////
// count

// mount
$(document).on('change', '#mount1', function () {
	$('#mount2').val( $(this).val() ).prop('selected', true);
	$('#mount3').text(0);

	update_itemtotalpoints();
});

$(document).on('change', '#mount2', function () {
	var mountori = $('#mount1').val();
	var mountmod = $(this).val();
	cmount = ((mountmod * 100) - (mountori * 100)) / 100;
	$('#mount3').text(cmount);

	update_itemtotalpoints();
});

// blessing
$(document).on('change', '#bless1', function () {
	$('#bless2').val( $(this).val() ).prop('selected', true);
	$('#bless3').text(0);
	update_itemtotalpoints();
});

$(document).on('change', '#bless2', function () {
	var blessori = $('#bless1').val();
	var blessmod = $(this).val();
	// console.log(blessori);
	// console.log(blessmod);
	cbless = ((blessmod * 100) - (blessori * 100)) / 100;
	$('#bless3').text(cbless);

	update_itemtotalpoints();
});

// level
$(document).on('change', '#level1', function () {
	$('#level2').val($(this).val()).attr({"min" : $(this).val()});
	$('#level').text( ($('#level2').val() * 100/100) - ($(this).val() * 100/100) );

	// .css({"color": "red", "border": "2px solid red"});
	// update total points been used
	update_attributetotalpoints();
});

$(document).on('change', '#level2', function () {
	$('#level').text( ($(this).val() * 100/100) - ($('#level1').val() * 100/100) );
	update_attributetotalpoints();
});

// additional attack/defense
$(document).on('change', '#addattdef1', function () {
	$('#addattdef2').val( $(this).val() ).prop('selected', true);
	$('#addattdef3').text(0);
	update_attributetotalpoints();
});

$(document).on('change', '#addattdef2', function () {
	var addattdefori = $('#addattdef1').val();
	var addattdefmod = $(this).val();
	// console.log(addattdefori);
	// console.log(addattdefmod);
	caddattdef = ((addattdefmod * 100) - (addattdefori * 100)) / 100;
	$('#addattdef3').text(caddattdef);

	update_attributetotalpoints();
});

//ice attack
$(document).on('change', '#ice1', function () {
	$('#ice2').val( $(this).val() );

	$('#ice').text( (($('#ice2').val() * 100/100) - ($(this).val() * 100/100)) * 16384 );
	update_attributetotalpoints();
});

$(document).on('change', '#ice2', function () {
	$('#ice').text( (($(this).val() * 100/100) - ($('#ice1').val() * 100/100)) * 16384 );
	update_attributetotalpoints();
});

// fire attack
$(document).on('change', '#fire1', function () {
	$('#fire2').val( $(this).val() );

	$('#fire').text( (($('#fire2').val() * 100/100) - ($(this).val() * 100/100)) * 1048576 );
	update_attributetotalpoints();
});

$(document).on('change', '#fire2', function () {
	$('#fire').text( (($(this).val() * 100/100) - ($('#fire1').val() * 100/100)) * 1048576 );
	update_attributetotalpoints();
});

// lightning attack
$(document).on('change', '#lightning1', function () {
	$('#lightning2').val( $(this).val() );

	$('#lightning').text( (($('#lightning2').val() * 100/100) - ($(this).val() * 100/100)) * 67108864 );
	update_attributetotalpoints();
});

$(document).on('change', '#lightning2', function () {
	$('#lightning').text( (($(this).val() * 100/100) - ($('#lightning1').val() * 100/100)) * 67108864 );
	update_attributetotalpoints();
});

// item
$(document).on('keyup', '#item1', function () {
	var item1 = $(this).val();
	var item3 = $('#itemgrandtotal').text();
	citem = ((item1 * 100) + (item3 * 100)) / 100;
	$('#item2').val( citem );
	// update_attributetotalpoints();
});

// attribute
$(document).on('keyup', '#attrib1', function () {
	var attrib1 = $(this).val();
	var attrib3 = $('#attributegrandtotal').text();
	cattrib = ((attrib1 * 100) + (attrib3 * 100)) / 100;
	$('#attrib2').val( cattrib );
	// update_attributetotalpoints();
});

function update_itemtotalpoints() {
	var myNodelistp = $(".itemtotalpoint");
	var psum = 0;
	for (var ip = myNodelistp.length - 1; ip >= 0; ip--) {
		// myNodelistp[ip].style.backgroundColor = "red";

		psum = ( (psum * 10000) + (myNodelistp[ip].innerHTML * 10000) ) / 10000;
		// psum = ( (psum * 10000) + (myNodelistp[ip].value * 10000) ) / 10000;

		// console.log(myNodelistp[ip].innerHTML);
		// console.log(myNodelistp[ip].value);
		// console.log(psum);
	}
	$('#itemgrandtotal').text( psum );

	var item1 = $('#item1').val();
	$('#item2').val( (((psum * 100) + (item1 * 100)) / 100) );
};

function update_attributetotalpoints() {
	var myNodelistp1 = $(".attributetotalpoint");
	var psum1 = 0;
	for (var ip = myNodelistp1.length - 1; ip >= 0; ip--) {
		// myNodelistp1[ip].style.backgroundColor = "red";

		psum1 = ( (psum1 * 10000) + (myNodelistp1[ip].innerHTML * 10000) ) / 10000;
		// psum1 = ( (psum1 * 10000) + (myNodelistp1[ip].value * 10000) ) / 10000;

		// console.log(myNodelistp1[ip].innerHTML);
		// console.log(myNodelistp1[ip].value);
		// console.log(psum1);
	}
	$('#attributegrandtotal').text( psum1 );
	var attrib1 = $('#attrib1').val();
	$('#attrib2').val( (((psum1 * 100) + (attrib1 * 100)) / 100) );
};

////////////////////////////////////////////////////////////////////////////////////
@endsection