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

// tooltipActivation(document);


// SWEETALERTS
const sweetAlertFunction = () => {
    $('form[name=confirm-action]').on('submit', function(e) {
        e.preventDefault();
        const data = $(e.currentTarget).data();
        const message = !_.isNil(data.message) ? data.message : 'NO_MESSAGE_PROVIDED';
        const icon = !_.isNil(data.icon) ? data.icon : 'warning';
        const confirmText = !_.isNil(data.confirmText) ? data.confirmText : 'Yes';
        const confirmClass = !_.isNil(data.confirmClass) ? data.confirmClass : '';
        const cancelText = !_.isNil(data.cancelText) ? data.cancelText : 'No';
        const cancelClass = !_.isNil(data.cancelClass) ? data.cancelClass : '';

        Swal.mixin({
            customClass: {
                confirmButton: confirmClass,
                cancelButton: cancelClass
            },
            buttonsStyling: false
        }).fire({
            text: message,
            showCancelButton: true,
            confirmButtonText: confirmText,
            cancelButtonText: cancelText,
            focusCancel: true,
            icon: icon
        }).then((result) => {
            if (result.value) {
                this.submit()
            }
        });
    });
}


export {sweetAlertFunction};
