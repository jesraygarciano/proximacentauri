(function(){
    'use strict';

    //educational background
    var ed1 = document.getElementById('educational1');
    var ed2 = document.getElementById('educational2');
    var ed3 = document.getElementById('educational3');
    var ed4 = document.getElementById('educational4');
    var ed5 = document.getElementById('educational5');
    var ed6 = document.getElementById('educational6');
    var add_ed_btn = document.getElementById('add_ed');
    var time;

    if (document.getElementById('educational2') != null) {
        var clone = ed2.cloneNode(true);
        ed2.parentNode.appendChild(clone);
        clone.style.cssText = "display:block; height:auto; visibility:hidden;";
        var clone_height = clone.offsetHeight;
        ed2.parentNode.removeChild(clone);
    }

    if (document.getElementById('add_ed') != null) {
        add_ed_btn.addEventListener('click', function() {
            var hide = document.getElementsByClassName('default-hide-ed');
            if(hide.length > 0){
                // console.log(hide[0].id);

                var a = document.getElementById(hide[0].id);
                var a_height = a.offsetHeight;
                a.style.display = 'block';
                slide_down(a_height);
                function slide_down(a_height){
                    if (a_height < clone_height) {
                        a_height += 10;
                        a.style.height = a_height + "px";
                        time = setTimeout(function () {
                            slide_down(a_height)
                        }, 5);
                    }else {
                        clearTimeout(time);
                        hide[0].classList.remove('default-hide-ed');
                    }
                }
                if (hide.length == 1) {
                    this.classList.add('default-hide-ed');
                }
            }
        });
    }



    //experience
    var ex1 = document.getElementById('experience1');
    var ex2 = document.getElementById('experience2');
    var ex3 = document.getElementById('experience3');
    var ex4 = document.getElementById('experience4');
    var ex5 = document.getElementById('experience5');
    var ex6 = document.getElementById('experience6');
    var ex7 = document.getElementById('experience7');
    var ex8 = document.getElementById('experience8');
    var ex9 = document.getElementById('experience9');
    var ex10 = document.getElementById('experience10');

    var add_ex_btn = document.getElementById('add_ex');
    var time;
    if (document.getElementById('experience2') != null) {
        var clone = ex2.cloneNode(true);
        ex2.parentNode.appendChild(clone);
        clone.style.cssText = "display:block; height:auto; visibility:hidden;";
        var clone_height = clone.offsetHeight;
        ex2.parentNode.removeChild(clone);
    }

    if (document.getElementById('add_ex') != null) {
        add_ex_btn.addEventListener('click', function() {
            var hide = document.getElementsByClassName('default-hide-ex');
            if(hide.length > 0){
                var a = document.getElementById(hide[0].id);
                var a_height = a.offsetHeight;
                a.style.display = 'block';
                slide_down(a_height);
                function slide_down(a_height){
                    if (a_height < clone_height) {
                        a_height += 10;
                        a.style.height = a_height + "px";
                        time = setTimeout(function () {
                            slide_down(a_height)
                        }, 5);
                    }else {
                        clearTimeout(time);
                        hide[0].classList.remove('default-hide-ex');
                    }
                }
                if (hide.length == 1) {
                    this.classList.add('default-hide-ex');
                }
            }
        });
    }

    //character_references
    var cr1 = document.getElementById('cr1');
    var cr2 = document.getElementById('cr2');
    var cr3 = document.getElementById('cr3');
    var cr4 = document.getElementById('cr4');
    var cr5 = document.getElementById('cr5');
    var cr6 = document.getElementById('cr6');
    var cr7 = document.getElementById('cr7');
    var cr8 = document.getElementById('cr8');
    var cr9 = document.getElementById('cr9');
    var cr10 = document.getElementById('cr10');

    var add_cr_btn = document.getElementById('add_cr');
    var time;

    if (document.getElementById('cr2') != null) {
        var clone = cr2.cloneNode(true);
        cr2.parentNode.appendChild(clone);
        clone.style.cssText = "display:block; height:auto; visibility:hidden;";
        var clone_height = clone.offsetHeight;
        cr2.parentNode.removeChild(clone);
    }

    if (document.getElementById('add_cr') != null) {
        add_cr_btn.addEventListener('click', function() {
            var hide = document.getElementsByClassName('default-hide-cr');
            if(hide.length > 0){
                var a = document.getElementById(hide[0].id);
                var a_height = a.offsetHeight;
                a.style.display = 'block';
                slide_down(a_height);
                function slide_down(a_height){
                    if (a_height < clone_height) {
                        a_height += 10;
                        a.style.height = a_height + "px";
                        time = setTimeout(function () {
                            slide_down(a_height)
                        }, 5);
                    }else {
                        clearTimeout(time);
                        hide[0].classList.remove('default-hide-cr');
                    }
                }
                if (hide.length == 1) {
                    this.classList.add('default-hide-cr');
                }
            }
        });
    }

})();
