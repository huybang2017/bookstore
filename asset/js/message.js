const messageSuccess = () => {
    Swal.fire({
        icon: "success",
        title: "Success",
        text: "Your favorite has been added successfully",
        showConfirmButton: false,
        timer: 1500,
    });
};

const messageError = () => {
    Swal.fire({
        icon: "error",
        title: "Error",
        text: "Something went wrong",
        showConfirmButton: false,
        timer: 1500,
    });
}