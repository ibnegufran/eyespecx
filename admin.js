
let accont=document.querySelector(".account-box");
let user=document.querySelector("#user");
let menu=document.querySelector("#menu");
let ul=document.querySelector("ul");
// let account_box=document.getElementsByClassName("nav accont-box");







user.addEventListener("click",()=>{
console.log("clicked");
accont.classList.toggle('active');
});
menu.addEventListener("click",()=>{
ul.classList.toggle('active');
})
window.onscroll=()=>{
    ul.classList.remove('active');
    accont.classList.remove('active');

}
document.querySelector('#reset').onclick=()=>{
    document.querySelector('.update_container').style.display='none';
    window .location.href="admin_product.php"
}





