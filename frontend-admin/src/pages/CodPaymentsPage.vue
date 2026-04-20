<template>
  <section>
    <h2 class="text-2xl font-semibold mb-4">COD Payments</h2>
    <div class="grid grid-cols-4 gap-4 mb-4">
      <StatCard title="Waiting" value="₺45.000" />
      <StatCard title="Collected" value="₺120.000" />
      <StatCard title="Transfer Pending" value="₺20.000" />
      <StatCard title="Transferred" value="₺98.000" />
    </div>
  </section>
</template>

<script setup>
import StatCard from '../components/ui/StatCard.vue'
</script>
