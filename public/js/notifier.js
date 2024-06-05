// Uelmar Ortega author
// Feb. 14, 2018
// this is a messaging app; implementing redis socket.io

(function(){
	$.fn.messageNotifier = function(options){
		var settings = $.extend({},options);

		var loading = false;

		var $this = $(this);
		var n_m_c = [];

		for(var index in settings.unseen_messages){
			n_m_c.push({s_id:settings.unseen_messages[index].user_id});
		}

		$.socket.on('r-p-m', function(data){
			//
			newMessage(data);
			console.log(data);
		});

		$.socket.on('u-m-noti',function(data){
			console.log('n_m_c');
			console.log(n_m_c);
			console.log(data);
			for(var index = n_m_c.length-1; index >= 0; index--){
				if(n_m_c[index].s_id == data.s_id){
					n_m_c.splice(index,1);
				}
			}

			console.log(n_m_c);

			if(n_m_c.length > 0)
			{
				$this.find('.num-icon').show();
				$this.find('.num-icon div').html(n_m_c.length);
			}
			else
			{
				$this.find('.num-icon').hide();
			}
		});

		$.socket.on('connect',function(){
			//
		});

		$.socket.on('disconnect', function () {
			//
		});

		$.socket.on('reconnect', function () {
			//
			$.socket.emit('client add', settings.auth_id);
		});

		$.socket.on('reconnect_error', function () {
			//
		});

		function newMessage(data){
			n_m_c.push(data);
			$this.find('.num-icon').show();
			$this.find('.num-icon div').html(n_m_c.length);
		}
	}

	$.fn.bellNotifier = function(options){
		var settings = $.extend({},options);
		var $this = $(this);

		var new_openings = 0;
		var applications = 0;
		var scouts = 0;

		fetch_notification();

		//↓Opening Modelのboot()メソッドのeventをここでもらっている。
		$.socket.on('notification-channel:App\\Events\\NotificationEvent',function(data){
			//
			console.log(data);
			if(data.data.event == 'created')
			{
				switch(data.data.type){
					case 'new opening':
					new_openings++;
					$this.find('.new_openings').html(new_openings).show();
					break;
					case 'application':
					applications++;
					$this.find('.applications').html(applications).show();
					break;
					case 'scout':
					scouts++;
					$this.find('.scouts').html(scouts).show();
					break;
				}
				$this.find('.num-icon div').html(new_openings + applications + scouts).parent().show();
			}
			else
			{
				switch(data.data.type){
					case 'new opening':
					new_openings--;
					$this.find('.new_openings').html(new_openings).css({display:( new_openings < 1 ?'none':'')});
					break;
					case 'application':
					applications--;
					$this.find('.applications').html(applications).css({display:( applications < 1 ?'none':'')});
					break;
					case 'scout':
					scouts--;
					$this.find('.scouts').html(scouts).css({display:( scouts < 1 ?'none':'')});
					break;
				}
				var total = new_openings + applications + scouts;
				$this.find('.num-icon div').html(total).parent().css({display:( total < 1 ?'none':'')});
			}

		});

		function fetch_notification(){
            $.ajax({
                url:settings.fetch_not_stats,
                type:"GET",
                data:{
                    user_id:settings.auth_id,
                    company_id:settings.company_id,
                },
                success:function(data){
                    var bell_container = $this;
                    var total_not = data.applications+data.scouts+data.openings;
                    bell_container.find('.applications').html(data.applications).css('display',data.applications < 1 ? 'none' : '');
                    bell_container.find('.scouts').html(data.scouts).css('display',data.scouts < 1 ? 'none' : '');
                    bell_container.find('.new_openings').html(data.openings).css('display',data.openings < 1 ? 'none' : '');
                    bell_container.find('.num-icon div').html(total_not).parent().css('display',total_not < 1 ? 'none' : '');

                    new_openings = data.openings;
                    applications = data.applications;
                    scouts = data.scouts;
                }
            });
        }
	}
})(jQuery)
