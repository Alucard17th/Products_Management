<template>
    <div>
        <div class="d-flex">
            <h1>Products</h1>
            <add-prod :categories="allCategories"></add-prod>
        </div>
        <v-data-table :headers="headers" :items="allProducts" :items-per-page="5" class="elevation-1">
            <template v-slot:[`item.price`]="{ item }">
                <v-chip dark>
                    {{ item.price }}
                </v-chip>
            </template>
            <template v-slot:[`item.image`]="{ item }">
                <v-chip dark>
                    {{ item.image }}
                </v-chip>
            </template>
            <template v-slot:[`item.category`]="{ item }">
                <v-list-item  v-for="cat in item.category" :key="cat">
                    <v-chip dark>{{cat.name}}</v-chip>
                </v-list-item>
            </template>
        </v-data-table>
    </div>
</template>

<script>
export default {
    components: {
    },
    data() {
        return {
                name:'',
                headers: [
                {text: 'Dessert (100g serving)', align: 'start', value: 'name', },
                { text: 'Price', value: 'price' },
                { text: 'Description', value: 'description' },
                { text: 'Avatar', value: 'image' },
                { text: 'Created At', value: 'created_at' },
                { text: 'Category', value: 'category' },
            ],
        }
    },
    computed:{
        allProducts(){
                return this.$store.getters.allProducts;
        },
        allCategories(){
                return this.$store.getters.allCategories;
        }
    },
    mounted() {
        this.$store.dispatch("getProducts");
        this.$store.dispatch("getCategories");
    },
}
</script>
