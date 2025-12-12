<template>
  <section class="product-detail-page">
    <div class="container">
      <div class="product-layout">
        <!-- Left: Image Component -->
        <ProductImageComponent />

        <!-- Right: Detail Component -->
        <ProductDetailComponent />
      </div>

      <!-- Bottom Tabs Section -->
      <div class="product-tabs">
        <div class="tab-buttons">
          <button
            v-for="tab in tabs"
            :key="tab"
            :class="{ active: activeTab === tab }"
            @click="activeTab = tab"
          >
            {{ tab }}
          </button>
        </div>

        <div class="tab-content">
          <div v-if="activeTab === 'Description'">
            <p>
              Uninhibited camally hired played in whimpered dear gorilla koala
              depending and much yikes off far quetzal goodness and from for
              grimaced goodness unaccountably and meadowlark near unblushingly
              crucial scallop tightly neurotic hungrily some and dear furiously
              this apart.
            </p>
            <p>
              Spluttered narrowly yikes left moth in yikes bowed this that
              grizzly much hello on spoon-fed that alas rethought much decently
              richly and wow against the frequent fluidly at formidable
              acceptably flapped besides and much circa far over the bucolically
              hey precarious goldfinch mastodon goodness gnashed a jellyfish and
              one however because.
            </p>
          </div>

          <div v-else-if="activeTab === 'Additional Info'">
            <ul>
              <li>Weight: 500g</li>
              <li>Origin: Thailand</li>
              <li>Freshness: 100%</li>
            </ul>
          </div>

          <div v-else-if="activeTab === 'Reviews (3)'">
            <p>⭐ 4.8 average rating from 3 reviews.</p>
            <p>"Fresh and juicy! Highly recommend."</p>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup lang="ts">
import { ref } from 'vue'
import ProductImageComponent from '@/components/__tests__/ProductImageComponent.vue'
import ProductDetailComponent from '@/components/__tests__/ProductDetailComponent.vue'

const tabs = ['Description', 'Additional Info', 'Reviews (3)']
const activeTab = ref('Description')
</script>

<style scoped>
.product-detail-page {
  padding: 40px 0;
}

.container {
  width: 90%;
  margin: auto;
}

.product-layout {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 40px;
  align-items: start;
  margin-bottom: 60px;
}

/* Bottom tab section */
.product-tabs {
  border: 1px solid #eee;
  border-radius: 10px;
  padding: 20px 30px;
  background: #fff;
}

.tab-buttons {
  display: flex;
  gap: 20px;
  margin-bottom: 20px;
}

.tab-buttons button {
  border: none;
  background: transparent;
  font-size: 14px;
  font-weight: 500;
  color: #777;
  cursor: pointer;
  padding: 8px 18px;
  border-radius: 50px;
  transition: all 0.3s;
}

.tab-buttons button.active {
  background: #e9f9ef;
  color: #3bb77e;
  font-weight: 600;
}

.tab-content p {
  color: #555;
  line-height: 1.7;
  margin-bottom: 12px;
  font-size: 14px;
}

.tab-content ul {
  color: #555;
  font-size: 14px;
  line-height: 1.7;
  padding-left: 20px;
}
</style>
