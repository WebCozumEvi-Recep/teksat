<template>
  <section>
    <h2 class="text-2xl font-semibold mb-4">Fraud Orders</h2>
    <AppTable>
      <template #head><tr><th class="px-4 py-2">Order No</th><th>Risk</th><th>Level</th></tr></template>
      <tr class="border-t"><td class="px-4 py-2">ORD-0099</td><td>85</td><td><StatusBadge label="high" type="danger" /></td></tr>
    </AppTable>
  </section>
</template>

<script setup>
import AppTable from '../components/ui/AppTable.vue'
import StatusBadge from '../components/ui/StatusBadge.vue'
</script>
