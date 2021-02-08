<template>
  <div class="user-information">
    <div class="user-img">
      <a href="#"><img src="/images/uploads/user-img.png" alt="" /><br /></a>
      <a href="#" class="redbtn">Change avatar</a>
    </div>
    <div class="user-fav">
      <p>Account Details</p>
      <ul>
        <li><inertia-link :href="route('dashboard')">Profile</inertia-link></li>
        <li>
          <inertia-link :href="route('user.favorite.movies')"
            >Favorite movies</inertia-link
          >
        </li>
        <li><inertia-link href="/dashboard/calendar">Calendar</inertia-link></li>
        <li><inertia-link href="/dashboard/myshows">My Shows</inertia-link></li>
        <li><inertia-link href="/dashboard/unwatched">Unwatched</inertia-link></li>
      </ul>

     
    </div>
    <div class="user-fav">
      <p>Others</p>
      <ul>
        <li><a href="#">Change password</a></li>
        <li><a href="#">Log out</a></li>
      </ul>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
     
    }
  }
};
</script>

<style>
</style>