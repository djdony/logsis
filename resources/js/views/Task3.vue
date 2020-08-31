<template>
    <div>
        <h3>увидеть список всех книг, для которых не указаны авторы</h3>

        <div class="mt-3"> Книги где нет авторов :
        </div>
        <b-table
            striped
            hover
            :items="noauthors.data"
            :fields="['id' , 'name']"
        >
        </b-table>
    </div>
</template>

<script>
import {mapGetters} from "vuex";

export default {
    created() {
        this.$store.dispatch('fetchNoAuthors')
    },

    computed: {
        ...mapGetters([
            'noauthors'
        ])
    }
}
</script>
