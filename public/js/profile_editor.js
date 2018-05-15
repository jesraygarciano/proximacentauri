// uelmar wizard Jan. 22, 2018
// profile editor

(function($){
	$.fn.profileEditor = function(options){
		var settings = $.extend({}, options);
		var currentSubmitFunction;
		this.current_panel;
		this.id;

		$this = this;

		this.setEvents = function(){
			this.setEditButtonEdit($this.find('.pr-edit-btn'));
			return $this;
		}

		this.setEditButtonEdit = function(elm){
			elm.click(function(){
				$this.id = $(this).data('id');
				var handler = settings.editHandlers[$(this).attr('id')];
				$this.current_panel = $(this).attr('id');
				if(handler){
					handler($this);
				}
				else{
					$this.prepUpdate(this);
				}
			});
		}

		this.prepUpdate = function(elm){
			var targetModal = $(elm).prop('edit-target');
			$(targetModal).modal('show');
			$(targetModal).find('.submit').unbind();
			$(targetModal).find('.submit').click(settings.submitHandlers[$(elm).attr('id')]);
		}

		$this.setEvents();
	}
})(jQuery)

function fillInfos(selector,data){
	$.each(data, function(index, val){
		selector.find('.'+index).html(val);
	});
}