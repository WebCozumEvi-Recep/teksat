<template>
  <section>
    <h2 class="text-2xl font-semibold mb-4">Products</h2>
    <AppTable>
      <template #head><tr><th class="px-4 py-2">Ad</th><th>SKU</th><th>Fiyat</th></tr></template>
      <tr class="border-t"><td class="px-4 py-2">Postür Korsesi</td><td>APS-001</td><td>₺899</td></tr>
    </AppTable>
  </section>
</template>

<script setup>
import AppTable from '../components/ui/AppTable.vue'
</script>
