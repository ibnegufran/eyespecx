const track = document.querySelector('.model-track');
const slides = document.querySelectorAll('.model-con');
const totalSlidesNumber = slides.length;
const prevBtn=document.querySelector(".prev")
const nextBtn=document.querySelector(".next")
const dropdownShow=document.querySelectorAll(".dropdown-show")
const dropdown=document.querySelector(".dropdown")

// clone first slide
const cloneSlide = slides[0].cloneNode(true);  
track.appendChild(cloneSlide);

let index = 0;
const showNextSlide = () => {
   
    track.style.transition = 'transform 0.5s ease';
    track.style.transform = `translateX(-${index * 25}vw)`; // match width

    if (index === totalSlidesNumber) {
        setTimeout(() => {
            track.style.transition = 'none';
            track.style.transform = 'translateX(0)';
            index = 0;
        }, 500);
    }
};

const autoSlider=setInterval(()=>{
    index++;
    showNextSlide()
}, 3000)



nextBtn.addEventListener("click",()=>{
  clearInterval(autoSlider)
  index++;
  showNextSlide();
})

prevBtn.addEventListener("click",()=>{
    clearInterval(autoSlider)
    index--;
    if(index < 0){
        index=totalSlidesNumber-1;
        track.style.transition = 'none';
        track.style.transform = `translateX(-${index * 25}vw)`;
    }
    showNextSlide()
})

for(let i=0 ; i < dropdownShow.length ; i++){
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

    const productShow=(type,element)=>{
document.querySelector('.tab.active').classList.remove('active')
element.classList.add('active');


document.querySelector('.product-list.active').classList.remove('active')
document.querySelector('.product-list.' + type).classList.add('active')
    }