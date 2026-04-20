<template>
  <div class="bg-white rounded-xl p-4 shadow-sm">
    <p class="text-sm text-slate-500">{{ title }}</p>
    <h3 class="text-2xl font-semibold mt-2">{{ value }}</h3>
    <p class="text-xs mt-2 text-success">{{ trend }}</p>
  </div>
</template>

<script setup>
defineProps({ title: String, value: [String, Number], trend: String })
</script>
