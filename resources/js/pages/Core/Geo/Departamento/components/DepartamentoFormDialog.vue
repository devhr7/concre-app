<script setup lang="ts">
import { ref, watch, computed } from 'vue'
import { useConfirm } from 'primevue/useconfirm'
import { useToast } from 'primevue/usetoast'
import Dialog from 'primevue/dialog'
import Button from 'primevue/button'
import InputText from 'primevue/inputtext'
import { useDeptosStore } from '../store/deptos.store'
import axios from 'axios'

const props = defineProps<{ modelValue: boolean, record?: any | null }>()
const emit = defineEmits(['update:modelValue', 'saved'])

const store = useDeptosStore()

const toast = useToast()
const confirm = useConfirm()

const visible = computed({
  get: () => props.modelValue,
  set: (v) => emit('update:modelValue', v),
})

const form = ref<{ id?: number; nombre: string }>({ nombre: '' })

const deleting = ref(false)

watch(() => props.record, (r) => {
  form.value = r ? { id: r.id, nombre: r.nombre } : { nombre: '' }
}, { immediate: true })

async function submit() {
  // Si es edición, preguntar confirmación
  if (form.value.id) {
    confirm.require({
      message: '¿Está seguro de actualizar este departamento?',
      header: 'Confirmar actualización',
      icon: 'pi pi-exclamation-triangle',
      acceptLabel: 'Sí, actualizar',
      rejectLabel: 'Cancelar',
    rejectClass: 'p-button-secondary p-button-text',
      
      accept: async () => {
        await store.save(form.value)
        toast.add({
          severity: 'success',
          summary: 'Departamento actualizado',
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
      summary: 'Departamento creado',
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
    message: '¿Está seguro de eliminar este departamento?',
    header: 'Confirmar eliminación',
    icon: 'pi pi-exclamation-triangle',
    acceptLabel: 'Sí, eliminar',
    rejectLabel: 'Cancelar',
    rejectClass: 'p-button-secondary p-button-text',
    accept: async () => {
      deleting.value = true;
      try {
        await axios.delete(route('geo.departamentos.destroy', form.value.id));
        toast.add({
          severity: 'success',
          summary: 'Departamento eliminado',
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
  <Dialog v-model:visible="visible" :header="form.id ? 'Editar departamento' : 'Nuevo departamento'" modal>
    <div class="grid gap-3">
      <div class="flex flex-col gap-2">
        <label for="nombre">Nombre</label>
        <InputText id="nombre" v-model="form.nombre" aria-describedby="nombre-help" />
      </div>

    </div>
    <template #footer>
 
      <Button label="Eliminar" icon="pi pi-trash" severity="danger" v-if="form.id" :loading="deleting" @click="eliminar" class="mr-2" />
      <Button label="Guardar" icon="pi pi-check" @click="submit" />
    </template>
  </Dialog>
</template>


