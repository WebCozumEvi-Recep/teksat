<template>
  <div class="bg-white rounded-xl p-4 shadow-sm">
    <div class="flex justify-between items-center mb-4">
      <div>
        <h2 class="font-semibold">{{ title }}</h2>
        <p class="text-sm text-slate-500">{{ description }}</p>
      </div>
      <button class="bg-primary text-white px-4 py-2 rounded-lg">New</button>
    </div>
    <table class="w-full text-sm">
      <thead class="text-left text-slate-500 border-b">
        <tr><th class="py-2">Name</th><th>Status</th><th>Updated</th></tr>
      </thead>
      <tbody>
        <tr v-for="i in 6" :key="i" class="border-b last:border-none">
          <td class="py-3">Record {{ i }}</td>
          <td><span class="text-success">Active</span></td>
          <td>{{ new Date().toLocaleDateString() }}</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>
<script setup>
defineProps({ title: String, description: String })
</script>
