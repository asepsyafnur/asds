<script setup>
  import { onMounted } from 'vue';
  import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
  import { Head } from '@inertiajs/vue3';
  import { useField, useForm } from 'vee-validate'
  import PrestasiTable from "./Partials/PrestasiTable.vue";

  const props = defineProps({
    kategori: {
      type: Object,
      required: true,
    }
  });

  const { handleSubmit } = useForm({
    validationSchema: {
      nama_kategori (value) {
        if (value?.length >= 2) return true

        return 'Name needs to be at least 2 characters.'
      },
    },
  });

  const nama_kategori = useField('nama_kategori');

  const submit = handleSubmit(values => {
    alert(JSON.stringify(values, null, 2))
  })

  onMounted(() => {
    nama_kategori.value.value = props.kategori.nama_kategori
  })

</script>

<template>
  <Head title="Edit Kategori" />
  <AuthenticatedLayout>
    <template #header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Kategori</h2>
    </template>

    <div class="pt-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
              <form @submit.prevent="submit">
                <v-text-field
                  v-model="nama_kategori.value.value"
                  :counter="10"
                  :error-messages="nama_kategori.errorMessage.value"
                  label="Nama Kategori"
                ></v-text-field>

                <v-btn
                  class="mt-3 me-4"
                  type="submit"
                >
                  update
                </v-btn>
              </form>
            </div>
          </div>
      </div>
    </div>
    <div class="pt-2 pb-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900">
                <prestasi-table :items="kategori.prestasi" />
              </div>
            </div>
        </div>
    </div>
  </AuthenticatedLayout>
</template>