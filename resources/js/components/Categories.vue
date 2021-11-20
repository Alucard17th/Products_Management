<template>
    <div>
        <div class="d-flex">
            <h1>Categories</h1>
            <add-cat :categories="allCategories"></add-cat>
        </div>
        
        <v-data-table :headers="headers" :items="allCategories" :items-per-page="-1" 
        group-by="parent_name" class="elevation-1">
        
            <template v-slot:[`item.category_id`]="{ item }">
                <v-chip dark>
                    {{ item.category_id }}
                </v-chip>
            </template>

            <template v-slot:group.header="{ group, headers, toggle, isOpen, remove }" >
                <td :colspan="headers.length" :value="false">
                    <v-btn @click="toggle" small icon :ref="group" :value="false">
                        <v-icon v-if="isOpen">mdi-chevron-up</v-icon>
                        <v-icon v-else>mdi-chevron-down</v-icon>
                    </v-btn>
                    {{ group }}
                    <v-btn @click="remove" small icon :ref="group">
                        <v-icon >mdi-close</v-icon>
                    </v-btn>
                </td>
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
                { text: 'Category ID', value: 'id' },
                {
                    text: 'Name',
                    align: 'start',
                    value: 'name',
                },
                { text: 'Parent Category', value: 'category_id' },
                { text: 'Created At', value: 'created_at' },
            ],
        }
    },
    computed:{
        allCategories(){
                return this.$store.getters.allCategories;
        }
    },
    mounted() {
        this.$store.dispatch("getCategories");
    },
    methods:{
        
    }
      
}
</script>



