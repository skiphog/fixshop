window.$ = window.jQuery = require('jquery');
$.ajaxSetup({ headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content } });

window.bootstrap = require('bootstrap');

//import * as bootstrap from 'bootstrap'
