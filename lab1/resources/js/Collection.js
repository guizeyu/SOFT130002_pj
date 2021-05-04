function kill(){
    var img1=document.getElementById("img1");
    var img2=document.getElementById("img2");
    if (img1){
        img1.parentNode.removeChild(img1);
    }
}
function kill2() {
    var img2=document.getElementById("img2");
    if (img2){
        img2.parentNode.removeChild(img2);
    }
}