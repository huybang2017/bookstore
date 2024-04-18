function showSuccessAlert() {
    Swal.fire({
        icon: 'success',
        title: 'Thành công!',
        text: 'Xử lý thành công.',
    });
}

function showErrorAlert(message) {
    Swal.fire({
        icon: 'error',
        title: 'Lỗi!',
        text: message,
    });
}
