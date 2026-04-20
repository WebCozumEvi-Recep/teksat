<template>
  <aside class="w-64 min-h-screen bg-white border-r border-gray-200 p-4">
    <h1 class="font-bold text-xl text-[#0B7A33] mb-6">Codex Build</h1>
    <nav class="space-y-2">
      <RouterLink v-for="item in items" :key="item.to" :to="item.to" class="block px-3 py-2 rounded hover:bg-[#F5F7F8]">
        {{ item.label }}
      </RouterLink>
    </nav>
  </aside>
</template>

<script setup>
const items = [
  { to: '/dashboard', label: 'Dashboard' },
  { to: '/domains', label: 'Domains' },
  { to: '/products', label: 'Products' },
  { to: '/orders', label: 'Orders' },
  { to: '/logistics/cod-payments', label: 'COD Payments' },
  { to: '/security/fraud', label: 'Fraud' }
]
</script>
