<!-- vuetify-data-table.vue -->
<template>
  <v-data-table
    :headers="headers"
    :items="items"
    :items-per-page="10"
    class="elevation-1"
  >
    <template v-slot:item.actions="{ item }">
      <v-btn icon @click="editItem(item)">
        <v-icon>mdi-pencil</v-icon>
      </v-btn>
    </template>
  </v-data-table>
</template>

<script setup>
defineProps({
  headers: Array,
  items: Array
});

const emit = defineEmits(['edit']);

const editItem = (item) => {
  emit('edit', item);
};
</script>