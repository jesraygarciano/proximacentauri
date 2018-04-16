/*
CLICKABLE MAP
*/

(function(){
    // 
    $.fn.mapEventPlacer = function(options){

      var $this = $(this);
      // default settings if needed
      var settings = $.extend({
        width:'auto',
        viewBox:'0 0 703 1202',
        zoomDim:{x:703,y:1203},
        minwidth:100,
        maxwidth:703,
        zoomincrement:200,
        goToUrl:'/portals/search_ph_region/'
      },options);


      // append pointer on html body
      if($('.map-pointer').length < 1)
      {
        $('body').append(
        '<div class="map-pointer" style="z-index:10000;">'
        +'  <div class="text-container">'
        +'    Cebu'
        +'  </div>'
        +'  <div class="arrow"></div>'
        +'</div>'
        );
      }

      // dimension of svg
      var height = $this.find('svg').data('height');
      var width = $this.find('svg').data('width');

      var hdw = height / width;

      $this.css('width','auto');

      autoResizeViewBox();
      $this.find('svg')[0].setAttribute('viewBox',settings.viewBox);

      // initialize event for window resize
      $(window).resize(function(){
        autoResizeViewBox();
      });

      // resize view box based on svg aspect ratio
      function autoResizeViewBox(){

        console.log($this.width());

        $this.height( hdw * $this.width() );
      }

      // drag function for the map
      var currentPos = {x:0,y:0};
      var zoomDim = settings.zoomDim;

      setDragEvent();

      function setDragEvent(){
        var mousedown = false;
        var downPos = {};
        $this.find('svg').bind('touchstart mousedown',function(ev){
          mousedown = true;

          var xCoordinate = (ev.originalEvent.changedTouches)? ev.originalEvent.changedTouches[0].pageX - $(window).scrollLeft():ev.clientX;
          var yCoordinate = (ev.originalEvent.changedTouches)? ev.originalEvent.changedTouches[0].pageY - $(window).scrollTop():ev.clientY;

          downPos = {x:xCoordinate, y:yCoordinate};
          console.log(downPos)
        });

        $(window).bind('touchend mouseup',function(){
          mousedown = false;
        });

        $(window).bind('mousemove',function(ev){
          if(mousedown){
            var xCoordinate = (ev.originalEvent.changedTouches)? ev.originalEvent.changedTouches[0].pageX - $(window).scrollLeft():ev.clientX;
                        var yCoordinate = (ev.originalEvent.changedTouches)? ev.originalEvent.changedTouches[0].pageY - $(window).scrollTop():ev.clientY;

            temp = {x:downPos.x - xCoordinate , y:downPos.y - yCoordinate};
            console.log(temp);
            var pdc = zoomDim.x / $this.width();
            currentPos = {x:((temp.x * pdc) + currentPos.x), y:((temp.y * pdc) + currentPos.y)};
            downPos = {x:xCoordinate, y:yCoordinate};


            $this.find('svg')[0].setAttribute('viewBox',(currentPos.x)+' '+(currentPos.y)+' '+zoomDim.x+' '+zoomDim.y);
          }
        });

        $this.find('svg').bind('touchmove',function(ev){
          if(mousedown){
            var xCoordinate = (ev.originalEvent.changedTouches)? ev.originalEvent.changedTouches[0].pageX - $(window).scrollLeft():ev.clientX;
            var yCoordinate = (ev.originalEvent.changedTouches)? ev.originalEvent.changedTouches[0].pageY - $(window).scrollTop():ev.clientY;

            temp = {x:downPos.x - xCoordinate , y:downPos.y - yCoordinate};
            console.log(temp);
            var pdc = zoomDim.x / $this.width();
            currentPos = {x:((temp.x * pdc) + currentPos.x), y:((temp.y * pdc) + currentPos.y)};
            downPos = {x:xCoordinate, y:yCoordinate};


            $this.find('svg')[0].setAttribute('viewBox',(currentPos.x)+' '+(currentPos.y)+' '+zoomDim.x+' '+zoomDim.y);
          }
          return false;
        });
      }
      // end function

      // zoom functions
      setZoom()

      function setZoom(){
        var minwidth = settings.minwidth;
        var maxwidth = settings.maxwidth;
        var increase = settings.zoomincrement;
        var tempx = zoomDim.x;
        var tempy = zoomDim.y;

        $this.find('.zoom-in').click(function(){

          tempx = zoomDim.x;
          tempy = zoomDim.y;
          zoomDim.x = zoomDim.x - increase;

          if(zoomDim.x <= minwidth){
            zoomDim.x = minwidth;
          }

          zoomDim.y = hdw * zoomDim.x;

          x_diff = ( tempx - zoomDim.x) / 2;
          y_diff = ( tempy - zoomDim.y) / 2;
          currentPos.x = currentPos.x + x_diff
          currentPos.y = currentPos.y + y_diff;

          adjustViewBox();
        });

        $this.find('.zoom-out').click(function(){
          tempx = zoomDim.x;
          tempy = zoomDim.y;
          zoomDim.x = zoomDim.x + increase;

          if(zoomDim.x >= maxwidth){
            zoomDim.x = maxwidth;
          }

          zoomDim.y = hdw * zoomDim.x;

          x_diff = (zoomDim.x - tempx ) / 2;
          y_diff = (zoomDim.y - tempy ) / 2;
          currentPos.x = currentPos.x - x_diff;
          currentPos.y = currentPos.y - y_diff;

          adjustViewBox();
        });

        function adjustViewBox(){
          $this.find('svg')[0].setAttribute('viewBox',( currentPos.x )+' '+( currentPos.y )+' '+zoomDim.x+' '+zoomDim.y);
        }
      }
      // end function

      // path mouseover function filling map pointer text
      $($this).find('path').mouseover(function(e){
        var hirings = $(this).data('hirings') > 0 ? ' <span><span class="badge badge-info" style="background-color:#17a2b8;">'+$(this).data('hirings')+'</span> Hirings' : '<span style="color:#797979;">No Hirings</span>'
        $('.map-pointer .text-container').html(
          $(this).attr('title')
          +'<div style="font-size:10px;">'
          +hirings
          +'</div>'
        );
        positioMousePointer({x:e.pageX - $(window).scrollLeft(), y:e.pageY - $(window).scrollTop() - 5});
        $('.map-pointer').show();
      });

      // event for hiding the map pointer
      $this.mouseout(function(){
        $('.map-pointer').hide();
      });

      function positioMousePointer(position){
        $('.map-pointer').css({left:position.x, top:position.y});
      }

      checkIfClicked();

      // make sure mouse was not dragged white mouse is down
      function checkIfClicked(){
        var coor = {x:0,y:0};

        // set click event for every path
        $($this).find('path').mousedown(function(ev){
          coor.x = ev.clientX;
          coor.y = ev.clientY;
        });

        $($this).find('path').mouseup(function(ev){
          if(coor.x == ev.clientX && coor.y == ev.clientY){
            window.location.href = settings.goToUrl+$(this).attr('id');
          }
        });
      }

      return $this;
    }
  })(jQuery);
