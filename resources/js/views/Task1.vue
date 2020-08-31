<template>
    <div>
        <h3>выбрать книгу из выпадающего списка и увидеть список ее авторов</h3>
        <b-form-select
            v-model="selected"
            :options="books.data"
            value-field="id"
            text-field="name"
        >
            <template v-slot:first>
                <b-form-select-option :value="null" disabled>-- Выберите книгу --</b-form-select-option>
            </template>
        </b-form-select>
        <div class="mt-3" v-if="selected">Выбранная книга: <strong>{{ selected }}</strong></div>
        <div class="mt-3" v-if="selected">Название книги: <strong>{{ currentValue(selected) }}</strong></div>

        <div class="mt-3" v-if="selected"> Авторы :

        <ul>
            <li
                v-for="(author, index) in getAuthors(selected)"
                :key="author.id"
            >{{author.last_name}} {{author.first_name}} {{author.middle_name}}</li>
        </ul>
        </div>
    </div>
</template>

<script>
import {mapGetters} from "vuex";

export default {
    data() {
        return {
            selected: null,
            options: []
        }
    },
    mounted() {
        this.$store.dispatch('fetchBooks')
    },
    methods: {
        getSelected(state,id){
            console.log(this.$store.books)
            return  id

        },
        currentValue(id) {
            return this.books.data.find(option => option.id === id).name
        },
        getAuthors(bookid){
            let authors = this.books.data.find(option => option.id === bookid).authors
            return authors
        }

    },
    computed: {
        ...mapGetters([
            'books'
        ])
    }
}
</script>
