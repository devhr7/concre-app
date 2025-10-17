<script setup lang="ts">
import { ref, watch, computed, onMounted } from 'vue'
import { useConfirm } from 'primevue/useconfirm'
import { useToast } from 'primevue/usetoast'
import Dialog from 'primevue/dialog'
import Button from 'primevue/button'
import InputText from 'primevue/inputtext'
import Dropdown from 'primevue/dropdown'
import { usePlantaStore } from '../stores/Planta.store'
import axios from 'axios'

const props = defineProps<{ modelValue: boolean, record?: any | null }>()
const emit = defineEmits(['update:modelValue', 'saved'])

const store = usePlantaStore()

const toast = useToast()
const confirm = useConfirm()

const visible = computed({
  get: () => props.modelValue,
  set: (v) => emit('update:modelValue', v),
})

const form = ref<{ id?: number, nombre: string, codigo : string,  sucursal: number }>({ nombre: '', codigo:'', sucursal: 0 })
// Errores de validación desde el backend
const errors = ref<Record<string, string[]>>({})

const sucursals = ref<any[]>([])

const deleting = ref(false)

watch(() => props.record, (r) => {
  form.value = r ? { id: r.id, nombre: r.nombre, codigo: r.codigo, sucursal: r.sucursal_id ?? 0 } : { nombre: '', codigo : '', sucursal: 0 }
  errors.value = {}
}, { immediate: true })

onMounted(async () => {
  try {
    // The route defined in routes/Core/Options.php expects a POST
    const { data } = await axios.post(route('options.org.sucursal'))
    // Expecting data to be in data.data or data (handle both)
    sucursals.value = data.data ?? data ?? []

  } catch (e) {
    console.error('Error cargando:', e)
    sucursals.value = []
  }
})

async function submit() {
  errors.value = {}
  // Si es edición, preguntar confirmación
  if (form.value.id) {
    confirm.require({
      message: '¿Está seguro de actualizar ?',
      header: 'Confirmar actualización',
      icon: 'pi pi-exclamation-triangle',
      acceptLabel: 'Sí, actualizar',
      rejectLabel: 'Cancelar',
    rejectClass: 'p-button-secondary p-button-text',
      
      accept: async () => {
        const res = await store.save(form.value)
        if (res.ok) {
          toast.add({
            severity: 'success',
            summary: 'Actualizado',
            detail: 'La operación se realizó correctamente.',
            life: 2500
          })
          emit('saved')
          setTimeout(() => {
            visible.value = false
          }, 100)
        } else {
          errors.value = res.errors || {}
          toast.add({
            severity: 'warn',
            summary: 'Validación',
            detail: 'Por favor verifique nuevamente la información.',
            life: 2500
          })
        }
      }
    })
  } else {
    const res = await store.save(form.value)
    if (res.ok) {
      toast.add({
        severity: 'success',
        summary: 'Creado',
        detail: 'La operación se realizó correctamente.',
        life: 2500
      })
      emit('saved')
      setTimeout(() => {
        visible.value = false
      }, 100)
    } else {
      errors.value = res.errors || {}
      toast.add({
        severity: 'warn',
        summary: 'Validación',
        detail: 'Por favor verifique nuevamente la información.',
        life: 2500
      })
    }
  }
}

async function eliminar() {
  if (!form.value.id) return;
  confirm.require({
    message: '¿Está seguro de eliminar ?',
    header: 'Confirmar eliminación',
    icon: 'pi pi-exclamation-triangle',
    acceptLabel: 'Sí, eliminar',
    rejectLabel: 'Cancelar',
    rejectClass: 'p-button-secondary p-button-text',
    accept: async () => {
      deleting.value = true;
      try {
        await axios.delete(route('org.planta.destroy', form.value.id));
        toast.add({
          severity: 'success',
          summary: 'Eliminado',
          detail: 'El registro fue eliminado correctamente.',
          life: 2500
        });
        emit('saved');
        setTimeout(() => {
          visible.value = false;
        }, 100);
      } catch {
        toast.add({
          severity: 'error',
          summary: 'Error',
          detail: 'No se pudo eliminar el registro.',
          life: 2500
        });
      } finally {
        deleting.value = false;
      }
    }
  });
}


</script>

<template>
  <Toast />          <!-- Necesario para mostrar toasts -->
  <ConfirmDialog />  <!-- Necesario para confirmaciones -->
  <Dialog v-model:visible="visible" :header="form.id ? 'Editar Linea de Produccion' : 'Nuevo Linea de Produccion'" modal>
    <div class="grid grid-cols- gap-3">

      <div class="flex flex-col gap-2">

        <label for="sucursal">Sucursal</label>
        <Dropdown id="sucursal" filter  v-model="form.sucursal" :options="sucursals"  optionLabel="label" optionValue="value" placeholder="Seleccione" aria-describedby="sucursal-help" :class="{'p-invalid': errors.sucursal_id}" />
        <small id="sucursal-help" class="p-error" :invalid="!!errors.sucursal_id" v-if="errors.sucursal_id">{{ errors.sucursal_id[0] }}</small>
      </div>
      <div class="flex flex-col gap-2">
        <label for="codlineaproduccion">Codigo Linea de Produccion</label>
        <InputText id="codlineaproduccion" v-model="form.codigo" aria-describedby="codlineaproduccion-help" :class="{'p-invalid': errors.codigo}" />
        <small id="codlineaproduccion-help" class="p-error" v-if="errors.codigo">{{ errors.codigo[0] }}</small>
      </div>
      <div class="flex flex-col gap-2">
        <label for="lineaproduccion">Linea de Produccion</label>
        <InputText id="lineaproduccion" v-model="form.nombre" aria-describedby="lineaproduccion-help" :class="{'p-invalid': errors.nombre}" />
        <small id="lineaproduccion-help" class="p-error" v-if="errors.nombre">{{ errors.nombre[0] }}</small>
      </div>
    </div>
    <template #footer>
     
 
      <Button label="Eliminar" icon="pi pi-trash" severity="danger" v-if="form.id" :loading="deleting" @click="eliminar" class="mr-2" />
      <Button label="Guardar" icon="pi pi-check" @click="submit" />
    </template>
  </Dialog>
</template>


