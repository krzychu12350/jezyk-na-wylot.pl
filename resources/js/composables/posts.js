import { ref } from 'vue'
import axios from 'axios'
import { useRouter } from 'vue-router'

export default function usePosts() {
    const post = ref([])
    const posts = ref([])

    const errors = ref('')
    const router = useRouter()

    const getPosts = async () => {
        let response = await axios.get('/api/posts', { headers: {"Authorization" : 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBpL2xvZ2luIiwiaWF0IjoxNjUwMjM1MTg2LCJleHAiOjE2NTAyMzg3ODYsIm5iZiI6MTY1MDIzNTE4NiwianRpIjoiTDV0SG05MjZ6emhQdkJOeSIsInN1YiI6IjEiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.Lg1YpUsaxvigIjylNIFCAWIpfRI6612dSSKZ1-Rz39w'} })
        posts.value = response.data.data
    }

    const getPost = async (id) => {
        let response = await axios.get(`/api/posts/${id}`)
        post.value = response.data.data
    }

    const storePost = async (data) => {
        errors.value = ''
        try {
            await axios.post('/api/posts', data)
            await router.push({ name: 'posts.index' })
        } catch (e) {
            if (e.response.status === 422) {
                for (const key in e.response.data.errors) {
                    errors.value += e.response.data.errors[key][0] + ' ';
                }
            }
        }

    }

    const updatePost = async (id) => {
        errors.value = ''
        try {
            await axios.patch(`/api/posts/${id}`, post.value)
            await router.push({ name: 'posts.index' })
        } catch (e) {
            if (e.response.status === 422) {
                for (const key in e.response.data.errors) {
                    errors.value += e.response.data.errors[key][0] + ' ';
                }
            }
        }
    }

    return {
        errors,
        post,
        posts,
        getPost,
        getPosts,
        storePost,
        updatePost
    }
}
