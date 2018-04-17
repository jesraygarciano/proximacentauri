
@extends('messaging.layout')

@section('css')
<link rel="stylesheet" href="{{ asset('css/messaging/style.css') }}">
@endsection

@section('content')
    <div id="threads">
    	@include('messaging.threads')
    	@include('messaging.message-box')
    </div>
@endsection

@section('scripts')
<script type="text/javascript" src="{{asset('js/unickMessenger.js')}}"></script>
<script type="text/javascript">
	$('#threads').unickMessenging({
		// socket_address:"http://5ab21ea1.ngrok.io",
		fetch_user_messages_url:"{{route('json_return_user_messages')}}",
		profile_pic:"{{\Auth::user()->photo}}",
		fetch_chatables_url:"{{route('json_return_chatable_users')}}",
		save_message_url:"{{route('json_save_sent_message')}}",
		mark_message_seen:"{{route('json_mark_message_seen')}}",
		search_contacts:"{{route('json_search_contact')}}",
		request_contact:"{{route('json_request_contact')}}",
		accept_contact:"{{route('json_accept_contact')}}",
		get_previews_message:"{{route('json_fetch_previews_messages')}}",
		csrf_token:'{{ csrf_token() }}',
		auth_id:{{\Auth::user()->id}}
        //QUESTION_DETECT : ↑これjson？javascript object
	});
</script>
@endsection
