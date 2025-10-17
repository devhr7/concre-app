<script setup lang="ts">
import Toolbar from 'primevue/toolbar'
import InputText from 'primevue/inputtext'
import Button from 'primevue/button'
import { ref, watch } from 'vue'
import { usePlantaStore } from '../stores/Planta.store'; 
const emit = defineEmits(['new'])
const store = usePlantaStore()

let t:any

</script>

<template>
  <Toolbar>
    
    <template #end>
      <Button label="Nuevo" icon="pi pi-plus" @click="$emit('new')" />
    </template>
  </Toolbar>
</template>
