import Vue from "vue";
import Vuex from "vuex";
Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        books: [],
        authors: [],
        noauthors: [],

    },
    getters: {
        books: state => {
            return state.books
        },
        authors: state => {
            return state.authors
        },
        noauthors: state => {
            return state.noauthors
        }
    },
    mutations: {
        fetchBooks(state, books) {
            return state.books = books
        },
        fetchAuthors(state, authors) {
            return state.authors = authors
        },
        fetchNoAuthors(state, noauthors) {
            return state.noauthors = noauthors
        },
    },
    actions: {
        fetchBooks({commit}) {
            axios.get('/api/books')
                .then(res => {
                    commit('fetchBooks', res.data)
                }).catch(err => {
                console.log(err)
            })
        },
        fetchAuthors({commit}) {
            axios.get('/api/authors')
                .then(res => {
                    commit('fetchAuthors', res.data)
                }).catch(err => {
                console.log(err)
            })
        },
        fetchNoAuthors({commit}) {
            axios.get('/api/noauthors')
                .then(res => {
                    commit('fetchNoAuthors', res.data)
                }).catch(err => {
                console.log(err)
            })
        },
    },
    modules: {}
})
