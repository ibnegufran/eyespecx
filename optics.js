    
const dropdownShow = document.querySelectorAll(".dropdown-show");
const dropdown = document.querySelector(".dropdown");
const aboutMenu = document.querySelector(".about");
const aboutDropdown = document.querySelector(".about-drop");
const cutIcon = document.querySelector(".cut");
const menBrands = document.querySelector(".men-brands");
const womenBrands = document.querySelector(".women-brands");
const brandLinks = document.querySelectorAll(".brand-item a");

// Hide both brand lists initially
menBrands.style.display = "none";
womenBrands.style.display = "none";

// Show brands on hover
dropdownShow.forEach(btn => {
  btn.addEventListener("mouseenter", () => {
    const type = btn.getAttribute("data-type");
    dropdown.style.transform = "scale(1)";

    if (type === "men") {
      menBrands.style.display = "grid";
      womenBrands.style.display = "none";
    } else if (type === "women") {
      womenBrands.style.display = "grid";
      menBrands.style.display = "none";
    } else if (type !== "women" && type !== "men") {
      womenBrands.style.display = "grid";
      menBrands.style.display = "none";
    }
  });

  btn.addEventListener("mouseleave", () => {
    dropdown.style.transform = "scale(0)";
  });
});

// Hide dropdown on mouse leave
dropdown.addEventListener("mouseenter", () => {
  dropdown.style.transform = "scale(1)";
});
dropdown.addEventListener("mouseleave", () => {
  dropdown.style.transform = "scale(0)";
});

// Cut icon hide

  cutIcon.addEventListener("click", () => {
    dropdown.style.transform = "scale(0)";
  });


// Redirect to products page on brand click
brandLinks.forEach(link => {
  link.addEventListener("click", (e) => {
    e.preventDefault();
    const gender = link.getAttribute("data-gender");
    const brand = link.getAttribute("data-brand");
    if (gender !== "Women" && gender !== "Men") {
       window.location.href = `brand_products.php?brand=${brand}`;
    }else{
      window.location.href = `brand_products.php?gender=${gender}&brand=${brand}`;
    }
  });
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



let menuBtn=document.querySelector("#menu-btn");
menuBtn.addEventListener("click",()=>{
    document.querySelector(".menu_con").classList.toggle("nav-active");
  

})

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