<script setup lang="ts">
import { ref, watch, computed, onMounted } from 'vue'
import { useConfirm } from 'primevue/useconfirm'
import { useToast } from 'primevue/usetoast'
import Dialog from 'primevue/dialog'
import Button from 'primevue/button'
import InputText from 'primevue/inputtext'
import Dropdown from 'primevue/dropdown'
import Toast from 'primevue/toast'
import ConfirmDialog from 'primevue/confirmdialog'
import { useSucurStore } from '../stores/sucur.store'
import axios from 'axios'

const props = defineProps<{ modelValue: boolean, record?: any | null }>()
const emit = defineEmits(['update:modelValue', 'saved'])

const store = useSucurStore()

const toast = useToast()
const confirm = useConfirm()

const visible = computed({
  get: () => props.modelValue,
  set: (v) => emit('update:modelValue', v),
})

const form = ref<{ id?: number, nombre: string, sede: number }>({ nombre: '', sede: 0 })

const sedes = ref<any[]>([])

const deleting = ref(false)

watch(() => props.record, (r) => {
  form.value = r ? { id: r.id, nombre: r.nombre, sede: r.sede_id ?? 0 } : { nombre: '', sede: 0 }
}, { immediate: true })


onMounted(async () => {
  try {
    // The route defined in routes/Core/Options.php expects a POST
    const { data } = await axios.post(route('options.org.sede'))
    // Expecting data to be in data.data or data (handle both)
    sedes.value = data.data ?? data ?? []
  } catch (e) {
    console.error('Error cargando:', e)
    sedes.value = []
  }
})

async function submit() {
  if (!form.value.nombre || !form.value.sede) {
    toast.add({
      severity: 'warn',
      summary: 'Campos requeridos',
      detail: 'Debe completar todos los campos.',
      life: 2500
    })
    return
  }
  // Si es edición, preguntar confirmación
  if (form.value.id) {
    confirm.require({
      message: '¿Está seguro de actualizar?',
      header: 'Confirmar actualización',
      icon: 'pi pi-exclamation-triangle',
      acceptLabel: 'Sí, actualizar',
      rejectLabel: 'Cancelar',
      rejectClass: 'p-button-secondary p-button-text',
      accept: async () => {
        await store.save(form.value)
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
      }
    })
  } else {
    await store.save(form.value)
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
  }
}

async function eliminar() {
  if (!form.value.id) return;
  confirm.require({
    message: '¿Está seguro de eliminar?',
    header: 'Confirmar eliminación',
    icon: 'pi pi-exclamation-triangle',
    acceptLabel: 'Sí, eliminar',
    rejectLabel: 'Cancelar',
    rejectClass: 'p-button-secondary p-button-text',
    accept: async () => {
      deleting.value = true;
      try {
        await axios.delete(route('org.sucursal.destroy', form.value.id));
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
      } catch (e) {
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
  <Toast />
  <ConfirmDialog />
  <Dialog v-model:visible="visible" :header="form.id ? 'Editar Sucursal' : 'Nueva Sucursal'" modal>
    <div class="grid grid-cols-2 gap-3">
      <div class="flex flex-col gap-2">
        <label for="sede">Sede</label>
        <Dropdown id="sede" filter v-model="form.sede" :options="sedes" optionLabel="label" optionValue="value" placeholder="Seleccione" aria-describedby="sede-help" />
      </div>
      <div class="flex flex-col gap-2">
        <label for="sucursal">Sucursal</label>
        <InputText id="sucursal" v-model="form.nombre" aria-describedby="sucursal-help" />
      </div>
    </div>
    <template #footer>
      <Button label="Eliminar" icon="pi pi-trash" severity="danger" v-if="form.id" :loading="deleting" @click="eliminar" class="mr-2" />
      <Button label="Guardar" icon="pi pi-check" @click="submit" />
    </template>
  </Dialog>
</template>
