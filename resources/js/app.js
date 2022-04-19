//require('./bootstrap')

import{ createApp} from "vue"
import App from "./App.vue"
import router from './router'
import 'bootstrap'
import 'bootstrap/dist/css/bootstrap.min.css'

//import axios from 'axios';

import { library } from "@fortawesome/fontawesome-svg-core";
import { fas } from "@fortawesome/free-solid-svg-icons";
import { fab } from "@fortawesome/free-brands-svg-icons";
library.add(fas, fab);
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";

const app = createApp(App)
app.use(router)
app.component("font-awesome-icon", FontAwesomeIcon)
app.mount('#app')

//app.prototype.$http = axios;
