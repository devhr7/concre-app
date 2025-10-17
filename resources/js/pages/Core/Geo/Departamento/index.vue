<script setup lang="ts">
import { ref, onMounted } from 'vue'
import AppLayout from '@/layouts/AppLayout.vue';
import { Head } from '@inertiajs/vue3';
import DepartamentosToolbar from './components/DepartamentosToolbar.vue'
import DepartamentosTable from './components/DepartamentosTable.vue'
import DepartamentoFormDialog from './components/DepartamentoFormDialog.vue'
import { useDeptosStore } from './store/deptos.store'; // E:\wamp64\www\concre-app\resources\js\pages\Core\Geo\Departamento\store\deptos.store.ts

const store = useDeptosStore()
const dialog = ref(false)
const editing = ref<any|null>(null)

onMounted(() => store.list())

function openNew() { editing.value = null; dialog.value = true }
function openEdit(row:any) { editing.value = { ...row }; dialog.value = true }
async function onSaved() { await store.list() }
</script>




<template>

    <Head title="Departamento" />

    <AppLayout>

        <div class="flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-4">
            <div class="grid auto-rows-min gap-4 ">
      
                 <DepartamentosToolbar @new="openNew" />
    <DepartamentosTable @edit="openEdit" />
    <DepartamentoFormDialog v-model="dialog" :record="editing" @saved="onSaved" />

            </div>
        </div>
    </AppLayout>
</template>