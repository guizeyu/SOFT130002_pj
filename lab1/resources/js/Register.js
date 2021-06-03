function message() {
    const user = document.getElementById("username").value;
    const password = document.getElementById("password").value;
    const confirm = document.getElementById("confirm").value;
    const pwd = /^(?=.*[0-9])(?=.*[a-zA-Z])([a-zA-Z0-9]){2,}$/;
    if (user.length === 0 || password.length === 0 ||confirm.length===0) {
        alert("以上三项不能为空！");
    }else if (password !== confirm){
        alert("两次密码不一致！");
    }else if (password.match(pwd)==null){
        alert("密码应该既有数字又有字母");
    }else {
        alert("注册成功！");
    }
}