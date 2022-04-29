import { createRouter, createWebHistory } from "vue-router";
import Inicio from '../views/Inicio.vue';
import BuscarTrabajador from '../views/BuscarTrabajador.vue';
import Login from '../views/Login.vue';
import Register from '../views/Register.vue';
import DefaultLayout from '../components/DefaultLayout.vue';
import AuthLayout from '../components/AuthLayout.vue';
import store from "../store";
import BuscarEstudiante from '../views/BucarEstudiante.vue';
import EstudianteView from '../views/EstudianteView.vue';
import TrabajadorView from '../views/TrabajadorView.vue';

const routes = [{
        path: '/',
        redirect: '/inicio',
        component: DefaultLayout,
        meta: { requiresAuth: true },
        children: [
            { path: '/inicio', name: 'Inicio', component: Inicio },
            { path: '/buscarEstudiante', name: 'BuscarEstudiante', component: BuscarEstudiante },
            { path: '/buscarTrabajador', name: 'BuscarTrabajador', component: BuscarTrabajador },
            { path: '/buscarEstudiante/estudiante', name: 'Estudiante', component: EstudianteView },
            { path: '/buscarTrabajador/trabajador', name: 'Trabajador', component: TrabajadorView },

        ]
    },
    {
        path: '/auth',
        redirect: '/login',
        name: 'Auth',
        component: AuthLayout,
        meta: { isGuest: true },
        children: [
            { path: '/login', name: 'Login', component: Login },
            { path: '/register', name: 'Register', component: Register, meta: { requiresAuth: false } },
        ]
    },

];

const router = createRouter({
    history: createWebHistory(),
    routes
});

router.beforeEach((to, from, next) => {
    if (to.meta.requiresAuth && !store.state.user.token) {
        next({ name: 'Login' });
        // next({ name: 'Register' });
    } else if (store.state.user.token && (to.meta.isGuest)) {
        next({ name: 'Inicio' });
    } else {
        next();
    }
})

export default router;