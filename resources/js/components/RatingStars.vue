<template>
  <div class="rating-stars">
    <span 
      v-for="star in 5" 
      :key="star"
      @click="!readonly && setRating(star)"
      :class="['star', { 'filled': star <= rating, 'interactive': !readonly }]"
    >
      ★
    </span>
  </div>
</template>

<script>
export default {
  name: 'RatingStars',
  props: {
    rating: {
      type: Number,
      default: 0
    },
    readonly: {
      type: Boolean,
      default: false
    }
  },
  methods: {
    setRating(rating) {
      this.$emit('rating-changed', rating);
    }
  }
}
</script>

<style scoped>
.rating-stars {
  display: flex;
  gap: 2px;
}

.star {
  font-size: 1.2rem;
  color: #d1d5db;
  transition: color 0.2s;
}

.star.filled {
  color: #fbbf24;
}

.star.interactive {
  cursor: pointer;
}

.star.interactive:hover {
  color: #f59e0b;
}
</style>
