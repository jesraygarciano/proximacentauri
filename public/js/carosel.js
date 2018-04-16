/*
CAROSEL FOR FEATURED JOB POST
*/

(function($){

  $.fn.featuredPostCarosel = function(options){

    var $this = $(this);

    var width = $this.find(".post-item").width();
    var current_index = 2;
    var mr = parseInt($this.find(".post-item").css("margin-right").replace("px", ""));
    $this.find(".wing").css("margin-left", -(width / 2) - mr);
    $(".post-item").eq(2).addClass('active');
    var transform_x = String(-width -mr) + "px";
    // console.log(transform_x);
    var settings = $.extend({
      interval: 3000
    });
    // var wing = $this.find(".wing");
    // var first = $this.find(".post-item").eq(0);

    indicator_change(current_index);
    autoSlideUme();

    function autoSlideUme(){
      var time = setTimeout(function(){
        nextSlideUme();
        autoSlideUme();
      },settings.interval);
    }

    function nextSlideUme(){
      var first = $this.find(".post-item").eq(0);
      $(".wing").append(first.clone());
      first.css({"margin-left": transform_x})
      $(".post-item").removeClass('active');
      $(".post-item").eq(3).addClass('active');
      if (current_index < 4) {
        current_index++;
      }else{
        current_index = 0;
      }
      indicator_change(current_index);
      // console.log(current_index);
      var time = setTimeout(function () {
        first.remove();

      }, 200);
    }

    function indicator_change(index){
      $(".indicators li").removeClass("active");
      $(".indicators li").eq(index).addClass("active");
    }

    $(".indicators li").click(function(){
      var click_ind = $(".indicators li").index(this);
      var click_ind_div = parseInt($(".wing .post-item").eq(click_ind).data('ind').replace("ind_", ""));
      var where = $(".wing").find("[data-ind='ind_" + click_ind + "']").index();
      var ind_position = parseInt($(".wing .post-item.active").data('ind').replace("ind_", ""));
      //
      // console.log("indicator number:", click_ind);
      // console.log("div number according to indicator:", click_ind_div);
      // console.log("center (active):", ind_position);
      // console.log("0番を持ったものが今どこにあるか？:", where);

      var diff = click_ind - ind_position;
      var post_items = $(".wing .post-item");
      if (post_items.length == 5) {
        var first_clone = post_items.eq(0).clone();
        var second_clone = post_items.eq(1).clone();
        var third_clone = post_items.eq(3).clone();
        var fourth_clone = post_items.eq(4).clone();
        var wing_div = $(".wing");
        wing_div.append(first_clone);
        wing_div.append(second_clone);
        wing_div.prepend(fourth_clone);
        wing_div.prepend(third_clone);
        //
        var wing_div = $(".wing .post-item");
        for (var i = 0; i < wing_div.length; i++) {
          // console.log("出ろ");
          var click_ind2 = $(".indicators li").index(this);
          var check_number = parseInt(wing_div.eq(i).data("ind").replace("ind_", ""));
          var bar = (click_ind2 - 2 + 5) % 5
          console.log("bar", bar);
          if (bar == check_number) {
            break;
          }else{
            $(".wing .post-item").eq(0).remove();
          }
        }

        var post_items = $(".wing .post-item");
        if (post_items.length != 5) {
          var diff = post_items.length - 5;
          for (var i = 0; i < diff; i++) {
            $(".wing .post-item").last().remove();
            // $(".wing .post-item").eq(post_items.length - 1).remove();
          }
        }

        $(".wing .post-item").removeClass('active');
        $(".wing .post-item").eq(2).addClass('active');
        // console.log('after for');

      }
      // $(".wing .post-item").eq()

    });

    $(".carosel-controls .left").click(function(){
      $(".wing").prepend($(".wing .post-item").eq(4));
      var first = $(".wing .post-item").eq(0);
      $(".post-item").each(function(){
        $(this).removeClass('active');
      });
      $(".post-item").eq(2).addClass('active');
      first.css({"margin-left": "0px"});
    });

    $(".carosel-controls .right").click(function(){
      $(".wing").append($(".wing .post-item").eq(0));
      var first = $(".wing .post-item").eq(0);
      $(".post-item").each(function(){
        $(this).removeClass('active');
      });
      $(".post-item").eq(2).addClass('active');
      first.css({"margin-left": "0px"});
    });
    return this;
  };


  $.fn.featuredPostCarosel_specimen = function(options){

    var $this = $(this);

    // check first if there are posts
    if($this.find('.post-item').length == 0)
    {
      $this.find('.post-container').html('<h3 style="position:absolute; top:50%; left:50%; transform:translateY(-50%) translateX(-50%)">No hiring posts.</h3>');
      return false;
    }

    // vars
    var post_item_width = $this.find('.post-item').width();
    var post_item_margin_left = $this.find('.post-item').css('margin-right').replace('px','');
    var currentIndex = 1;
    var ran = Math.random();
    var mouse_over = false;

    $(this).find('.wing').css({'left':'50%'});

    // default settings
    var settings = $.extend({
      interval:3000
    });

    // trigger auto slide
    autoSlide(ran);

    function resetAutoSlide(){

      // change ran value so that other pending autoSlides will be cancelled
      ran = Math.random();

      var _ran = ran;
      setTimeout(function(){
        autoSlide(_ran);
      },settings.interval);

    }

    function autoSlide(_ran){

      // check _ran matches current ran
      if(_ran == ran && !mouse_over){
        if(currentIndex < 4){
          currentIndex++;
        }
        else
        {
          currentIndex = 0;
        }

        goSlide(currentIndex);

        setTimeout(function(){
            autoSlide(_ran);
        }, settings.interval);
      }

    };

    // left navigation
    $this.find('.left').click(function(){
      if(currentIndex > 0){
        goSlide(currentIndex - 1);
      }
      else
      {
        goSlide(4);
      }
      resetAutoSlide();
    });

    // right navigation
    $this.find('.right').click(function(){
      if(currentIndex < 4){
        goSlide(currentIndex + 1);
      }
      else
      {
        goSlide(0);
      }
      resetAutoSlide();
    });

    // indecator navigate event
    $this.find('.indicators li').click(function(){
      var index = $this.find('.indicators li').index(this);

      goSlide(index);
      resetAutoSlide();
    });

    // stop animation when mouse on top
    $this.mouseenter(function(){
      mouse_over = true;
    });

    // start animation when mouse leaves
    $this.mouseleave(function(){
      mouse_over = false;
      resetAutoSlide();
    });


    // trigger a slide with ---index--- parameter
    function goSlide(index){

      currentIndex = index;
      var margin = (currentIndex * post_item_margin_left) + (currentIndex * 3) + (currentIndex * post_item_width) + (post_item_width / 2) + 0;
      $this.find('.post-item').removeClass('active');
      $this.find('.post-item').eq(currentIndex).addClass('active');

      var text = $this.find('.post-item').eq(currentIndex).find('.requirements').data('requirements');
      $this.find('.post-item').eq(currentIndex).find('.requirements').html(text);

      // make active element center by adjusting it's left margin
      $this.find('.wing').css({'margin-left':-margin});

      // trigger indicator update
      updateIndicator(index);

    }

    function updateIndicator(index){

      // remove active class for indicator list items
      $this.find('.indicators li').removeClass('active');

      // add active class for active list item
      $this.find('.indicators li').eq(index).addClass('active');
    }


    return this;
  };

}) (jQuery);
