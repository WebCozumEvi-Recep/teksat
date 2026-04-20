<template>
  <AppDrawer :open="open">
    <h3 class="text-lg font-semibold">Sipariş Detayı</h3>
    <p class="text-sm mt-3">Müşteri: {{ order.customer }}</p>
    <p class="text-sm">Telefon: {{ order.phone }}</p>
    <p class="text-sm">Risk: {{ order.risk }}</p>
  </AppDrawer>
</template>

<script setup>
import AppDrawer from '../ui/AppDrawer.vue'
defineProps({ open: Boolean, order: { type: Object, default: () => ({}) } })
</script>
