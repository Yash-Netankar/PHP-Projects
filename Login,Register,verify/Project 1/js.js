let navigation = document.querySelector(".nav-links");
let burger = document.querySelector(".hamburger");

burger.addEventListener("click", ()=>{
    navigation.classList.toggle("show-nav");
    navigation.style.transition = ".4s";
});