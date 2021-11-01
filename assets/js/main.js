import $ from "jquery";

// Init plugins
import { matchheight_init } from './scripts/matchheight.js';
// import { animejs } from './scripts/anime.js';

// Scripts
import { bootstrap } from './scripts/bootstrap.js';
import { site_is_loaded, update_background } from './scripts/site_is_loaded.js';
import { footer_down } from './scripts/footer_down.js';
import { mobilemenu } from './scripts/mobilemenu.js';
import { tool } from './scripts/tool.js';
import { scrollto } from './scripts/scrollto.js';
// import { sticky_header } from './scripts/sticky_header.js';

mobilemenu();
scrollto();
tool();
bootstrap();

$( document ).ready(function() {
  footer_down();
  // sticky_header();
});

$(window).on('load', function() {
  matchheight_init();
  // animejs();
  site_is_loaded();
});

$(window).on('resize', update_background);
