<template>
    <!-- <v-app id="inspire" app dark>
        <v-container class="my-auto">
            <Nav />
            <v-main>
                <v-row>
                    <v-col>
                        <slot></slot>
                    </v-col>
                </v-row>
            </v-main>
        </v-container>
    </v-app> -->
    <v-app>
        <v-navigation-drawer 
         app absolute v-model="drawer" left :mini-variant.sync="mini">
         <v-btn
          icon
          @click.stop="mini = !mini"
        >
            <v-icon v-if="mini">
            mdi-chevron-left
            </v-icon>
            <v-icon v-else>
            mdi-chevron-right
            </v-icon>
        </v-btn>
            <!-- -->
            <Side />
        </v-navigation-drawer>

        <v-app-bar app>
            <!-- -->
            <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
            <h1>Laravel</h1>
        </v-app-bar>

        <!-- Sizes your content based upon application components -->
        <v-main>

            <!-- Provides the application the proper gutter -->
            <v-container fluid class="full-cont">
                <slot></slot>
            <!-- If using vue-router -->
            <router-view></router-view>

            </v-container>
        </v-main>

        <v-footer app>
            <!-- -->
        </v-footer>
    </v-app>
</template>

<script>
    // import Nav from '../components/Nav'
    import Side from '../components/Sidebar'

    export default {
        components: {Side},
        data() {
            return{
                mini:true,
                drawer:true
            }
        }
    }
</script>

<style>
  
    
</style>