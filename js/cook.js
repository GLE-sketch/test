var time = 3
var times=setInterval(function () {

    if(time>=0){
        var s = Math.floor(time%60)
        var tim=s+'秒'
        document.getElementById('time').innerText=tim
        // console.log(time)
        time--
    }else{
        clearInterval(times)
        document.getElementById("time").style.display="none";
        var user_names = getCookie("user_names");
        var user_id= getCookie("user_ids");
    
        $.ajax({
            url:'api.php',
            method:'GET',
            data:{user_names:user_names,user_ids:user_id},
            dataType:'json'
        }).done(function (d) {
            function timestampToTime(timestamp) {
                var date = new Date(timestamp * 1000);//时间戳为10位需*1000，时间戳为13位的话不需乘1000
                var Y = date.getFullYear() + '-';
                var M = (date.getMonth()+1 < 10 ? '0'+(date.getMonth()+1) : date.getMonth()+1) + '-';
                var D = date.getDate() + ' ';
                var h = date.getHours() + ':';
                var m = date.getMinutes() + ':';
                var s = date.getSeconds();
                return Y+M+D+h+m+s;
            }
            $('#a').append(d['email'])
            $('#b').append(timestampToTime(d['last_logiin']))
            $('#c').append(timestampToTime(d['time']))
        })


    }



},1000)
