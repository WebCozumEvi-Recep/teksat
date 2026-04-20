<template>
  <div class="min-h-screen bg-[#F5F7F8] text-[#101828]">
    <div class="flex">
      <Sidebar />
      <main class="flex-1 p-6">
        <Topbar />
        <router-view />
      </main>
    </div>
  </div>
</template>

<script setup>
import Sidebar from './Sidebar.vue'
import Topbar from './Topbar.vue'
</script>
