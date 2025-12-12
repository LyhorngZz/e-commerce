<template>
  <div class="product-details">
    <p class="stock">In Stock</p>
    <h2>Seeds of Change Organic Quinoa, Brown</h2>

    <div class="price">
      <span class="current">$38</span>
      <span class="old">$42</span>
    </div>

    <p class="description">
      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam vehicula
      urna sit amet quam tempor tincidunt. Proin fringilla, magna a dapibus
      iaculis, libero ligula pulvinar massa, in sodales ligula sapien eu risus.
    </p>

    <div class="actions">
      <div class="quantity">
        <button>-</button>
        <input type="text" value="1" />
        <button>+</button>
      </div>
      <button class="add-btn">Add To Cart</button>
    </div>

    <div class="meta">
      <p><strong>Vendor:</strong> NestMart</p>
      <p><strong>SKU:</strong> FWM15VKT</p>
    </div>
  </div>
</template>

<script setup lang="ts"></script>

<style scoped>
.product-details {
  color: #333;
}

.stock {
  color: #009a49;
  font-weight: 600;
  margin-bottom: 10px;
}

.price {
  font-size: 1.8rem;
  margin: 10px 0;
}

.current {
  color: #009a49;
  font-weight: bold;
  margin-right: 10px;
}

.old {
  color: #999;
  text-decoration: line-through;
}

.description {
  color: #555;
  margin: 15px 0 25px;
}

.actions {
  display: flex;
  align-items: center;
  gap: 20px;
  margin-bottom: 25px;
}

.quantity {
  display: flex;
  align-items: center;
  border: 1px solid #ccc;
  border-radius: 6px;
}

.quantity button {
  background: transparent;
  border: none;
  padding: 6px 12px;
  font-size: 18px;
  cursor: pointer;
}

.quantity input {
  width: 40px;
  text-align: center;
  border: none;
  outline: none;
}

.add-btn {
  background-color: #009a49;
  color: #fff;
  border: none;
  padding: 10px 25px;
  border-radius: 6px;
  font-weight: 600;
  cursor: pointer;
}

.meta {
  margin-top: 25px;
  color: #666;
}

.meta strong {
  color: #222;
}
</style>
