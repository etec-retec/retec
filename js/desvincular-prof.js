function desvincular(id){
    Swal.fire({
        title: 'Tem certeza que deseja desvincular o professor desta instituição?',
        text: 'Não será possível reverter essa ação!',
        color: '#ce1f1f',
        icon: 'warning',
        showCancelButton: true,
        cancelButtonText: 'Cancelar',
        confirmButtonColor: '#6253f2',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim, desvincular'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById(id).submit();
        }
    })

}