function getCookie(name)
{
    var cookie = document.cookie    //获取cookie字符串
    console.log(cookie)
    var cookie_arr = cookie.split(';')     // 将cookie字符串分割为数组
    var res = []        //定义一个数组 用于保存格式化后的 cookie

    for(var i=0;i<cookie_arr.length;i++)
    {
        var tmp = cookie_arr[i].split('=')      //拆分 cookie中的 key=val
        // console.log(tmp)
        var k = tmp[0].trim()
        var v = tmp[1].trim()
        res[k] = v          // 将 cookie的 key及值保存在数组中
    }
 
    return res[name]  

    //返回要获取的 cookie

}