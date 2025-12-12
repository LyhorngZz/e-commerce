<template>
  <section class="showcase">
    <div class="showcase-content">
      <h1>Don’t miss amazing grocery deals</h1>
      <p>Sign up for the daily newsletter</p>

      <form class="subscribe" @submit.prevent="handleSubscribe">
        <div class="input-group">
          <img src="/src/assets/plan.png" alt="subscribe" />
          <input
            type="email"
            v-model="email"
            placeholder="Your email address"
            required
          />
        </div>
        <button type="submit">Subscribe</button>
      </form>
    </div>

    <div class="image-area">
      <img src="/src/assets/fresh-apples.png" alt="Fresh apples" />
    </div>
  </section>
</template>

<script lang="ts" setup>
import { ref } from 'vue'

const email = ref('')

function handleSubscribe() {
  if (email.value) {
    alert(`Subscribed with: ${email.value}`)
    email.value = ''
  }
}
</script>

<style scoped>
.showcase {
  display: flex;
  font-family:Arial, Helvetica, sans-serif;
  align-items: center;
  justify-content: space-between;
  background-color: #fff7e6;
  background-image: url('/src/assets/3389452 1.png');
  background-repeat: no-repeat;
  background-size: cover;
  background-position: center;
  border-radius: 20px;
  padding: 60px 80px;
  margin-top: 20px;
  overflow: hidden;
  height: 300px;
}

.showcase-content {
  flex: 1;
  max-width: 45%;
}

.showcase-content h1 {
  font-size: 2.6rem;
  font-weight: 700;
  color: #1e1e1e;
  margin-bottom: 10px;
  line-height: 1.3;
}

.showcase-content p {
  color: #666;
  margin-bottom: 25px;
  font-size: 1.1rem;
}

.subscribe {
  display: flex;
  align-items: center;
  background: #fff;
  border-radius: 100px;
  overflow: hidden;
  width: 420px;
  box-shadow: 0 3px 6px rgba(0, 0, 0, 0.08);
}

.input-group {
  display: flex;
  align-items: center;
  flex: 1;
  padding: 10px 18px;
}

.input-group img {
  width: 18px;
  height: 18px;
  margin-right: 10px;
  opacity: 0.7;
}

.subscribe input {
  border: none;
  outline: none;
  flex: 1;
  font-size: 15px;
  color: #333;
  background: transparent;
}

.subscribe input::placeholder {
  color: #aaa;
}

.subscribe button {
  background-color: #34b36b;
  color: #fff;
  border: none;
  padding: 12px 30px;
  font-weight: 600;
  font-size: 15px;
  border-radius: 100px;
  cursor: pointer;
  transition: background 0.3s ease;
}

.subscribe button:hover {
  background-color: #2f9e5f;
}

.image-area {
  flex: 1;
  display: flex;
  justify-content: flex-end;
  align-items: center;
}

.image-area img {
  width: 90%;
  height: auto;
  object-fit: contain;
  border-radius: 15px;
  transform: translateY(-7px);
}
</style>
