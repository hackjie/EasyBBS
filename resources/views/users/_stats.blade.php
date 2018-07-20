<div class="stats">
    <a href="{{ route('users.followings', $user->id) }}">
      <strong id="following" class="stat">
        {{ count($user->followings) }}
      </strong>
      关注
    </a>
    <a href="{{ route('users.followers', $user->id) }}">
      <strong id="followers" class="stat">
        {{ count($user->followers) }}
      </strong>
      粉丝
    </a>
</div>