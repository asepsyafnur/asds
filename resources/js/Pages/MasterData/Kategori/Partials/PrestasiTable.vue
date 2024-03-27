<script setup>
  import { ref } from "vue";
  import { Link } from '@inertiajs/vue3';

  defineProps({
    items: {
      type: Object,
      required: true,
    }
  });

  const search = ref('');
  const headers = ref([
      { title: '#', align: 'start', key: 'DTRow_Index'},
      { title: 'Judul Prestasi', align: 'start', sortable: false, key: 'judul_prestasi'},
      { title: 'Dibuat Tgl', key: 'created_at', align: 'center' },
      { title: '', key: 'aksi', sortable: false, align: 'end'}
  ]);
</script>

<template>
<v-data-table
  :headers="headers"
  :items="items"
  :search="search"
  items-per-page="5"
  show-select
>

  <template v-slot:item.DTRow_Index="{ index }">
      <div class="text-start">
          {{ index+1 }}
      </div>
  </template>

  <template v-slot:item.aksi="{ item }">
      <div class="text-end">
          <Link :href="route('kategori.index')" class="text-indigo-400 hover:underline">Detail</Link>
      </div>
  </template>
</v-data-table>
</template>