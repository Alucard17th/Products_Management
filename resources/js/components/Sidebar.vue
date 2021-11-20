<template>
  <div>

    <v-list-item class="px-2">
          <h4>User Name</h4>
    </v-list-item>

       <v-list flat>
          <v-subheader>REPORTS</v-subheader>
          <v-list-item-group
            v-model="selectedItem"
            color="primary"
          >
            <v-list-item
              v-for="(item, i) in tabs"
              :key="i"
            >
              <v-list-item-icon>
                <v-icon>{{item.icon}}</v-icon>
              </v-list-item-icon>
              <v-list-item-content>
                <v-list-item-title >
                  <router-link :to="{name : item.name}" >
                    <h4>{{item.text}}</h4>
                  </router-link>
                </v-list-item-title>
              </v-list-item-content>
              
            </v-list-item>
          </v-list-item-group>
        </v-list>
  </div>
</template>
<script>
  export default {
    data: () => ({
      drawer: false,
      group: null,
      selectedItem: 1,
      tabs : [
            {id: '1', name: 'products', route: '/products/', text: 'Products', icon: 'mdi-shape' },
            {id: '2', name: 'categories', route: '/categories/', text: 'Categories', icon: 'mdi-shape-outline'},
      ]
    }),
    methods: {
    test() {console.log('TEST', this.active)},
    onClick(item) {
      console.log(item);
      },
    },
    watch: {
      group () {
        this.drawer = false
      },
    },
  }
</script>