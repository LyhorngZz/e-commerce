<template>
  <nav class="menu">
    <div class="menu-left">
      <button class="browse-btn">
        <img src="/src/assets/browse.png" alt="Browse"/> Browse All Categories
      </button>
      <ul>
        <li><img src="/src/assets/flame.png" alt="Hot deal" height="16px" /><a href="#">Hot Deals</a></li>
        <li><a href="#">Home</a></li>
        <li><a href="#">Food</a></li>
        <li><a href="#">Vegetables</a></li>
        <li><a href="#">Drink</a></li>
        <li><a href="#">Cookies</a></li>
        <li><a href="#">Meat & Seafood</a></li>
        <li><a href="#">Bakery</a></li>
      </ul>
    </div>

    <div class="menu-right">
      <img src="/src/assets/headphone.png" alt="Support"/>
      <div class="support-info">
        <p class="phone">1900 - 8888</p>
        <small>24/7 Support Center</small>
      </div>
    </div>
  </nav>
</template>

<script lang="ts" setup></script>

<style scoped>
.menu {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 10px 40px;
  background-color: #fff;
  border-top: 1px solid #eee;
}

.menu-left {
  display: flex;
  align-items: center;
}

.browse-btn {
  background-color: #009a49;
  color: white;
  border: none;
  padding: 8px 16px;
  border-radius: 6px;
  font-weight: 500;
  cursor: pointer;
  display: flex;
  align-items: center;
  gap: 8px;
}

.menu-left ul {
  display: flex;
  list-style: none;
  margin: 0;
  margin-left: 30px;
  padding: 0;
  gap: 20px;
}

.menu-left a {
  text-decoration: none;
  color: #333;
  font-weight: 500;
}

.menu-left a:hover {
  color: #009a49;
}

.menu-right {
  display: flex;
  align-items: center;
  gap: 10px;
}

.menu-right i {
  font-size: 22px;
  color: #009a49;
}

.support-info {
  line-height: 1.2;
}

.support-info .phone {
  font-weight: 600;
  color: #009a49;
  margin: 0;
  font-size: 16px;
}

.support-info small {
  color: #888;
  font-size: 13px;
}
</style>
