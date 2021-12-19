function remover(id){
    Swal.fire({
        title: 'Tem certeza que deseja remover esse projeto?',
        text: "Não será possível reverter essa ação!",
        color: '#d60808',
        icon: 'warning',
        showCancelButton: true,
        cancelButtonText: 'Cancelar',
        confirmButtonColor: '#d33',
        cancelButtonColor: '#6253f2',
        confirmButtonText: 'Sim, remover'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById(id).submit();
        }
    })

}