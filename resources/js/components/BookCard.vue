<template>
  <div class="book-card">
    <div class="book-cover-container">
      <img :src="book.cover_image || '/images/no-cover.jpg'" :alt="book.title" class="book-cover">
      <div class="book-overlay">
        <button @click="addToLibrary" class="btn btn-primary btn-sm">
          Добавить в библиотеку
        </button>
      </div>
    </div>
    <div class="book-info">
      <h3 class="book-title">{{ book.title }}</h3>
      <p class="book-author">{{ book.author.name }}</p>
      <div class="book-rating">
        <rating-stars :rating="book.average_rating" :readonly="true"></rating-stars>
        <span class="rating-text">({{ book.reviews_count }})</span>
      </div>
      <p class="book-description">{{ truncatedDescription }}</p>
    </div>
  </div>
</template>

<script>
export default {
  name: 'BookCard',
  props: {
    book: {
      type: Object,
      required: true
    }
  },
  computed: {
    truncatedDescription() {
      if (!this.book.description) return '';
      return this.book.description.length > 100 
        ? this.book.description.substring(0, 100) + '...'
        : this.book.description;
    }
  },
  methods: {
    addToLibrary() {
      this.$emit('add-to-library', this.book.id);
    }
  }
}
</script>
