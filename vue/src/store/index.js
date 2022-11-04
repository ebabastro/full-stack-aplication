import { createStore } from "vuex";
import axiosClient from "../axios";

const store = createStore({
    state: {
        user: {
            data: {},
            token: sessionStorage.getItem("TOKEN"),
        },
        estudiante: [],
        trabajador: [],
    },
    getters: {},
    actions: {
        register({ commit }, user) {
            return axiosClient.post('/register', user)
                .then(({ data }) => {
                    commit('setUser', data);
                    return data;
                })
        },
        login({ commit }, user) {
            return axiosClient.post('/login', user)
                .then(({ data }) => {
                    commit('setUser', data);
                    return data;
                })
        },
        getEstudiante({ commit }, ci) {
            return axiosClient.post('/getEstudiante', ci, this.state.user.data.area)
                .then(({ data }) => {
                    commit('setEstudiante', data);
                    return data;
                })
        },
        getTrabajador({ commit }, ci) {
            return axiosClient.post('/getTrabajador', ci)
                .then(({ data }) => {
                    commit('setTrabajador', data);
                    return data;
                })
        },
        logout({ commit }) {
            return axiosClient.post('/logout')
                .then(response => {
                    commit('logout')
                    return response;
                })
        },
        createUserEstudiante({ commit }, user) {
            user.ci = this.state.estudiante.ci;
            return axiosClient.post('/createUser', user)
                .then(response => {
                    return response;
                })
        },
        createUserTrabajador({ commit }, user) {
            user.ci = this.state.trabajador.ci;
            return axiosClient.post('/createUser', user)
                .then(response => {
                    return response;
                })
        },
        getAreas({ commit }) {
            return axiosClient.get('/getAreas')
                .then(({ data }) => {
                    commit('setAreas', data)
                    return data;
                })
        }

    },
    mutations: {
        logout: (state) => {
            state.user.data = {};
            state.user.token = null;
        },
        setUser: (state, userData) => {
            state.user.token = userData.token;
            state.user.data = userData.user;
            sessionStorage.setItem("TOKEN", userData.token);
        },
        setEstudiante: (state, estudianteData) => {
            state.estudiante = estudianteData.estudiante;
        },
        setTrabajador: (state, trabajadorData) => {
            state.trabajador = trabajadorData;
        },
        setAreas: (state, areasData) => {
            state.areas = areasData;
        }
    },
    modules: {},
})

export default store;