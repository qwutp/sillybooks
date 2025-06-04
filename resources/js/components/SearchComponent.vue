<template>
  <div class="search-container">
    <svg class="search-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
    </svg>
    <input 
      type="text" 
      v-model="searchQuery" 
      @input="onSearch"
      class="search-input" 
      placeholder="Поиск книг, авторов..."
    >
  </div>
</template>

<script>
export default {
  name: 'SearchComponent',
  data() {
    return {
      searchQuery: '',
      searchTimeout: null
    }
  },
  methods: {
    onSearch() {
      clearTimeout(this.searchTimeout);
      this.searchTimeout = setTimeout(() => {
        this.$emit('search', this.searchQuery);
      }, 300);
    }
  }
}
</script>
