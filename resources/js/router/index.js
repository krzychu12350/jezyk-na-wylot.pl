import { createWebHistory, createRouter } from "vue-router";

import Home from "../views/Home.vue";
import HowToStart from "../views/HowToStart";
import GoWith from "../views/GoWith";
import Head from "../views/Head";
import Courses from "../views/Courses";
import ForFree from "../views/ForFree";
import AboutMy from "../views/AboutMy";
import Contact from "../views/Contact";


const routes = [
    {
        path: "/",
        name: "Home",
        component: Home,
    },

    {
        path: "/jak-zaczac",
        name: "HowToStart",
        component: HowToStart,
    },
    {
        path: "/lecimy-z",
        name: "GoWith",
        component: GoWith,
    },
    {
        path: "/glowa",
        name: "Head",
        component: Head,
    },
    {
        path: "/kursy",
        name: "Courses",
        component: Courses,
    },
    {
        path: "/za-darmo",
        name: "ForFree",
        component: ForFree,
    },
    {
        path: "/o-mnie",
        name: "AboutMy",
        component: AboutMy,
    },
    {
        path: "/kontakt",
        name: "Contact",
        component: Contact,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
