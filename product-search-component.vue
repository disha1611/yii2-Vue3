<!-- product-search-component.vue -->
<template>
  <v-card>
    <v-text-field
      v-model="searchQuery"
      label="Search products"
      outlined
      @update:model-value="searchProducts"
    ></v-text-field>
    
    <v-data-table
      :headers="headers"
      :items="products"
      :loading="loading"
    >
      <template v-slot:item.price="{ item }">
        {{ formatPrice(item.price) }}
      </template>
    </v-data-table>
  </v-card>
</template>

<script setup>
import { ref } from 'vue';
import { useApi } from '../services/api-service';

const { get } = useApi();
const searchQuery = ref('');
const products = ref([]);
const loading = ref(false);

const searchProducts = async () => {
  try {
    loading.value = true;
    const response = await get('/products/search', { params: { q: searchQuery.value } });
    products.value = response.data;
  } finally {
    loading.value = false;
  }
};

const formatPrice = (value) => `$${value.toFixed(2)}`;

const headers = [
  { title: 'Name', key: 'name' },
  { title: 'Price', key: 'price' },
  { title: 'Description', key: 'description' },
];
</script>