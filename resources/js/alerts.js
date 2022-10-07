const customClass = {
    htmlContainer: 'dark:bg-gray-900 dark:text-gray-100 bg-white',
    container: 'dark:bg-gray-900 dark:text-gray-100 bg-white',
    popup: 'dark:bg-gray-900 dark:text-gray-100 bg-white',
    timerProgressBar: 'dark:bg-red-500 bg-white',
    confirmButton: 'focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800',
    cancelButton: 'focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900'
}
const Toast = Swal.mixin({
    customClass: customClass,
    toast: true,
    position: 'top',
    showConfirmButton: false,
    showCloseButton: true,
    timer: 5000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
});

window.addEventListener('alert', ({detail: {type, message}}) => {
    Toast.fire({
        icon: type,
        title: message
    })
})


window.addEventListener('confirm', ({detail: {type, message, callback, data}}) => {
    const swalWithButtons = Swal.mixin({
        customClass: customClass,
        buttonsStyling: false
    })

    swalWithButtons.fire({
        title: 'Are you sure?',
        text: message,
        icon: type,
        showCancelButton: true,
        confirmButtonText: 'Yes',
        cancelButtonText: 'No',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed && callback) {
            window.livewire.emit(callback, data)
        }
    })
});
