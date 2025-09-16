let accountBox=document.querySelector(".account-box");

 let loc=location.href;
let anchors=document.querySelectorAll(".header2 .navbar .menu_con a");
console.log(anchors);
for(let i=0;i<anchors.length;i++){
if(anchors[i].href === loc){
  anchors[i].classList.add("active");
}
}
let search_btn=document.getElementById('search_btn');
document.querySelector("#user-btn").onclick=()=>{
    accountBox.classList.toggle("active");
    document.querySelector(".menu_con").classList.remove("nav-active");


}

let menuBtn=document.querySelector("#menu-btn");
menuBtn.addEventListener("click",()=>{
    document.querySelector(".menu_con").classList.toggle("nav-active");
    accountBox.classList.remove("active");

})


window.onscroll=()=>{
    document.querySelector(".menu_con").classList.remove("nav-active");
    accountBox.classList.remove("active");

if(window.scrollY >60){
	document.querySelector("header .header2").classList.add("active");

}else{
	document.querySelector("header .header2").classList.remove("active");

}

}

search_btn.addEventListener("keyup", function  (event) {
	if(event.keyCode == 13){
		search_btn.clicked();
	}
	// body... 
});

// document.querySelector("#menu-btn").onclick=()=>{
//     navbar
// }