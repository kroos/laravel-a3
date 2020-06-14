require('./bootstrap');


window.Popper = require('popper.js').default;

try {
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');


	require('@claviska/jquery-minicolors');
	require('datatables.net');
	require('datatables.net-bs4');
	require('datatables.net-colreorder-bs4');
	require('datatables.net-responsive-bs4');
	require('jquery.cookie');
	require('pc-bootstrap4-datetimepicker');
	require('select2');
	require('colresizable/colResizable-1.6.min');
	window.moment = require('moment');
	window.swal = require ('sweetalert2');
	require('fullcalendar');
	require('chart.js/dist/Chart');
	require('chartjs-color/index');
	require('chartjs-color-string/color-string');

	// for mobirise
	// none npm
	require('./web/cookies-alert-plugin/cookies-alert-core');
	require('./web/cookies-alert-plugin/cookies-alert-script');

	require ('./bootstrapValidator4/js/bootstrapValidator');
	require ('jquery-chained/jquery.chained.js');
	require ('jquery-chained/jquery.chained.remote.js');
	require ('jarallax/dist/jarallax.js');
	require ('jarallax/dist/jarallax-element.js');
	require ('jarallax/dist/jarallax-video.js');

	// require ('./jquery-ui/js/jquery-ui');
	// require ('jquery-ui/external/requirejs/require.js');
	require ('jquery-ui/ui/widgets/accordion');
	require ('jquery-ui/ui/widgets/autocomplete');
	require ('jquery-ui/ui/widgets/button');
	require ('jquery-ui/ui/widgets/checkboxradio');
	require ('jquery-ui/ui/widgets/controlgroup');
	require ('jquery-ui/ui/widgets/datepicker');
	require ('jquery-ui/ui/widgets/dialog');
	require ('jquery-ui/ui/widgets/draggable');
	require ('jquery-ui/ui/widgets/droppable');
	require ('jquery-ui/ui/widgets/menu');
	require ('jquery-ui/ui/widgets/mouse');
	require ('jquery-ui/ui/widgets/progressbar');
	require ('jquery-ui/ui/widgets/resizable');
	require ('jquery-ui/ui/widgets/selectable');
	require ('jquery-ui/ui/widgets/selectmenu');
	require ('jquery-ui/ui/widgets/slider');
	require ('jquery-ui/ui/widgets/sortable');
	require ('jquery-ui/ui/widgets/spinner');
	require ('jquery-ui/ui/widgets/tabs');
	require ('jquery-ui/ui/widgets/tooltip');

	require ('jquery-ui/ui/effects/effect-blind');
	require ('jquery-ui/ui/effects/effect-bounce');
	require ('jquery-ui/ui/effects/effect-clip');
	require ('jquery-ui/ui/effects/effect-drop');
	require ('jquery-ui/ui/effects/effect-explode');
	require ('jquery-ui/ui/effects/effect-fade');
	require ('jquery-ui/ui/effects/effect-fold');
	require ('jquery-ui/ui/effects/effect-highlight');
	require ('jquery-ui/ui/effects/effect-puff');
	require ('jquery-ui/ui/effects/effect-pulsate');
	require ('jquery-ui/ui/effects/effect-scale');
	require ('jquery-ui/ui/effects/effect-shake');
	require ('jquery-ui/ui/effects/effect-size');
	require ('jquery-ui/ui/effects/effect-slide');
	require ('jquery-ui/ui/effects/effect-transfer');

} catch (e) {}