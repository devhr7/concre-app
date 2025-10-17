<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard } from '@/routes';
import { type BreadcrumbItem } from '@/types';
import { Head, router } from '@inertiajs/vue3';

import { columnFooter } from '@primeuix/themes/aura/datatable';
import { FilterMatchMode, FilterOperator } from '@primevue/core/api';
import { ref, onMounted } from 'vue';

import { route } from 'ziggy-js';
import axios from 'axios';
import { useForm } from "@inertiajs/vue3";



// Datos del controller de Laravel data objeto
const props = defineProps<{
    data: Array<{
        Tipo_Tercero: string;
        TipoPersona: string;
        identificacion: string;
        nombre: string;

    }>;
    errors: Record<string, string>;
    options: Array<any>;

}>();


const selectedDatatable = ref();
const filters = ref();

// Options
const placasOptions = ref(props.options.vehiculos ?? []);
const AlmBasculaOptions = ref(props.options.almacen_basculas ?? []);


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


// formulario
const form = useForm({
    origen: null,
    destino: null,
    almacen_bascula: null,
    proveedor: null,
    producto: null,
    transportista: null,
    conductor: null,
    conductores_name:null,
    placa: null,
    placa_name:null,
    fecha_hora_entrada: null,
    peso_entrada: null,
    fecha_hora_salida: null,
    peso_salida: null,
    remision: '',
    cantidad_proveedor: null,
});

/** getOptionsVehiculos */ 

async function getOptionsVehiculos() {
    placasOptions.value = [];
    try {
        const response = await axios.post(route('bascula.vehiculosOptions'), {
            tercero_id: form.transportista ? form.transportista.value : null,
            placas: null,
        });
        placasOptions.value = response.data;
    } catch (error) {
        placasOptions.value = [];
    }
}

/** getOptionsAlmBascula  */
async function getOptionsAlmBascula() {
    AlmBasculaOptions.value = [];
    try {
        const response = await axios.post(route('bascula.AlmBasculaOptions'), {
            alm_bascula_id : null,
            producto_id :null,
            linea_produccion_id: form.destino ? form.destino.value : null,
            alm_basculas :null,
        });
        AlmBasculaOptions.value = response.data;
    } catch (error) {
        AlmBasculaOptions.value = [];
    }
}





const RegistrosBascula = ref(false);

</script>

<template>

    <Head title="Bascula" />

    <AppLayout>

        <div class="flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-4">
            <div class="grid auto-rows-min gap-4 ">
                <!-- Tabla Bascula -->

                <Toolbar class="mb-6">
                    <template #start>
                        <Button label="Crear" icon="pi pi-plus" class="mr-2" @click="RegistrosBascula = true" />


                    </template>

                    <template #end>

                    </template>
                </Toolbar>
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
                                <InputText v-model="filters['global'].value" placeholder="Buscador..." />
                            </IconField>
                        </div>
                    </template>
                    <template #empty> Sin Registros. </template>
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

                <!-- Registro Bascula-->
                <Dialog v-model:visible="RegistrosBascula" modal header="Registro Bascula" :style="{ width: '75rem' }">
                    <template #header>
                        <div class="inline-flex items-center justify-center gap-2">

                            <span class="font-bold whitespace-nowrap">Registro Bascula</span>
                        </div>
                    </template>

                    <!-- una fila y 3 columnas-->
                    <div class="grid grid-cols-3 gap-4 mb-6">
                        <div class="col-span-1">
                            <label for="origen" class="block mb-2 font-medium text-gray-700">Origen</label>
                            
                            <Select :options="props.options.municipios" filter optionLabel="name"  placeholder="Select"
                                class="w-full ">
                                <template #value="slotProps">
                                    <div v-if="slotProps.value" class="flex items-center">
                                        <div>{{ slotProps.value.name }}</div>
                                    </div>
                                    <span v-else>
                                        {{ slotProps.placeholder }}
                                    </span>
                                </template>
                                <template #option="slotProps">
                                    <div class="flex items-center">
                                        <div>{{ slotProps.option.name }}</div>
                                    </div>
                                </template>
                            </Select>


                         
                        </div>
                        <div class="col-span-1">
                            <label for="destino" class="block mb-2 font-medium text-gray-700">Destino</label>
                            <Select :options="props.options.destinos" v-model="form.destino" showClear filter optionLabel="name" v-on:change="getOptionsAlmBascula"  placeholder="Select"
                                class="w-full " >
                                <template #value="slotProps">
                                    <div v-if="slotProps.value" class="flex items-center">
                                        <div>{{ slotProps.value.name }}</div>
                                    </div>
                                    <span v-else>
                                        {{ slotProps.placeholder }}
                                    </span>
                                </template>
                                <template #option="slotProps">
                                    <div class="flex items-center">
                                        <div>{{ slotProps.option.name }}</div>
                                    </div>
                                </template>
                            </Select>
                           
                        </div>

                        <div class="col-span-1">
                            <label for="AlmBascula" class="block mb-2 font-medium text-gray-700">Almacen Bascula</label>
                           <Select :options="AlmBasculaOptions"  filter optionLabel="name"  placeholder="Select"
                                class="w-full " >
                                <template #value="slotProps">
                                    <div v-if="slotProps.value" class="flex items-center">
                                        <div>{{ slotProps.value.name }}</div>
                                    </div>
                                    <span v-else>
                                        {{ slotProps.placeholder }}
                                    </span>
                                </template>
                                <template #option="slotProps">
                                    <div class="flex items-center">
                                        <div>{{ slotProps.option.name }}</div>
                                    </div>
                                </template>
                            </Select>
                        </div>
                    </div>

  <div class="grid grid-cols-2 gap-4 mb-6">
                        <div class="col-span-1">
                            <label for="proveedor" class="block mb-2 font-medium text-gray-700">Proveedor</label>
                            
                            <Select :options="props.options.proveedores" filter optionLabel="name"  placeholder="Select"
                                class="w-full ">
                                <template #value="slotProps">
                                    <div v-if="slotProps.value" class="flex items-center">
                                        <div>{{ slotProps.value.name }}</div>
                                    </div>
                                    <span v-else>
                                        {{ slotProps.placeholder }}
                                    </span>
                                </template>
                                <template #option="slotProps">
                                    <div class="flex items-center">
                                        <div>{{ slotProps.option.name }}</div>
                                    </div>
                                </template>
                            </Select>

                          
                        </div>
                        <div class="col-span-1">
                            <label for="producto" class="block mb-2 font-medium text-gray-700">Producto</label>
                           
                            <Select :options="props.options.productos" filter optionLabel="name"  placeholder="Select"
                                class="w-full ">
                                <template #value="slotProps">
                                    <div v-if="slotProps.value" class="flex items-center">
                                        <div>{{ slotProps.value.name }}</div>
                                    </div>
                                    <span v-else>
                                        {{ slotProps.placeholder }}
                                    </span>
                                </template>
                                <template #option="slotProps">
                                    <div class="flex items-center">
                                        <div>{{ slotProps.option.name }}</div>
                                    </div>
                                </template>
                            </Select>
                        </div>
                    </div>

                    <div class="grid grid-cols-3 gap-4 mb-6">
                        <div class="col-span-1">
                            <label for="transportista"
                                class="block mb-2 font-medium text-gray-700">Transportista</label>
                               
                           <Select v-model="form.transportista" :options="props.options.transportistas" showClear  v-on:change="getOptionsVehiculos" filter optionLabel="name"  placeholder="Select"
                                class="w-full">
                                <template #value="slotProps">
                                    <div v-if="slotProps.value" class="flex items-center">
                                        <div>{{ slotProps.value.name }}</div>
                                    </div>
                                    <span v-else>
                                        {{ slotProps.placeholder }}
                                    </span>
                                </template>
                                <template #option="slotProps">
                                    <div class="flex items-center">
                                        <div>{{ slotProps.option.name }}</div>
                                    </div>
                                </template>
                            </Select>
                        </div>
                        <div class="col-span-1">
                            <label for="conductor" class="block mb-2 font-medium text-gray-700">Conductor</label>

                           

                               <div v-if="form.transportista">
                                 <Select :options="props.options.conductores" filter optionLabel="name"  placeholder="Select"
                                class="w-full ">
                                <template #value="slotProps">
                                    <div v-if="slotProps.value" class="flex items-center">
                                        <div>{{ slotProps.value.name }}</div>
                                    </div>
                                    <span v-else>
                                        {{ slotProps.placeholder }}
                                    </span>
                                </template>
                                <template #option="slotProps">
                                    <div class="flex items-center">
                                        <div>{{ slotProps.option.name }}</div>
                                    </div>
                                </template>
                            </Select>
                            </div>
                            <div v-else>
                                <InputText type="text" v-model="form.conductores_name" class="w-full" />
                            </div>

                        </div>
                        <div class="col-span-1">
                            <label for="placa" class="block mb-2 font-medium text-gray-700">Placa</label>
                           
                            <div v-if="form.transportista">
                                <Select v-model="form.placa" :options="placasOptions" filter optionLabel="name" placeholder="Select"
                                    class="w-full">
                                    <template #value="slotProps">
                                        <div v-if="slotProps.value" class="flex items-center">
                                            <div>{{ slotProps.value.name }}</div>
                                        </div>
                                        <span v-else>
                                            {{ slotProps.placeholder }}
                                        </span>
                                    </template>
                                    <template #option="slotProps">
                                        <div class="flex items-center">
                                            <div>{{ slotProps.option.name }}</div>
                                        </div>
                                    </template>
                                </Select>
                            </div>
                            <div v-else>
                                <InputText type="text" v-model="form.placa_name" class="w-full" />
                            </div>

                        </div>
                    </div>

                  
                    <div class="grid grid-cols-2 gap-4 mb-6">
                        <Fieldset legend="Entrada">
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label for="FechaHoraEntrada" class="block mb-2 font-medium text-gray-700">Fecha y
                                        Hora de Entrada</label>
                                    <DatePicker id="FechaHoraSalida" showTime hourFormat="24" fluid class="w-full" />
                                </div>
                                <div>
                                    <label for="pesoEntrada" class="block mb-2 font-medium text-gray-700">Peso
                                        Entrada</label>
                                    <InputNumber inputId="pesoEntrada" showButtons locale="es-419"
                                        :minFractionDigits="2" suffix=" Kg" fluid />
                                </div>
                            </div>
                        </Fieldset>

                        <Fieldset legend="Salida">
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label for="FechaHoraSalida" class="block mb-2 font-medium text-gray-700">Fecha y
                                        Hora de Salida</label>
                                    <DatePicker id="FechaHoraSalida" showTime hourFormat="24" fluid class="w-full" />
                                </div>
                                <div>
                                    <label for="pesoSalida" class="block mb-2 font-medium text-gray-700">Peso
                                        Salida</label>
                                    <InputNumber inputId="pesoSalida" showButtons locale="es-419" :minFractionDigits="2"
                                        suffix=" Kg" fluid />

                                </div>
                            </div>
                        </Fieldset>
                    </div>

                    <div class="grid grid-cols-4 gap-4 mb-6">
                        <div class="col-span-1">
                            <label for="Remision" class="block mb-2 font-medium text-gray-700">Remision
                                Proveedor</label>
                            <InputText type="text" />
                        </div>
                        <div class="col-span-1">
                            <label for="destino" class="block mb-2 font-medium text-gray-700">Cantidad del
                                proveedor</label>
                            <InputNumber inputId="pesoSalida" showButtons locale="es-419" :minFractionDigits="2"
                                suffix=" Kg" fluid />

                        </div>

                        <div class="col-span-1">
                            <label for="AlmBascula" class="block mb-2 font-medium text-gray-700">Peso Neto</label>
                            <Message severity="secondary" variant="outlined"> 000.0000</Message>
                        </div>
                        <div class="col-span-1">
                            <label for="AlmBascula" class="block mb-2 font-medium text-gray-700">Diferencia Peso</label>
                            <Message severity="secondary" variant="outlined"> 000.000</Message>
                        </div>
                    </div>

                    <template #footer>

                        <Button label="Guardar" variant="outlined" severity="secondary" autofocus />
                    </template>
                </Dialog>
                <!-- Estadísticas Terceros -->
            </div>
        </div>
    </AppLayout>
</template>
