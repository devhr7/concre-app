import { defineStore } from 'pinia';
import axios from 'axios';

// Variables para controlar solicitudes en vuelo y evitar llamadas repetidas
let inflight: Promise<void> | null = null;
let lastAt = 0;

export const useSucurStore = defineStore('OrgSucur', {
  state: () => ({
    items: [] as any[], // Lista de departamentos
    loading: false,    // Estado de carga
  }),
  actions: {
    /**
     * Obtiene la lista de departamentos desde el backend.
     * Evita llamadas repetidas en intervalos cortos.
     */
    async list() {
      const now = Date.now();
      // Si ya está cargando o la última llamada fue hace menos de 250ms, retorna la promesa en curso
      if (this.loading || (now - lastAt) < 250) {
        if (inflight) return inflight;
      }
      this.loading = true;
      lastAt = now;
      inflight = (async () => {
        try {
          const { data } = await axios.get(route('org.sucursal.datatable'));
          this.items = data.data;
        } catch (e) {
          console.error('Error al obtener datos:', e);
          this.items = [];
        } finally {
          this.loading = false;
          inflight = null;
        }
      })();
      return inflight;
    },

    /**
     * Guarda un departamento (crea o actualiza según si tiene id).
     * @param form Objeto con los datos del departamento
     */
    async save(form: { id?: number; nombre: string; sede?: number }) {
      try {
        if (form.id) {
          // Actualiza departamento existente
          await axios.put(route('org.sucursal.update', form.id), { nombre: form.nombre, sede: form.sede });
        } else {
          // Crea nuevo departamento
          await axios.post(route('org.sucursal.store'), { nombre: form.nombre, sede: form.sede });
        }
        // Opcional: recargar la lista después de guardar
        await this.list();
      } catch (e) {
        console.error('Error al guardar:', e);
      }
    },
  }
});
