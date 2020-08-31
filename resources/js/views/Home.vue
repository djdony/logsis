<template>
    <div>
        <h4 class="text-center font-weight-bold">Posts</h4>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Content</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="book in books.data">
                <td>{{book.name}}</td>
                <td>{{book.price}}</td>
                <td>
                </td>
            </tr>
            </tbody>
        </table>
    </div>

</template>

<script>
import {mapGetters} from 'vuex'

export default {
    name: "Books",
    mounted() {
        this.$store.dispatch('fetchBooks')
    },
    methods: {

    },
    computed: {
        ...mapGetters([
            'books'
        ])
    }
}
</script>

<style scoped>

</style>
