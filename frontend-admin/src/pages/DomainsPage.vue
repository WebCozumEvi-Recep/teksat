<template>
  <section>
    <h2 class="text-2xl font-semibold mb-4">Domains</h2>
    <DomainCreateModal class="mb-4" />
    <AppTable>
      <template #head>
        <tr>
          <th class="px-4 py-2">Domain</th><th>Ürün</th><th>Durum</th>
        </tr>
      </template>
      <tr v-for="row in rows" :key="row.domain" class="border-t">
        <td class="px-4 py-2">{{ row.domain }}</td>
        <td>{{ row.product }}</td>
        <td><StatusBadge :label="row.status" type="success" /></td>
      </tr>
    </AppTable>
  </section>
</template>

<script setup>
import AppTable from '../components/ui/AppTable.vue'
import DomainCreateModal from '../components/domains/DomainCreateModal.vue'
import StatusBadge from '../components/ui/StatusBadge.vue'

const rows = [{ domain: 'urun1.com', product: 'Postür Korsesi', status: 'active' }]
</script>
