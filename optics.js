


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