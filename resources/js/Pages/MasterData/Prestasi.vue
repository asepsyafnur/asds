<script setup>
    import { ref } from "vue";
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import { Head } from '@inertiajs/vue3';
    import { Link } from '@inertiajs/vue3';

    defineProps({
        prestasi: {
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
    <Head title="Kategori" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Prestasi</h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <v-card>
                        <template v-slot:text>
                            <v-text-field
                                v-model="search"
                                label="Search"
                                prepend-inner-icon="mdi-magnify"
                                variant="outlined"
                                hide-details
                                single-line
                            ></v-text-field>
                        </template>
                        
                        <v-data-table
                            :headers="headers"
                            :items="prestasi.data"
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
                                    <Link :href="route('dashboard')" class="text-indigo-400 hover:underline">Detail</Link>
                                </div>
                            </template>
                        </v-data-table>
                    </v-card>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
