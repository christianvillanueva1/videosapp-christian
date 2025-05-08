@vite(['resources/css/user.css', 'resources/css/global.css'])


<div class="main-user-div" onclick="window.location='{{ route('users.show', $user->id) }}'">
    <div class="user-avatar">
        @if($user->profile_photo_url)
            <img src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}'s photo"
                 class="avatar-img">
        @else
            <div class="avatar-placeholder">{{ strtoupper(substr($user->name, 0, 1)) }}</div>
        @endif
    </div>
    <div class="user-info">
        <h5>{{ $user->name }}</h5>
        <p>{{ $user->email }}</p>
    </div>
</div>
