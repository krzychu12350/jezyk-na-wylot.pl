<template>

    <div class="text-center">
        <router-link class="nav-link" :to="{ name: 'Home'}">
            <img id="logo" :src="'../storage/images/logo.png'" v-bind:alt="logo">
        </router-link>
    </div>
    <div class="text-center">
        <ul class="nav">
            <li><router-link :to="{ name: 'Home'}">Strona główna</router-link></li>
            <li><router-link :to="{ name: 'GoWith'}">Lecimy z...</router-link></li>
            <li><router-link :to="{ name: 'Head'}">Głowa</router-link></li>
            <li><router-link :to="{ name: 'Courses'}">Kursy</router-link></li>
            <li><router-link :to="{ name: 'ForFree'}">Za darmo</router-link></li>
            <li><router-link :to="{ name: 'ForFree'}">Za darmo</router-link></li>
            <li><router-link :to="{ name: 'AboutMy'}">O mnie</router-link></li>
            <li> <router-link :to="{ name: 'Contact'}">Kontakt</router-link></li>
        </ul>
    </div>
</template>

<script>
export default {
    name: "NavbarComponent"
}
</script>

<style scoped>
#logo {
    width: 5em;
    height: 5em;
}
.social-icon {
     color: #65c0e6;
     width: 2em;
     height: 2em;
     margin: 0 0.25em 0 0.25em;
}
.nav {
    list-style: none;
    display: flex;
    flex-direction: row;
    justify-content: center;
}
.nav > li > a{
    font-size: 10px;
    padding: 0px;
    margin-right: 5px;
}
</style>
