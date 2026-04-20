<template>
  <div class="min-h-screen flex bg-panelbg text-slate-800">
    <aside class="w-64 bg-white border-r border-slate-200 p-4">
      <h1 class="text-lg font-semibold text-primary mb-6">COD Admin</h1>
      <nav class="space-y-2">
        <RouterLink v-for="item in nav" :key="item.to" :to="item.to" class="block px-3 py-2 rounded-lg hover:bg-slate-100">
          {{ item.label }}
        </RouterLink>
      </nav>
    </aside>

    <section class="flex-1 p-6">
      <header class="bg-white rounded-xl p-4 mb-6 shadow-sm flex justify-between items-center">
        <input class="w-96 bg-slate-100 rounded-lg px-3 py-2" placeholder="Search orders, domains, customers..." />
        <div class="text-sm text-slate-500">Admin</div>
      </header>
      <slot />
    </section>
  </div>
</template>

<script setup>
const nav = [
  { label: 'Dashboard', to: '/' },
  { label: 'Domains', to: '/domains' },
  { label: 'Products', to: '/products' },
  { label: 'Orders', to: '/orders' },
  { label: 'Logistics', to: '/logistics' },
  { label: 'Reports', to: '/reports' },
  { label: 'Fraud', to: '/fraud' },
  { label: 'Settings', to: '/settings' }
]
</script>
