//主题颜色切换
$(".color").hide()
$(".coloricon").click(function() {
    $(".color").toggle()
})
var color = window.localStorage.getItem("color");
$(".center,.nav-content,.xiazai").css("background", color);
$(".xiazai,.yanshi").css({ "border": "1px solid " + color })
$(".yanshi").css({ "color": color })
$(".color").click(function() {
        var background = $(this).attr("background");
        window.localStorage.setItem("color", background);
        $(".center,.nav-content,.xiazai").css("background", background);
        $(".xiazai,.yanshi").css({ "border": "1px solid " + background })
        $(".yanshi").css({ "color": background });
        $(".nav-content li").css("background", "")
    })
    // 鼠标经过和点击效果
$(".box,.works").mouseover(function() {
    if (color) {
        $(this).css({ "box-shadow": color + " 1px 1px 5px" }).find(".box-title").css("color", color);
    } else {
        $(this).css({ "box-shadow": "#4281FF 1px 1px 5px" }).find(".box-title").css("color", "#4281FF");
    }
    $(this).parent().siblings().find(".box,.works").css({ "box-shadow": "#ddd 1px 1px 5px" }).find(".box-title").css("color", "#000")
})
$(".box,.works").mouseout(function() {
    $(this).css({ "box-shadow": "#ddd 1px 1px 5px" }).find(".box-title").css("color", "#000");
})
$(".box,.works").on("touchmove", function(e) {
        var color = window.localStorage.getItem("color");
        if (color) {
            $(this).css({ "box-shadow": color + " 1px 1px 5px" }).find(".box-title").css("color", color);
        } else {
            $(this).css({ "box-shadow": "#4281FF 1px 1px 5px" }).find(".box-title").css("color", "#4281FF");
        }
        $(this).parent().siblings().find(".box,.works").css({ "box-shadow": "#ddd 1px 1px 5px" }).find(".box-title").css("color", "#000")
    })
    // 跳转
$(".admin-btn").click(function() {
    $(location).prop('href', '/admin')
})
$(".blog-btn").click(function() {
    $(location).prop('href', 'http://blog.hkiii.cn')
})
$(".box,.yanshi,.xiazai").click(function(e) {
        var url = $(this).attr("url");
        $(location).prop('href', url)
    })
    // 底部和顶部tabbar
var tab = window.localStorage.getItem("tab");
// 如果第一次访问则默认显示首页，反之显示上次的位置
if (tab == null) {
    $("#home").show().siblings().hide();
} else {
    $(tab).show().siblings().hide();
}
//判断当前页面
if (tab == "#home" || tab == null) {
    $(".foot").children().eq(0).css("background", color || "#4281FF").siblings().css("background", "");
} else if (tab == "#contact") {
    $(".foot").children().eq(1).css("background", color || "#4281FF").siblings().css("background", "");
}
if (tab == "#tools") {
    $(".foot").children().eq(2).css("background", color || "#4281FF").siblings().css("background", "");
}
if (tab == "#about") {
    $(".foot").children().eq(3).css("background", color || "#4281FF").siblings().css("background", "");
}

$("li div").click(function() {
    var settab = $(this).attr("tab");
    var color = window.localStorage.getItem("color");
    $(this).parent().css("background", color || "#4281FF").siblings().css("background", "");
    window.localStorage.setItem("tab", settab);
    btn(settab);
})

function btn(v) {
    $(v).show().siblings().hide();
}
//工具箱logo
var logo = []
    //获取工具数量
var toolsnum = $("#tools").find(".box-title")
var toolslogo = $(".tools-logo")
for (var i = 0; i < toolsnum.length; i++) {
    // 将工具标题存到数组
    logo.push($(toolsnum[i]).text());
    // 将第一个字符串转为大写并用作logo
    $(toolslogo[i]).text(logo[i][0].toUpperCase())
}
// 一言
fetch('https://v1.hitokoto.cn')
    .then(response => response.json())
    .then(data => {
        const hitokoto = document.getElementById('hitokoto')
        hitokoto.href = 'https://hitokoto.cn/?uuid=' + data.uuid
        hitokoto.innerText = data.hitokoto
    })
    .catch(console.error)

var works = $(".works")
for (var i = 0; i < works.length; i++) {
    var url = $(works[i]).find(".xiazai").attr("url");
    var yanshi = $(works[i]).find(".yanshi").attr("url");
    if (url.length == 0) {
        $(works[i]).find(".xiazai").text("暂无下载")
    }
    if (yanshi.length == 0) {
        $(works[i]).find(".yanshi").text("暂无演示")
    }
}

$(".xiazai").click(function(e) {
    var url = $(this).attr("url");
    if (url.length == 0) {
        alert("暂不提供下载")
        $(this).css({ backgroundColor: "#eee", color: black })
    }
})
$(".yanshi").click(function(e) {
    var url = $(this).attr("url");
    if (url.length == 0) {
        alert("暂不提供演示")
    }
})