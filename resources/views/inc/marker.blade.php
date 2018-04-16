<script type="text/javascript">
	$(document).ready(function(){


		// uelmar's code for book marking openings
		button_bookmark_event($('.bookmark_opening_bttn'))

		// uelmar's code for following company
		$('.follow_company_bttn').click(function(){
			var $this = $(this);
			// trigger ajax function
			$.ajax({
				url:"{{route('edit_company_follow')}}",
				type:'POST',
				headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
				data:{ company_id:$this.data('id') },
				success:function(data){
					if(data == "followed"){
						// opening bookmared
						$this.css({'color':'#ff9a0b'});
						$this.find('._text').html('Unfollow');
					}
					else
					{
						// opening unbookmarked
						$this.css({'color':''});
						$this.find('._text').html('Follow');
					}
				}
			});
		});


		// Applicants save
		$('.save_applicant_bttn').click(function(){
			var $this = $(this);
			// trigger ajax function
			$.ajax({
				url:"{{route('edit_save_applicant')}}",
				type:'POST',
				headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
				data:{ applicant_saved_id:$this.data('id') },
				success:function(data){
					if(data.result == "saved"){
						// User saved
						$this.css({'color':'#ff9a0b'});
						// $this.find('.fa').css({'color':'#ff9a0b'});
						$this.find('._text').html('Unsave applicant'+' (<b>'+data.saves+'</b>)');
					}
					else
					{
						// User unsaved
						$this.css({'color':'#808080'});
						$this.find('._text').html('Save applicant'+' (<b>'+data.saves+'</b>)');
					}
				}
			});
		});

	});

	function button_bookmark_event(elm){
		elm.click(function(){
			var $this = $(this);
			// trigger ajax function
			$.ajax({
				url:"{{route('edit_opening_bookmark')}}",
				type:'POST',
				headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
				data:{ opening_id:$this.data('id') },
				success:function(data){
					if(data.result == "bookmarked"){
						// opening bookmared
						$this.css({'color':'#ff9a0b'});
						$this.find('._text').html('Unbookmark'+' (<b>'+data.bookmarks+'</b>)');
					}
					else
					{
						// opening unbookmarked
						$this.css({'color':'#808080'});
						$this.find('._text').html('Bookmark'+' (<b>'+data.bookmarks+'</b>)');
					}
				}
			});
		});
	}
</script>