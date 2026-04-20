<template>
  <div v-if="open" class="fixed inset-0 bg-black/30">
    <aside class="absolute right-0 top-0 h-full w-[420px] bg-white p-5 border-l border-gray-200">
      <slot />
    </aside>
  </div>
</template>

<script setup>
defineProps({ open: Boolean })
</script>
