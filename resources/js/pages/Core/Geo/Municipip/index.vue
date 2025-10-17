<script setup lang="ts">
import { ref, onMounted } from 'vue'
import AppLayout from '@/layouts/AppLayout.vue';
import { Head } from '@inertiajs/vue3';
import MpioToolbar from './components/MpioToolbar.vue'
import MpioTable from './components/MpioTable.vue'
import MpioFormDialog from './components/MpioFormDialog.vue'
import { useMpioStore } from './stores/mpio.store';
const store = useMpioStore()
const dialog = ref(false)
const editing = ref<any | null>(null)

onMounted(() => store.list())

function openNew() { editing.value = null; dialog.value = true }
function openEdit(row: any) { editing.value = { ...row }; dialog.value = true }
async function onSaved() { await store.list() }
</script>




<template>

    <Head title="Municipio" />

    <AppLayout>

        <div class="flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-4">
            <div class="grid auto-rows-min gap-4 ">

                <MpioToolbar @new="openNew" />
                <MpioTable @edit="openEdit" />
                <MpioFormDialog v-model="dialog" :record="editing" @saved="onSaved" />

            </div>
        </div>
    </AppLayout>
</template>