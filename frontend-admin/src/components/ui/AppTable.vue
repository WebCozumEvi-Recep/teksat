<template>
  <div class="bg-white rounded-lg border border-gray-200 overflow-hidden">
    <table class="w-full text-left text-sm">
      <thead class="bg-gray-50"><slot name="head" /></thead>
      <tbody><slot /></tbody>
    </table>
  </div>
</template>
