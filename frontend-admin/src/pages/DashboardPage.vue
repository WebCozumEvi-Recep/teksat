<template>
  <section>
    <h2 class="text-2xl font-semibold mb-4">Dashboard</h2>
    <div class="grid grid-cols-4 gap-4">
      <StatCard title="Toplam Sipariş" value="1,204" />
      <StatCard title="Aktif Domain" value="32" />
      <StatCard title="Bekleyen COD" value="₺182.400" />
      <StatCard title="Fraud Alarm" value="17" />
    </div>
  </section>
</template>

<script setup>
import StatCard from '../components/ui/StatCard.vue'
</script>
