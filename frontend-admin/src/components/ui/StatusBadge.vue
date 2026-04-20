<template>
  <span class="px-2 py-1 text-xs rounded-full" :class="badgeClass">{{ label }}</span>
</template>

<script setup>
import { computed } from 'vue'

const props = defineProps({ label: String, type: String })

const badgeClass = computed(() => {
  if (props.type === 'success') return 'bg-green-100 text-green-700'
  if (props.type === 'danger') return 'bg-red-100 text-red-700'
  if (props.type === 'warning') return 'bg-amber-100 text-amber-700'
  return 'bg-gray-100 text-gray-700'
})
</script>
