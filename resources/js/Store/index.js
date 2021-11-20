import Vuex from 'vuex'
import Vue from 'vue'
import axios from 'axios'
import Search from './filter'

Vue.use(Vuex)

// import { SET_NOTE } from '@/store/mutation-types';
// une action est fonction qui permet de déclencher une mutation
const actions = {
  getProducts({ commit }) {
    axios.get('/productslist')
        .then(response => {
            commit('SET_PRODUCTS', response.data)
       })
  },
  getCategories({ commit }) {
    axios.get('/categorieslist')
        .then(response => {
            commit('SET_CATEGORIES', response.data)
       })
  },
  setCurrentProject ({commit, state}, projectId){
    let projectFound = {}
    state.projects.forEach((project)=>{
        if (projectId == project.id){
          projectFound = project
        }
    });
    commit('setCurrentProject', projectFound)
  },
  addProduct: (store, data) => {
    return axios.post('/addproduct', data ,  {'content-type': 'multipart/form-data'})
  },
  addCategory: (store, data) => {
    return axios.post('/addcategory', data ,  {'content-type': 'multipart/form-data'})
  },
  
}

const mutations = {
  SET_PRODUCTS (state, products) {
    state.products = products
  },
  SET_CATEGORIES(state, categories) {
    state.categories = categories
  }

}

const getters = {
  allProducts: state => state.products,
  allCategories: state => state.categories,
  getCurrentProject(state, getters,rootState) {

    if (rootState.search.listSearch.length === "") {
      return state.currentProject;
    }else if (rootState.search.listSearch.length) {
        return state.currentFilteredProject;
    }else{
    return state.currentProject;
    }
    
  },
 
}

// Create a new store instance.
const store = new Vuex.Store({
  state: {
    currentProject: {},
    currentFilteredProject:{},
    products:[],
    categories:[]
  },
  getters: getters,
  mutations: mutations,
  actions: actions,
  modules:{
    search: Search,
  }
})

global.store = store
export default store;