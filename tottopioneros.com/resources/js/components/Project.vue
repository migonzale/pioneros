<template>
    <div class="container mx-auto">
        <div class="flex">
            <div class="w-3/4">
                <div class="relative pt-16 pb-32 flex content-center items-center justify-center">
                    <img class="w-full" :src="'/photos/' + project.cover" :alt="project.name">
                </div>
                <div class="container mx-auto">
                    <div class="pr-12">
                        <h1 class="text-white font-semibold text-5xl">{{ project.name }}</h1>
                        <p class="mt-4 text-lg text-gray-300">Grupo: {{ project.group }}</p>
                        <p class="mt-4 text-lg text-gray-300">Referencia: {{ project.reference }}</p>
                    </div>
                    <div class="flex flex-wrap">
                        <button @click="vote" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
                            Votar
                        </button>
                        <article class="px-6 py-6" v-html="project.description"></article>
                    </div>
                </div>
            </div>
            <div class="w-1/4">
                text
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'

    export default {
        name: "Project",
        data() {
          return {
              voted: false,
              project: null
          }
        },
        created() {
            let slug = this.$route.params.slug;

            axios.get(`/api/projects/${slug}`).then(res => {
                this.project = res.data;
                console.log(res.data.group);
            });
        },
        methods: {
            vote() {
                axios.post(`/api/projects/vote`, {
                    voter: '1',
                    project: this.project.uuid
                }).then(res => {
                    console.log(res.data);
                });
            }
        }
    }
</script>
