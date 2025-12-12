<template>
  <div class="product-image">
    <img src="/src/assets/18 1.png" alt="Mango" class="main-image" />

    <div class="thumbnail-row">
      <img src="/src/assets/3 389454.png" alt="thumb" class="active" />
      <img src="/src/assets/dryer.png" alt="thumb" />
      <img src="/src/assets/strawberry.png" alt="thumb" />
      <img src="/src/assets/7 1.png" alt="thumb" />
    </div>
  </div>
</template>

<script setup lang="ts"></script>

<style scoped>
.product-image {
  text-align: center;
}

.main-image {
  width: 100%;
  max-width: 420px;
  border-radius: 10px;
  margin-bottom: 20px;
  object-fit: contain;
}

.thumbnail-row {
  display: flex;
  justify-content: center;
  gap: 10px;
}

.thumbnail-row img {
  width: 70px;
  height: 70px;
  border-radius: 8px;
  cursor: pointer;
  border: 2px solid transparent;
  object-fit: cover;
}

.thumbnail-row img.active {
  border-color: #009a49;
}
</style>
