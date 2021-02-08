<template>



  <!-- BEGIN | Header -->
  <header class="ht-header full-width-hd sticky">

    <div class="row">
     <app-main-nav />
      
    </div>
	<div class="row">
		<!-- top search form -->
      <div class="top-search w-full">
        <select>
          <option value="united">TV show</option>
          <option value="saab">Others</option>
        </select>
        <input
          type="text" v-model="query" @keyup.enter.prevent="search"
          placeholder="Search for a movie, TV Show or celebrity that you are looking for"
        />
      </div>
	</div>
  </header>
  <!-- END | Header -->


</template>

<script>

import JetNavLink from '@/Jetstream/NavLink'
import JetDialogModal from '@/Jetstream/DialogModal'
import JetDropdownLink from '@/Jetstream/DropdownLink'
import AppLogin from '@/Pages/Auth/Login'
import AppRegister from '@/Pages/Auth/Register'
import AppMainNav from './AppMainNav'

export default {
	 components: {     
			JetNavLink,
			JetDialogModal,
			JetDropdownLink,
			AppLogin,
			AppRegister,
			AppMainNav
		},
		data() {
			return {
				loginModal: false,
				registerModal: false,
				query: '',
			}
		},
		methods: {

			search(){
				this.$inertia.get('/search', { query: this.query });
			}
        }

};
</script>

<style>
</style>