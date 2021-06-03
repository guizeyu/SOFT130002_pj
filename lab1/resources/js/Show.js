function message() {
    if (document.getElementById("button").innerHTML==="Collected"){
        alert("已添加！");
    }else {
        alert("添加成功！");
        document.getElementById("button").innerHTML="Collected";
    }

}

