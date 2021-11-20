<template>
    <v-dialog
      v-model="dialog"
      persistent
      max-width="600px"
    >
      <template v-slot:activator="{ on, attrs }">
          <v-btn class="mx-2" fab dark small color="pink" v-bind="attrs" v-on="on">
            <v-icon dark>mdi-plus</v-icon>
        </v-btn>
      </template>
      <v-card dense>
        <v-card-title>
          <span class="text-h5">New Category</span>
        </v-card-title>
        <v-card-text>
          <v-form
            ref="form"
            @submit.prevent="submit"
          >
            <v-container>
              <v-row>
                <v-col
                  cols="12"
                >
                  <v-text-field
                    v-model="name"
                    label="Category name*"
                    :rules="rules.name"
                    required
                  ></v-text-field>
                </v-col>
                
                <v-col cols="12">
                  <v-select
                      v-model="parent"
                      :items="categories"
                      item-text="name"
                      item-value="id"
                      label="Parent Category"
                      hint="Parent Category"
                      persistent-hint
                    ></v-select>
                </v-col>
              
              </v-row>
            </v-container>
          </v-form>

          <small>*indicates required field</small>
        </v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn
            color="blue darken-1"
            text
            @click="dialog = false"
          >
            Close
          </v-btn>
          <!-- <v-btn
            color="blue darken-1"
            text
            @click="addCategory"
          >
            Save
          </v-btn> -->
            <v-btn @click="addCategory" :class="{ red: !valid, green: valid }">submit</v-btn>
        </v-card-actions>
      </v-card>
      
    </v-dialog>
</template>

<script>
  export default {
    components: {
        
    },
    props:['categories'],
    data() { 
      return {
        valid: false,
        dialog: false,
        name:'',
        price:'',
        description:'',
        image:{},
        parent:[],
        rules: {
                name: [val => (val || '').length > 0 || 'This field is required'],
                parent: [val => (val || '').length > 0 || 'This field is required']
              },
      }
    },
    methods:{
      submit () {
        this.$refs.form.validate()
        if(this.$refs.form.validate()){
            console.log("VALIDEE")
        }else{
            console.log("NON VALID2E")
        }
        
      },
    
       addCategory(){
          const formData = new FormData();
          formData.append('name', this.name)
          formData.append('parent', this.parent)

          if(this.$refs.form.validate()){

              this.$store.dispatch('addCategory', formData)
              .then(() => {
                  this.$store.dispatch("getCategories"),
                  console.log('added product yes')
              }).catch((error) => {
                  //catch the error here
                  console.log('added product NOOO')
              })
              
          }else{
              
          }

          
        }
    }
  }
</script>