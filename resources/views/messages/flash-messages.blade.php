@if ($message = Session::get('success'))
	<div class="msg msg-success" style="width: 70%; height: 30px; background-color: #37ae3c; color: white;display:flex;padding:0.3em 1em;align-items:center; position: fixed; margin: 7px 0;">
		{{$message}}
	</div>
@endif