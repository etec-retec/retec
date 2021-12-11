function remover(){
    Swal.fire({
        title: 'Tem certeza que deseja remover esse projeto?',
        text: "Não será possível reverter essa ação!",
        icon: 'warning',
        showCancelButton: true,
        cancelButtonText: 'Cancelar',
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim, remover'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById("form-remove").submit();
        }
    })

}