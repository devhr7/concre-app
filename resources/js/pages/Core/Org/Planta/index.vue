<script setup lang="ts">
import { ref, onMounted } from 'vue'
import AppLayout from '@/layouts/AppLayout.vue';
import { Head } from '@inertiajs/vue3';
import PlantaToolbar from './components/PlantaToolbar.vue'
import PlantaTable from './components/PlantaTable.vue'
import PlantaFormDialog from './components/PlantaFormDialog.vue'
import { usePlantaStore } from './stores/Planta.store';

const store = usePlantaStore()
const dialog = ref(false)
const editing = ref<any | null>(null)

onMounted(() => store.list())

function openNew() { editing.value = null; dialog.value = true }
function openEdit(row: any) { editing.value = { ...row }; dialog.value = true }
async function onSaved() { await store.list() }
</script>




<template>

    <Head title="Linea de Produccion" />

    <AppLayout>

        <div class="flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-4">
            <div class="grid auto-rows-min gap-4 ">

                <PlantaToolbar @new="openNew" />
                <PlantaTable @edit="openEdit" />
                <PlantaFormDialog v-model="dialog" :record="editing" @saved="onSaved" />

            </div>
        </div>
    </AppLayout>
</template>