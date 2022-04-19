<template>
    <NavbarComponent></NavbarComponent>
    <h1 class="text-center">Głowa - posty</h1>
    <!--
    <div class="container">
        <div class="row">
            <div class="col-xl-6">

                <div class="card text-center">
                        <div class="card-header">Featured</div>
                        <div class="card-body">
                            <h5 class="card-title">NASA Launched Solar Probe</h5>
                            <p class="card-text">NASA launched Parker space probe in 2018 with the mission of making observations of the outer corona of the Sun. It is the first-ever mission to "touch" the Sun.</p>
                            <a href="#" class="btn btn-primary">Know more</a>
                        </div>
                        <div class="card-footer text-muted">3 years ago</div>
                    </div>
            </div>
        </div>
    </div>
    -->
    <ul id="posts">
        <li v-for="post in posts" v-bind:key="post.id" id="post.id">
            {{ post.category }}
            {{ post.title }}
            {{ post.contents }}
        </li>
    </ul>

</template>

<script>
import NavbarComponent from "../components/NavbarComponent";
import usePosts from "../composables/posts";
import {onMounted} from "vue";

export default {
    name: "Head",
    components: {
        NavbarComponent,
    },
    data() {
        return {
            posts: [
                //{id: 1, category: "Head", title: 'Title-1', contents: "Loreum Ipsum"},
                //{id: 2, category: "Head", title: 'Title-2', contents: "Loreum Ipsum2222"},
            ]
        }
    },
    /*
    setup() {
        const {posts, getPosts} = usePosts()

        onMounted(getPosts)

        return {
            posts,
        }
    },
   */
    mounted() {
      //const headers = { "Authorization": "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBpL2xvZ2luIiwiaWF0IjoxNjUwMjM1MTg2LCJleHAiOjE2NTAyMzg3ODYsIm5iZiI6MTY1MDIzNTE4NiwianRpIjoiTDV0SG05MjZ6emhQdkJOeSIsInN1YiI6IjEiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.Lg1YpUsaxvigIjylNIFCAWIpfRI6612dSSKZ1-Rz39w" };
      fetch('api/posts/motywacja')
          .then(res => res.json())
          .then(data => this.posts = data)
          .catch(err => console.log(err.message))
    }
    /*
   methods: {
     getPost(){
         axios.get('/api/posts')
             .then((response)=>{
                 this.posts = response.data.posts
             })
     }
   },
   created() {
     this.getPost()
   },
   */
}
</script>

<style scoped>

</style>
