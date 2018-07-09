<template>
<nav class="w3-sidebar w3-collapse w3-black w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
      <img src="/storage/img/team/team2.jpg" class="w3-circle w3-margin-right" style="width:46px">
    </div>
    <div class="w3-col s8 w3-bar">
      <span>Welcome, <strong>{{username.name}}</strong></span><br>
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Dashboard</h5>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>&nbsp; Close Menu</a>
    <router-link to="/overview" class="w3-bar-item w3-button w3-padding"><i class="fa fa-eye"></i>&nbsp; Overview</router-link>
    <router-link to="/homepage" class="navbar-item w3-bar-item w3-button w3-padding"><i class="fa fa-building"></i>&nbsp; View Organizations</router-link>
    <router-link to="/admin" class="navbar-item w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>&nbsp; View members</router-link>
    <router-link to="/reports" class="navbar-item w3-bar-item w3-button w3-padding"><i class="fa fa-bullseye fa-fw"></i>&nbsp; View Reports</router-link>
    <router-link to="/survey" class="navbar-item w3-bar-item w3-button w3-padding"><i class="fa fa-diamond fa-fw"></i>&nbsp; View surveys</router-link>
    <!-- <router-link to="/picker" class="navbar-item w3-bar-item w3-button w3-padding"><i class="fa fa-calendar"></i> Calender Picker</router-link> -->
    <router-link to="/events" class="navbar-item w3-bar-item w3-button w3-padding"><i class="fa fa-book"></i> Events Categories</router-link>
    <a href="/users" class="navbar-item w3-bar-item w3-button w3-padding"><i class="fa fa-building"></i>&nbsp; manage users</a>
    <a href="/csv" class="navbar-item w3-bar-item w3-button w3-padding"><i class="fa fa-building"></i>&nbsp; Add members with csv</a>
    <!-- <a href="/home" class="btn btn-primary"><i class="fa fa-book"></i> Upload documents</a> -->
    <!-- <router-link to="/calendar" class="navbar-item w3-bar-item w3-button w3-padding"><i class="fa fa-bank fa-fw"></i>&nbsp; Events</router-link> -->
    <!-- <router-link to="/homepage" class="navbar-item w3-bar-item w3-button w3-padding"><i class="fa fa-history fa-fw"></i>&nbsp; History</router-link>
    <router-link to="/homepage" class="navbar-item w3-bar-item w3-button w3-padding"><i class="fa fa-cog fa-fw"></i>&nbsp; Settings</router-link><br><br> -->
  </div>
</nav>
</template>

<script>
export default {
  props: ['username']
}
</script>