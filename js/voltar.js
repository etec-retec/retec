
    let voltar = document.getElementById("certeza");
    voltar.addEventListener('click', function volt(){
        
        Swal.fire({
            title: 'Tem certeza que deseja sair?',
            icon: 'warning',
            confirmButtonText: 'ㅤﾠSimㅤﾠ',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar',
            }).then((result) => {
            if (result.isConfirmed) {
                window.open('../login/index.php', '_self');
            }
            })
    
    })
