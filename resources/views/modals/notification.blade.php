 @if(session('message'))
 <div class="notification" id="notification">
        <h3 class="notification-title">Notificatie</h3>
        <p class="notification-message" id="notification-message" role="alert">
          {{ session('message') }}
        </p>
 </div>
 @endif

@if (count($errors))
			@foreach($errors->all() as $error)
				 <div class="notification" id="notification">
        <h3 class="notification-title" style="color: red;">Foutje</h3>
        <p class="notification-message" id="notification-message" role="alert">
          {{ $error }}
        </p>
       </div>
			@endforeach
@endif