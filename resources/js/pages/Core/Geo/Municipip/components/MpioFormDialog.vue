<script setup lang="ts">
import { ref, watch, computed, onMounted } from 'vue'
import { useConfirm } from 'primevue/useconfirm'
import { useToast } from 'primevue/usetoast'
import Dialog from 'primevue/dialog'
import Button from 'primevue/button'
import InputText from 'primevue/inputtext'
import Dropdown from 'primevue/dropdown'
import { useMpioStore } from '../stores/mpio.store'
import axios from 'axios'

const props = defineProps<{ modelValue: boolean, record?: any | null }>()
const emit = defineEmits(['update:modelValue', 'saved'])

const store = useMpioStore()

const toast = useToast()
const confirm = useConfirm()

const visible = computed({
  get: () => props.modelValue,
  set: (v) => emit('update:modelValue', v),
})

const form = ref<{ id?: number, nombre: string, departamento: number }>({ nombre: '', departamento: 0 })

const departamentos = ref<any[]>([])

const deleting = ref(false)

watch(() => props.record, (r) => {
  form.value = r ? { id: r.id, nombre: r.nombre, departamento: r.departamento_id ?? 0 } : { nombre: '', departamento: 0 }
}, { immediate: true })

onMounted(async () => {
  try {
    // The route defined in routes/Core/Options.php expects a POST
    const { data } = await axios.post(route('options.geo.departamentos'))
    // Expecting data to be in data.data or data (handle both)
    departamentos.value = data.data ?? data ?? []

  } catch (e) {
    console.error('Error cargando departamentos:', e)
    departamentos.value = []
  }
})

async function submit() {
  // Si es edición, preguntar confirmación
  if (form.value.id) {
    confirm.require({
      message: '¿Está seguro de actualizar este municipio?',
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
    message: '¿Está seguro de eliminar ?',
    header: 'Confirmar eliminación',
    icon: 'pi pi-exclamation-triangle',
    acceptLabel: 'Sí, eliminar',
    rejectLabel: 'Cancelar',
    rejectClass: 'p-button-secondary p-button-text',
    accept: async () => {
      deleting.value = true;
      try {
        await axios.delete(route('geo.municipio.destroy', form.value.id));
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
  <Toast />          <!-- Necesario para mostrar toasts -->
  <ConfirmDialog />  <!-- Necesario para confirmaciones -->
  <Dialog v-model:visible="visible" :header="form.id ? 'Editar Municipio' : 'Nuevo Municipio'" modal>
    <div class="grid grid-cols-2 gap-3">
      <div class="flex flex-col gap-2">
        <label for="departamento">Departamento</label>

        <Dropdown id="departamento" filter  v-model="form.departamento" :options="departamentos" optionLabel="label" optionValue="value" placeholder="Seleccione departamento" aria-describedby="departamento-help" />
      </div>
      <div class="flex flex-col gap-2">
        <label for="municipio">Municipio</label>
        <InputText id="municipio" v-model="form.nombre" aria-describedby="municipio-help" />
      </div>
    </div>
    <template #footer>
 
      <Button label="Eliminar" icon="pi pi-trash" severity="danger" v-if="form.id" :loading="deleting" @click="eliminar" class="mr-2" />
      <Button label="Guardar" icon="pi pi-check" @click="submit" />
    </template>
  </Dialog>
</template>


