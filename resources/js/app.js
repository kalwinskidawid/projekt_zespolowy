window._ = require('lodash');
window.$ = require('jquery');
window.$ = window.jQuery = require('jquery');

window.bootstrap = require('bootstrap');


// Komunikaty flash wyświetlane z użyciem toasts
var toastElList = [].slice.call(document.querySelectorAll('.toast'))
var toastList = toastElList.map(function(toastEl) {
    // Stworzenie tablicy toasts z ewentualnymi opcjami
    return new bootstrap.Toast(toastEl)
});
// Pokazanie toasts
toastList.forEach(toast => toast.show());

// Podpowiedzi typu tooltips
let tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
});
