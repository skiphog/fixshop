window.$ = window.jQuery = require('jquery');
$.ajaxSetup({ headers: { 'X-Key': document.querySelector('meta[name="csrf-token"]').content } });

import UIkit from 'uikit';
import Icons from 'uikit/dist/js/uikit-icons';

// loads the Icon plugin
UIkit.use(Icons);

window.UIkit = UIkit;
