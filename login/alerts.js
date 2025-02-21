function logoutAlert(event) {
    event.preventDefault();
    Swal.fire({
        title: '¿Estás seguro de querer salir?',
        text: 'Una vez que salgas, tendrás que crear una cuenta para acceder a la página.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, salir',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            logout();
        }
    });
}

function logout() {
    window.location.href = 'logout.php';
}

/*================*/
function logoutAdmin(event) {
    window.location.href = '../logout.php';
}
