document.querySelector(".burger-menu").addEventListener("click", function () {
    // console.log('ok')
    document.getElementById("leftMenu").classList.toggle("active");

    const burgerIcon = document.getElementById("burger-icon");
    burgerIcon.classList.toggle("fa-bars");
    burgerIcon.classList.toggle("fa-bars-staggered");
});