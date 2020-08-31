<template>
    <div>
        <h3>выбрать автора из выпадающего списка и увидеть суммарную стоимость всех книг этого автора</h3>
        <b-form-select
            v-model="selected"
            :options="authors.data"
            value-field="id"
            text-field="full_name"
        >
            <template v-slot:first>
                <b-form-select-option :value="null" disabled>-- Выберите автора --</b-form-select-option>
            </template>
        </b-form-select>
        <div class="mt-3" v-if="selected">Выбранный автор: <strong>{{ selected }}</strong></div>
        <div class="mt-3" v-if="selected">Автор: <strong>{{ currentValue(selected) }}</strong></div>

        <div class="mt-3" v-if="selected"> Книги :

            <b-table
                striped
                hover
                :items="getBooks(selected)"
                :fields="['id' , 'name', 'price']"
            >
                <template slot="bottom-row" slot-scope="data">
                    <td>Total :</td>
                    <td></td>
                    <td>{{getTotal(books)}}</td>
                </template>
            </b-table>


        </div>
    </div>
</template>

<script>
import {mapGetters} from "vuex";

export default {
    data() {
        return {
            selected: null,
            options: [],
            books: []
        }
    },
    mounted() {
        this.$store.dispatch('fetchAuthors')
    },
    methods: {
        getSelected(state,id){
            return  id

        },
        currentValue(id) {
            return this.authors.data.find(option => option.id === id).full_name
        },
        getTotal(arr){
            let total = arr.reduce((accum,item) => accum + parseFloat(item.price), 0)
            return total
        },
        getBooks(authorid){
            this.books = this.authors.data.find(option => option.id === authorid).books

            return this.books
        }

    },
    computed: {
        ...mapGetters([
            'authors'
        ])
    }
}
</script>
