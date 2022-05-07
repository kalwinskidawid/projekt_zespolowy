require('datatables.net-bs5');
require('./vendor/jsvalidation/js/jsvalidation');



$(function() {
   $('table').DataTable({

       "language": {
           "url": "vendor/datatables/i18n/pl.json"
       }

   });
});
import {sweetAlertFunction} from "./app";
sweetAlertFunction();
