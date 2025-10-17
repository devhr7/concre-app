<script setup lang="ts">
import Toolbar from 'primevue/toolbar'
import InputText from 'primevue/inputtext'
import Button from 'primevue/button'
import { ref, watch } from 'vue'
import { useMpioStore } from '../stores/mpio.store'; // E:\wamp64\www\concre-app\resources\js\pages\Core\Geo\Departamento\store\deptos.store.ts


const emit = defineEmits(['new'])
const store = useMpioStore()

let t:any

</script>

<template>
  <Toolbar>
    
    <template #end>
      <Button label="Nuevo" icon="pi pi-plus" @click="$emit('new')" />
    </template>
  </Toolbar>
</template>
