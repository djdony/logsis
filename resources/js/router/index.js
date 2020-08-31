import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from "../views/Home";
import Task1 from "../views/Task1";
import Task2 from "../views/Task2";
import Task3 from "../views/Task3";



Vue.use(VueRouter)
const routes = [
    {
        path: '/',
        name: 'Home',
        component: Home,
    },
    {
        path: '/task1',
        name: 'Task1',
        component: Task1,
    },
    {
        path: '/task2',
        name: 'Task2',
        component: Task2,
    },
    {
        path: '/task3',
        name: 'Task3',
        component: Task3,
    },

]
const router = new VueRouter({
    routes
})


export default router
