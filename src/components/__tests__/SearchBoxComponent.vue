<template>
  <div class="search-box">
    <div class="logo">
      <img src="/src/assets/Logo.png" alt="Melon Logo" />
    </div>

    <div class="search-area">
      <select>
        <option>All Categories</option>
        <option>Vegetables</option>
        <option>Fruits</option>
      </select>
      <input type="text" placeholder="Search for items" />
      <button><img src="/src/assets/search.png" /></button>
    </div>

    <div class="account-section">
      <a href="#"><img src="/src/assets/account.png" alt="Account"/> Account</a>
      <a href="#"><img src="/src/assets/icon-compare 1.png" alt="Compare" /> Compare</a>
      <a href="#"><img src="/src/assets/heart.png" alt="wishlist" /> Wishlist</a>
      <a href="#"><img src="/src/assets/cart.png" alt="Cart" /> Cart</a>
    </div>
  </div>
</template>

<script lang="ts" setup></script>

<style scoped>
.search-box {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 12px 40px;
  background: #fff;
  border-bottom: 1px solid #eee;
}

.logo {
  display: flex;
  align-items: center;
  gap: 10px;
}

.logo img {
  height: 40px;
}

.logo span {
  color: #009a49;
}

.search-area {
  display: flex;
  align-items: center;
  flex: 1;
  max-width: 600px;
  margin: 0 40px;
  border: 1px solid #ddd;
  border-radius: 6px;
  overflow: hidden;
}

.search-area select,
.search-area input {
  border: none;
  outline: none;
  padding: 10px;
}

.search-area button {
  background: none;
  color: #fff;
  border: none;
  padding: 10px 15px;
  margin-left: auto;
  cursor: pointer;
}

.account-section {
  display: flex;
  gap: 15px;
}

.account-section img {
  height: 16px;
  margin-right: 3px;
}

.account-section a {
  color: #333;
  text-decoration: none;
  font-size: 14px;
}

.account-section a:hover {
  color: #009a49;
}
</style>
