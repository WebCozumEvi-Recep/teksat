<template>
  <section>
    <h2 class="text-2xl font-semibold mb-4">Orders</h2>
    <AppTable>
      <template #head><tr><th class="px-4 py-2">Order No</th><th>Müşteri</th><th>Durum</th></tr></template>
      <tr class="border-t cursor-pointer" @click="open = true">
        <td class="px-4 py-2">ORD-001</td><td>Ali Veli</td><td><StatusBadge label="new" /></td>
      </tr>
    </AppTable>
    <OrderDetailDrawer :open="open" :order="{ customer: 'Ali Veli', phone: '555***', risk: 35 }" />
  </section>
</template>

<script setup>
import { ref } from 'vue'
import AppTable from '../components/ui/AppTable.vue'
import StatusBadge from '../components/ui/StatusBadge.vue'
import OrderDetailDrawer from '../components/orders/OrderDetailDrawer.vue'

const open = ref(false)
</script>
