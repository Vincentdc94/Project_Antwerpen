 <div class="notification" id="notification">
    @if(session('message'))
        <h3 class="notification-title">Notificatie</h3>
        <p class="notification-message" id="notification-message" role="alert">
          {{ session('message') }}
        </p>
    @endif
 </div>
 
