<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';



import { dashboard } from '@/routes';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import { inject } from 'vue';

const swal = inject<any>('$swal') // inyección del plugin SweetAlert2







</script>

<template>
    <Head title="Empleados" />

    <AppLayout >
        <div class="flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-4">
            <div class="grid auto-rows-min gap-4 md:grid-cols-3">
                
            </div>
           
        </div>
    </AppLayout>
</template>
