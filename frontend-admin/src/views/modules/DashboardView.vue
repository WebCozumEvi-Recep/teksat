<template>
  <div class="space-y-6">
    <section class="grid grid-cols-1 md:grid-cols-4 gap-4">
      <StatCard title="Orders Today" :value="data?.orders_today ?? '-'" trend="Live" />
      <StatCard title="Revenue Today" :value="`$${data?.revenue_today ?? 0}`" trend="COD" />
      <StatCard title="Active Domains" :value="data?.active_domains ?? '-'" trend="Healthy" />
      <StatCard title="In Transit" :value="data?.in_transit_shipments ?? '-'" trend="Logistics" />
    </section>

    <section class="bg-white rounded-xl p-4 shadow-sm">
      <h2 class="font-semibold mb-3">Performance Snapshot</h2>
      <p class="text-sm text-slate-500">Connect ApexCharts here for daily orders and COD collection trends.</p>
    </section>
  </div>
</template>

<script setup>
import { onMounted, computed } from 'vue'
import StatCard from '../../components/ui/StatCard.vue'
import { useDashboardStore } from '../../stores/dashboard'

const store = useDashboardStore()
const data = computed(() => store.data)

onMounted(() => store.fetch())
</script>
