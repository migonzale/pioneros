<template>
    <div>
        <div class="app">
            <nav class="flex items-center justify-between flex-wrap bg-black p-6">
                <div class="flex items-center flex-shrink-0 text-white mr-6">
                    <img width="265" height="51" src="http://tottopioneros.com/img/logo_totto.svg" alt="TOTTO">
                </div>
                <div class="w-full text-right block flex-grow lg:flex lg:items-center lg:w-auto">
                    <div class="text-sm lg:flex-grow">
                        <router-link class="block mt-4 lg:inline-block lg:mt-0 text-white hover:text-white mr-4" :to="{ name: 'home' }">Home</router-link>
                        <router-link class="block mt-4 lg:inline-block lg:mt-0 text-white hover:text-white mr-4" :to="{ name: 'ideas' }">Ideas que inspiran</router-link>
                        <router-link class="block mt-4 lg:inline-block lg:mt-0 text-white hover:text-white mr-4" :to="{ name: 'cronograma' }">¿Cómo lo viviremos?</router-link>
                    </div>
                </div>
            </nav>
            <transition name="fade" mode="out-in">
                <router-view></router-view>
            </transition>
            <vue-progress-bar></vue-progress-bar>
        </div>
    </div>
</template>
<script>
    export default {
        mounted () {
            //  [App.vue specific] When App.vue is finish loading finish the progress bar
            this.$Progress.finish()
        },
        created () {
            //  [App.vue specific] When App.vue is first loaded start the progress bar
            this.$Progress.start()
            //  hook the progress bar to start before we move router-view
            this.$router.beforeEach((to, from, next) => {
                //  does the page we want to go to have a meta.progress object
                if (to.meta.progress !== undefined) {
                    let meta = to.meta.progress
                    // parse meta tags
                    this.$Progress.parseMeta(meta)
                }
                //  start the progress bar
                this.$Progress.start()
                //  continue to next page
                next()
            })
            //  hook the progress bar to finish after we've finished moving router-view
            this.$router.afterEach((to, from) => {
                //  finish the progress bar
                this.$Progress.finish()
            })
        }
    }
</script>
<style scoped>
    .fade-enter-active,
    .fade-leave-active {
        transition-duration: 0.2s;
        transition-property: opacity;
        transition-timing-function: ease;
    }

    .fade-enter,
    .fade-leave-active {
        opacity: 0
    }
</style>
