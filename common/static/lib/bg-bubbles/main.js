$(function(){
    for (var i = 10; i >= 0; i--) {
        var dom = $('<li/>');
        dom.appendTo('#canvas');
        animate(dom);
    }
    function animate(dom) {
        var rand_size = 20 + Math.ceil(Math.random()*200),
            rand_square = 5 + Math.random()*20,
            rand_left = Math.random()*100,
            rand_raise = 5000 + Math.random()*20000,
            rand_bottom = 40 + Math.random()*80;
        dom.css({
            width: rand_size,
            height: rand_size,
            left: rand_left+"%",
            bottom: "-200px",
            opacity: 0.8,
            "animation" : "square "+rand_square+"s  infinite",
            "border-radius":  Math.random()>0.5? rand_size/2:0
        });
        dom.css("border-radius" , Math.random()>0.5? rand_size/2:0);
        dom.click(function(event) {
            
        });
        dom.animate({ 
            bottom : rand_bottom+"%"
        }, rand_raise ,'linear', function () {
            $(this).animate({
                opacity: 0
            }, 2000,'swing' , function(){
                animate($(this));
            });
        });
    }
})