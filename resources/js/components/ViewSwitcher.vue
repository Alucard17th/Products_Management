<template>
<div>
    <v-tabs v-model="activeTab">
        <v-tab v-for="tab in tabs" :key="tab.id" :to="tab.route">{{ tab.name }}</v-tab>
        <v-tabs-items v-model="activeTab" >
            <v-tab-item v-for="tab in tabs" :key="tab.id" :to="{name : 'tab.route'}">
            </v-tab-item>
        </v-tabs-items>
    </v-tabs>
</div>  
</template>

<script>
    export default {
    props: ['id'],
    data () {
        return {activeTab: '',
        tabs : [
            {id: '1', name: 'products', route: '/products/'},
            {id: '2', name: 'categories', route: '/categories/'},
        ]
    }},
    created(){
            console.log(this.$route.params.id)
    },
    methods: {
        updateRouter(val){
            this.$router.push(val)
            // this.$router.push({ path: '/kanban/', props: { id: '123' }})
            // this.$router.push({ name: 'kanban', params: { id: '123' } })
            // router.push({ name: 'kanban', params: { userId: '123' } })
        }
    }
}
</script>