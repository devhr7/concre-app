<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard } from '@/routes';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import { columnFooter } from '@primeuix/themes/aura/datatable';
import { FilterMatchMode, FilterOperator } from '@primevue/core/api';
import { ref, onMounted } from 'vue';


// Datos del controller de Laravel data objeto
const props = defineProps<{
    data: Array<{
        Tipo_Tercero: string;
        TipoPersona: string;
        identificacion: string;
        nombre: string;
    }>;
}>();


const customers = ref();
const selectedDatatable = ref();
const filters = ref();


const initFilters = () => {
    filters.value = {
        global: { value: null, matchMode: FilterMatchMode.CONTAINS },
        Tipo_Tercero: { operator: FilterOperator.AND, constraints: [{ value: null, matchMode: FilterMatchMode.STARTS_WITH }] },

    };
};

initFilters();

const clearFilter = () => {
    initFilters();
};


</script>

<template>

    <Head title="Terceros" />

    <AppLayout>

        <div class="flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-4">
            <div class="grid auto-rows-min gap-4 sm:grid-cols-2 ">
                <!-- Tabla Terceros -->


                <DataTable v-model:filters="filters" v-model:selection="selectedDatatable" :value="props.data"
                    dataKey="id" filterDisplay="menu" paginator :rows="5" :rowsPerPageOptions="[5, 10, 20, 50]"
                    :globalFilterFields="['Tipo_Tercero', 'TipoPersona', 'identificacion', 'nombre', 'status']"
                    tableStyle="min-width: 50rem">
                    <template #header>
                        <div class="flex justify-between">
                            <Button type="button" icon="pi pi-filter-slash" label="Clear" variant="outlined"
                                @click="clearFilter()" />
                            <IconField>
                                <InputIcon>
                                    <i class="pi pi-search" />
                                </InputIcon>
                                <InputText v-model="filters['global'].value" placeholder="Keyword Search" />
                            </IconField>
                        </div>
                    </template>
                    <template #empty> No Encontrado. </template>
                    <Column field="Tipo_Tercero" header="Tipo Tercero" style="width: 25%"></Column>
                    <Column field="TipoPersona" header="Persona" style="width: 25%"></Column>
                    <Column field="identificacion" header="Identificacion" style="width: 25%"></Column>
                    <Column field="nombre" header="Nombre/Razon Social" style="width: 25%"></Column>
                    <Column :exportable="false" style="min-width: 12rem">
                        <template #body="slotProps">
                            <Button icon="pi pi-pencil" variant="outlined" rounded class="mr-2"
                                @click="editProduct(slotProps.data)" />

                        </template>
                    </Column>

                </DataTable>
                <!-- Estadísticas Terceros -->
            </div>
        </div>
    </AppLayout>
</template>
