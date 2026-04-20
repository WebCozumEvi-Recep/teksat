<template>
  <article class="bg-white border border-gray-200 rounded-lg p-4">
    <p class="text-sm text-gray-500">{{ title }}</p>
    <p class="text-2xl font-semibold mt-1">{{ value }}</p>
  </article>
</template>

<script setup>
defineProps({ title: String, value: [String, Number] })
</script>
