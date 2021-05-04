$(function(){
    getHistory();
});
//最大历史记录为3
var historyCount=3;
//增加浏览记录
function setHistory(Home,Login,Register,Collection,Search,Show){
    stringCookie=getCookie('history');
    var stringHistory=""!=stringCookie?stringCookie:"{history:[]}";
    var json=new JSONHistory(stringHistory);  //转成json
    var list = json['history'];  //获得json
    for (var i = 0; i < list.length; i++) {
        try {
            if(list[i].id == id){
                list.splice(i,1); //删除重复数据，开始位置,删除个数
                i=i-1; //下标归位
            }
        } catch (e) {
            break;
        }
    }

    if(list.length>=historyCount){
        //删除最开始的多余记录
        var count = list.length - historyCount + 1; //需要删除的个数
        list.splice(0,count); //开始位置,删除个数
    }

    var e="{Home:'"+Home+"',Login:'"+Login+"',Register:'"+Register+"',Collection:'"+Collection+"',Search:'"+Search+"',Show:'"+Show+"'}";
    json['history'].push(e);//添加一个新的记录
    setCookie('history',json.toString(),365); //365天
}

