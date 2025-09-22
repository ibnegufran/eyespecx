


const track = document.querySelector(".model-track");
const slides = document.querySelectorAll(".model-con");
const totalSlides = slides.length;
const nextBtn = document.querySelector(".next");
const prevBtn = document.querySelector(".prev");
const logoTrack = document.querySelector(".logo-track");




for (let i = 0; i < 3; i++) {
  const firstClone = slides[i].cloneNode(true);
  
  track.appendChild(firstClone);
}

console.log(slides)
let index=0

const showNextSlide = () => {
  index++;
  const cardWidth=slides[0].offsetWidth;
  track.style.transition = 'transform 0.5s ease';
  track.style.transform = `translateX(-${index * cardWidth}px)`;
  if (index === totalSlides) 
  { 
    setTimeout(() => { 
      track.style.transition = 'none'; 
    track.style.transform = 'translateX(0)';
     index = 0; }, 500); 
    
    }
};

setInterval(showNextSlide,3000)


const dropdownShow=document.querySelectorAll(".dropdown-show");
const dropdown=document.querySelector(".dropdown");
const aboutDropdown=document.querySelector(".about-drop");
const aboutMenu=document.querySelector('.about')
 console.log(dropdownShow)

for (let i = 0; i < dropdownShow.length; i++) {
  dropdownShow[i].addEventListener("mouseenter", () => {
    // dropdown.style.visibility = "visible";
    dropdown.style.transform = "scale(1)";

  });
  dropdownShow[i].addEventListener("mouseleave", () => {
    // dropdown.style.visibility = "hidden";
    dropdown.style.transform = "scale(0)";

  });
}

dropdown.addEventListener("mouseenter", () => {
  // dropdown.style.visibility = "visible";
  dropdown.style.transform = "scale(1)";

});
dropdown.addEventListener("mouseleave", () => {
  // dropdown.style.visibility = "hidden";
  dropdown.style.transform = "scale(0)";

});

aboutMenu.addEventListener("mouseenter", () => {
  // aaboutMenu.style.visibility = "visible";
  aboutDropdown.style.transform = "scale(1)";

});
aboutMenu.addEventListener("mouseleave", () => {
  // aboutDropdown.style.visibility = "hidden";
  aboutDropdown.style.transform = "scale(0)";

});


aboutDropdown.addEventListener("mouseenter", () => {
  // aaboutMenu.style.visibility = "visible";
  aboutDropdown.style.transform = "scale(1)";

});
aboutDropdown.addEventListener("mouseleave", () => {
  // aboutDropdown.style.visibility = "hidden";
  aboutDropdown.style.transform = "scale(0)";

});

// const menProductShow=()=>{
// menProduct.style.display="block";
// womenProduct.style.display="none";

// categoryHeadingMen.classList.add("bottom-border")
// categoryHeadingWomen.classList.remove("bottom-border")
// }

// const womenProductShow=()=>{
//     console.log("women")
//     womenProduct.style.display="block";
// menProduct.style.display="none";

//     categoryHeadingWomen.classList.add("bottom-border")
// categoryHeadingMen.classList.remove("bottom-border")

//     }

const productShow = (type, element) => {
  document.querySelector('.tab.active').classList.remove('active')
  element.classList.add('active');


  document.querySelector('.product-list.active').classList.remove('active')
  document.querySelector('.product-list.' + type).classList.add('active')
}