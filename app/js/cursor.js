let mouseCursor = document.querySelector(".cursor");
let navLinks = document.querySelectorAll(".navDesk__links");
let links = document.querySelector(".links");



window.addEventListener("mousemove", cursor);
//e its the event
console.log(e);

function cursor(e) {
    //console.log(e);
    mouseCursor.style.top = e.pageY + 'px'; // verticalement 
    mouseCursor.style.left = e.pageX + 'px'; //horizontalement 
  
}

navLinks.forEach(link => {
    link.addEventListener('mouseover', () => {
        mouseCursor.classList.add("link-grow");
        // links.classlist.add("hovered-link");
    });
    link.addEventListener('mouseleave',() => {
        mouseCursor.classList.remove("link-grow");
        // links.classlist.remove("hovered-link");

    });


});