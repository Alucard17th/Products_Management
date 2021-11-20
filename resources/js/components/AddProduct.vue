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
          <span class="text-h5">User Profile</span>
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
                  sm="6"
                >
                  <v-text-field
                    v-model="name"
                    label="Product name*"
                    :rules="rules.name"
                    required
                  ></v-text-field>
                </v-col>
                
                <v-col cols="12" sm="6">
                  <v-text-field
                    v-model="price"
                    label="Price*"
                    :rules="rules.price"
                    required
                  ></v-text-field>
                </v-col>
                <v-col cols="12" sm="6">
                  <v-textarea
                      v-model="description"
                      filled
                      label="Description"
                      :rules="rules.description"
                      auto-grow
                  ></v-textarea>
                </v-col>
                <v-col cols="12" sm="6">
                  <v-file-input
                      v-model="image"
                      label="Product Image"
                      filled
                      prepend-icon="mdi-camera"
                  ></v-file-input>
                </v-col>
                  <v-col cols="6">
                    <v-select
                      v-model="category"
                      :items="categories"
                      item-text="name"
                      item-value="id"
                      label="Category"
                      multiple
                      hint="Pick your favorite category"
                      :rules="rules.category"
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
          <v-btn
            color="blue darken-1"
            text
            @click="addProduct"
          >
            Save
          </v-btn>
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
        dialog: false,
        name:'',
        price:'',
        description:'',
        image:{},
        category:[],
        rules: {
                name: [val => (val || '').length > 0 || 'Name is required'],
                price: [val => (val || '').length > 0 || 'Price is required'],
                description: [val => (val || '').length > 0 || 'Description is required'],
                image: [value => !value || value.size > 0 || 'Avatar size should be less than 2 MB!',],
                category: [val => (val || '').length > 0 || 'Category is required'],
              },
      }
    },
    methods:{
    
       addProduct(){
           console.log(this.name, this.description, this.image, this.price)
           const formData = new FormData();
           formData.append('name', this.name)
           formData.append('price', this.price)
           formData.append('description', this.description)
           formData.append('image', this.image)
           for (var i = 0; i < this.category.length; i++) {
                formData.append('category[]', this.category[i]);
            }
          //  formData.append('category[]', this.category)
          if(this.$refs.form.validate()){
            this.$store.dispatch('addProduct', formData)
                
              .then(() => {
                  this.$store.dispatch("getProducts"),
                  console.log('added product yes')
                  
              }).catch((error) => {
                  //catch the error here
                  console.log('added product NOOO')
              })
          }
        }
    }
  }
</script>