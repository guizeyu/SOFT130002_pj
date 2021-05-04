
function message() {
    const user = document.getElementById("username").value;
    const password = document.getElementById("password").value;
    if (user.length === 0 || password.length === 0) {
        alert("用户名和密码不能为空！");
    }
    if (user.length !== 0 && password.length !== 0) {
        alert("登陆成功！");
    }
}