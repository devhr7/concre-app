<script setup lang="ts">
import DataTable from 'primevue/datatable'
import Column from 'primevue/column'
import Button from 'primevue/button'
import InputText from 'primevue/inputtext'
import { useSucurStore } from '../stores/sucur.store'
import { FilterMatchMode, FilterOperator } from '@primevue/core/api'
import { ref, onMounted } from 'vue'
import { storeToRefs } from 'pinia'


const filters = ref({})

const initFilters = () => {
  filters.value = {
    global: { value: null, matchMode: FilterMatchMode.CONTAINS },
    nombre: { value: null, matchMode: FilterMatchMode.STARTS_WITH },
    sede_nombre: { value: null, matchMode: FilterMatchMode.STARTS_WITH},
  }
}
initFilters()

const clearFilter = () => {
  initFilters()
}




// Cargar departamentos solo una vez al montar
onMounted(() => {
  store.list()
})

const store = useSucurStore()
const { items, loading } = storeToRefs(store)   // ✅ conserva reactividad
onMounted(() => store.list())
const props = defineProps<{ rows: any[]; loading?: boolean }>()
const emit = defineEmits<{
  (e: 'edit', row: any): void
}>()
</script>

<template>

  <DataTable :value="store.items" paginator :globalFilterFields="['nombre','sede_nombre']" v-model:filters="filters"
    filterDisplay="menu" :rows="10" :rowsPerPageOptions="[5, 10, 20, 50]">

    <template #header>
      <div class="flex flex-wrap gap-2 items-center justify-between">
        <h4 class="m-0">Sucursal</h4>
        <IconField>
          <InputIcon>
            <i class="pi pi-search" />
          </InputIcon>
          <InputText v-model="filters['global'].value" placeholder="Search..." />
        </IconField>
      </div>
    </template>
    <Column field="nombre" header="Nombre" sortable />
    <Column field="sede_nombre" header="Sede" sortable />
    <Column :exportable="false" style="min-width: 12rem">
      <template #body="{ data }">
        <Button icon="pi pi-pencil" variant="outlined" rounded class="mr-2" @click="emit('edit', data)" />
      </template>
    </Column>
  </DataTable>
</template>
