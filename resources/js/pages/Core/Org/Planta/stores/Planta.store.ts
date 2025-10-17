import { defineStore } from 'pinia';
import axios from 'axios';

// Variables para controlar solicitudes en vuelo y evitar llamadas repetidas
let inflight: Promise<void> | null = null;
let lastAt = 0;

export const usePlantaStore = defineStore('orgPlanta', {
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
          const { data } = await axios.get(route('org.planta.datatable'));
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
    async save(form: { id?: number; nombre: string; codigo: string; sucursal?: number }): Promise<{ ok: true } | { ok: false; errors: Record<string, string[]> }> {
      try {
        if (form.id) {
          // Actualiza registro existente
          await axios.put(route('org.planta.update', form.id), {
            nombre: form.nombre,
            codigo: form.codigo,
            sucursal_id: form.sucursal,
          });
        } else {
          // Crea nuevo registro
          await axios.post(route('org.planta.store'), {
            nombre: form.nombre,
            codigo: form.codigo,
            sucursal_id: form.sucursal,
          });
        }
        // Recargar lista tras guardar
        await this.list();
        return { ok: true };
      } catch (e: any) {
        // Si es error de validación 422, devolver errores para mostrarlos en UI
        if (e?.response?.status === 422) {
          const errors = (e.response.data && e.response.data.errors) || {};
          return { ok: false, errors };
        }
        // Otros errores: relanzar para manejo superior si se requiere
        console.error('Error al guardar:', e);
        throw e;
      }
    },
  }
});
