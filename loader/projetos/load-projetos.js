window.addEventListener('load', () =>{
    const preloader = document.querySelector(".master")
    const animate = document.querySelector(".Main")

    preloader.classList.add('finish')
    animate.classList.remove('Main::after')

})
