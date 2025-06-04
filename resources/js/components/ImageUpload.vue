<template>
  <div class="image-upload">
    <div class="upload-area" @click="triggerFileInput" @dragover.prevent @drop.prevent="handleDrop">
      <input 
        type="file" 
        ref="fileInput" 
        @change="handleFileSelect" 
        accept="image/*" 
        style="display: none"
      >
      
      <div v-if="!previewUrl" class="upload-placeholder">
        <svg class="upload-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
        </svg>
        <p>Нажмите или перетащите изображение</p>
      </div>
      
      <div v-else class="preview-container">
        <img :src="previewUrl" alt="Preview" class="preview-image">
        <button @click.stop="removeImage" class="remove-button">×</button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'ImageUpload',
  props: {
    value: String,
    name: String
  },
  data() {
    return {
      previewUrl: this.value || null
    }
  },
  methods: {
    triggerFileInput() {
      this.$refs.fileInput.click();
    },
    
    handleFileSelect(event) {
      const file = event.target.files[0];
      this.processFile(file);
    },
    
    handleDrop(event) {
      const file = event.dataTransfer.files[0];
      this.processFile(file);
    },
    
    processFile(file) {
      if (file && file.type.startsWith('image/')) {
        const reader = new FileReader();
        reader.onload = (e) => {
          this.previewUrl = e.target.result;
          this.$emit('input', file);
        };
        reader.readAsDataURL(file);
      }
    },
    
    removeImage() {
      this.previewUrl = null;
      this.$refs.fileInput.value = '';
      this.$emit('input', null);
    }
  }
}
</script>

<style scoped>
.upload-area {
  border: 2px dashed #d1d5db;
  border-radius: 0.5rem;
  padding: 2rem;
  text-align: center;
  cursor: pointer;
  transition: border-color 0.3s;
  min-height: 200px;
  display: flex;
  align-items: center;
  justify-content: center;
}

.upload-area:hover {
  border-color: #B57219;
}

.upload-placeholder {
  color: #6b7280;
}

.upload-icon {
  width: 3rem;
  height: 3rem;
  margin: 0 auto 1rem;
}

.preview-container {
  position: relative;
  max-width: 100%;
}

.preview-image {
  max-width: 100%;
  max-height: 300px;
  border-radius: 0.375rem;
}

.remove-button {
  position: absolute;
  top: -10px;
  right: -10px;
  background: #dc2626;
  color: white;
  border: none;
  border-radius: 50%;
  width: 30px;
  height: 30px;
  cursor: pointer;
  font-size: 1.2rem;
  line-height: 1;
}
</style>
