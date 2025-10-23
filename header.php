
<?php
        // $message[]='';

// if(is_array($message) || is_object($message)){
// include 'connect.php';
// if (isset($message) && is_array($message)){

//    foreach($message as $msg){
//       echo '
//       <div class="message">
//          <span>'.$msg.'</span>
//          <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
//       </div>
//       ';
//    }
// }
?>

<header>
<div class="header1">
    
    <div class="container flex">
        <p>Just Droppped - Be The First To Own It!</p>
    </div>
</div>
<div class="header2">
<div class="dropdown">
    <div class="fa fa-times cut"></div>
    <div class="brands men-brands">
        <li class="brand-item"><a href="#" data-gender="men" data-brand="Rayban">Rayban</a></li>
        <li class="brand-item"><a href="#" data-gender="men" data-brand="Gucci">Gucci</a></li>
        <li class="brand-item"><a href="#" data-gender="men" data-brand="Vogue">Vogue</a></li>
        <li class="brand-item"><a href="#" data-gender="men" data-brand="Tommy Hilfiger">Tommy Hilfiger</a></li>
        <li class="brand-item"><a href="#" data-gender="men" data-brand="Oakley">Oakley</a></li>
        <li class="brand-item"><a href="#" data-gender="men" data-brand="Lacoste">Lacoste</a></li>
        <li class="brand-item"><a href="#" data-gender="men" data-brand="Nova">Nova</a></li>
        <li class="brand-item"><a href="#" data-gender="men" data-brand="Velocity">Velocity</a></li>
        <li class="brand-item"><a href="#" data-gender="men" data-brand="CK">CK</a></li>
        <li class="brand-item"><a href="#" data-gender="men" data-brand="Zeiss">Zeiss</a></li>
        <li class="brand-item"><a href="#" data-gender="men" data-brand="FAOS">FAOS</a></li>
        <li class="brand-item"><a href="#" data-gender="men" data-brand="LAPS">LAPS</a></li>
        <li class="brand-item"><a href="#" data-gender="men" data-brand="Italia Independent">Italia Independent</a></li>
        <li class="brand-item"><a href="#" data-gender="men" data-brand="Walnut">Walnut</a></li>
        <li class="brand-item"><a href="#" data-gender="men" data-brand="Fastrack">Fastrack</a></li>
        <li class="brand-item"><a href="#" data-gender="men" data-brand="Akoni">Akoni</a></li>
      </div>

      <!-- 👠 WOMEN BRANDS -->
      <div class="brands women-brands">
        <li class="brand-item"><a href="#" data-gender="women" data-brand="Rayban">Rayban</a></li>
        <li class="brand-item"><a href="#" data-gender="women" data-brand="Gucci">Gucci</a></li>
        <li class="brand-item"><a href="#" data-gender="women" data-brand="Vogue">Vogue</a></li>
        <li class="brand-item"><a href="#" data-gender="women" data-brand="Tommy Hilfiger">Tommy Hilfiger</a></li>
        <li class="brand-item"><a href="#" data-gender="women" data-brand="Oakley">Oakley</a></li>
        <li class="brand-item"><a href="#" data-gender="women" data-brand="Lacoste">Lacoste</a></li>
        <li class="brand-item"><a href="#" data-gender="women" data-brand="Nova">Nova</a></li>
        <li class="brand-item"><a href="#" data-gender="women" data-brand="Velocity">Velocity</a></li>
        <li class="brand-item"><a href="#" data-gender="women" data-brand="CK">CK</a></li>
        <li class="brand-item"><a href="#" data-gender="women" data-brand="Zeiss">Zeiss</a></li>
        <li class="brand-item"><a href="#" data-gender="women" data-brand="FAOS">FAOS</a></li>
        <li class="brand-item"><a href="#" data-gender="women" data-brand="LAPS">LAPS</a></li>
        <li class="brand-item"><a href="#" data-gender="women" data-brand="Italia Independent">Italia Independent</a></li>
        <li class="brand-item"><a href="#" data-gender="women" data-brand="Walnut">Walnut</a></li>
        <li class="brand-item"><a href="#" data-gender="women" data-brand="Fastrack">Fastrack</a></li>
        <li class="brand-item"><a href="#" data-gender="women" data-brand="Akoni">Akoni</a></li>
      </div>
    </div>
    <div class="about-drop">
    <div class="fa fa-times cut"></div>
      <li class=""><a href="#" rel="noopener">Contact us</a></li>
    <li class=""><a href="#" rel="noopener">Gallery</a></li>
    <li class=""><a href="#" rel="noopener">Our Boutiques</a></li>
    
    </div>
   <div class="navbar flex">
   <h1><a href="/"><img src="./images/logo2.png" alt="" ></a></h1>
    <nav class="menu_con">
        <a href="index.php" class="">home</a>
        <a  class="dropdown-show">Men</a>
        <a  class="dropdown-show">Women</a>
        <a  class="dropdown-show">Brands</a>
        <a  class="about">About us</a>

</nav>
    <div class="icons">
        <a id="menu-btn" class="fas fa-bars"></a>
        <a href="search.php" class="fas fa-search"></a>
        <a id="user-btn" class="fas fa-cart-shopping"></a>
       
    </div>

   </div>
</div>

</header>
<script>
    
const dropdownShow = document.querySelectorAll(".dropdown-show");
const dropdown = document.querySelector(".dropdown");
const aboutMenu = document.querySelector(".about");
const aboutDropdown = document.querySelector(".about-drop");
const cutIcon = document.querySelectorAll(".cut");
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
cutIcon.forEach(icon => {
  icon.addEventListener("click", () => {
    dropdown.style.transform = "scale(0)";
  });
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

</script>