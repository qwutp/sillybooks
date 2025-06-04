<template>
  <div class="author-card">
    <div class="author-photo-container">
      <img :src="author.photo || '/images/no-photo.jpg'" :alt="author.name" class="author-photo">
    </div>
    <div class="author-info">
      <h3 class="author-name">{{ author.name }}</h3>
      <p class="author-books-count">{{ author.books_count }} книг</p>
      <p class="author-bio" v-if="author.biography">{{ truncatedBio }}</p>
    </div>
  </div>
</template>

<script>
export default {
  name: 'AuthorCard',
  props: {
    author: {
      type: Object,
      required: true
    }
  },
  computed: {
    truncatedBio() {
      if (!this.author.biography) return '';
      return this.author.biography.length > 150 
        ? this.author.biography.substring(0, 150) + '...'
        : this.author.biography;
    }
  }
}
</script>
