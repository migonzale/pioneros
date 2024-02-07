<template>
    <div class="container mx-auto">
        <div class="flex flex-wrap">
            <div class="max-w-sm rounded overflow-hidden shadow-lg mb-5 bg-white" v-for="project in projects" :key="project.id">
                <img class="w-full" :src="'photos/' + project.cover" :alt="project.name">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2">
                        <router-link :to="{ name: 'project', params: { slug: project.slug } }">
                            {{ project.name }}
                        </router-link>
                    </div>
                    {{ project.description | strippedContent }}
                </div>
                <div class="px-6 py-4">
                    <router-link :to="{ name: 'project', params: { slug: project.slug } }" class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                        Ver más
                    </router-link>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'
    export default {
        data() {
            return {
                projects: []
            }
        },
        mounted() {
            axios
                .get('/api/projects')
                .then(res => {
                    this.projects = res.data
                })
        },
        filters: {
            strippedContent: function(string) {
                return string.replace(/<\/?[^>]+>/ig, " ");
            }
        }
    }
</script>
