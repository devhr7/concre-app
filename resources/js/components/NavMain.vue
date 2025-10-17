<script setup lang="ts">
import PanelMenu from 'primevue/panelmenu';
import type { MenuItem } from 'primevue/menuitem';
import type { MenuEntry } from '@/types/menu';

import { computed } from 'vue';
import { usePage, router } from '@inertiajs/vue3';
import { route } from 'ziggy-js';
import { useAbility } from '@/composables/useAbility';

// ===== MÓDULOS =====
import dashboard from '@/modules/core-dashboard'; // Dashboard (un solo item)
import gth from '@/modules/gth';                  // Gestión Humana (puede tener subniveles)
import pcm from '@/modules/pcm';                  // Producción (puede tener subniveles)
import core from '@/modules/core';            // Core (puede tener subniveles)
// ===================
type ModuleManifest = { key: string; title: string; menu: MenuEntry[] };
const modules: ModuleManifest[] = [dashboard, gth,pcm,core];

const { can } = useAbility();
const page = usePage();

// --- Helpers ---
function filterByPerm(items: MenuEntry[]): MenuEntry[] {
  return items
    .map(i => ({ ...i, children: i.children ? filterByPerm(i.children) : undefined }))
    .filter(i => can(i.perm) || (i.children && i.children.length));
}

// ¿Este entry corresponde a la ruta actual?
function isEntryActive(e: MenuEntry): boolean {
  return !!(e.route && route().current(e.route as any));
}

// Mapea MenuEntry -> MenuItem (recursivo), marcando activo y expandiendo ancestros
function mapEntries(entries: MenuEntry[]): { items: MenuItem[]; anyActive: boolean } {
  const items: MenuItem[] = [];
  let anyActive = false;

  for (const e of entries) {
    const hasChildren = !!(e.children && e.children.length);
    const childRes = hasChildren ? mapEntries(e.children!) : { items: [], anyActive: false };
    const active = isEntryActive(e) || childRes.anyActive;

    const item: MenuItem = {
      label: e.label,
      icon: e.icon,
      items: hasChildren ? childRes.items : undefined,     // <- con hijos: aparece la flecha
      command: e.route ? () => router.visit(route(e.route as any)) : undefined,
      expanded: active && hasChildren ? true : undefined,  // <- abrir si dentro hay el activo
      class: isEntryActive(e) ? 'menuitem-active' : undefined, // <- resalta el actual
    };

    items.push(item);
    anyActive = anyActive || active;
  }

  return { items, anyActive };
}

// Construye el modelo final de PanelMenu
const model = computed<MenuItem[]>(() => {
  const out: MenuItem[] = [];

  for (const m of modules) {
    const cleaned = filterByPerm(m.menu ?? []);
    if (!cleaned.length) continue;

    // Si el módulo tiene un único item SIN hijos -> lo mostramos como hoja (sin flecha).
    if (cleaned.length === 1 && !(cleaned[0].children && cleaned[0].children.length)) {
      const singleRes = mapEntries(cleaned);
      out.push(...singleRes.items); // usamos SU label (p.ej. "Empleados" o "Dashboard")
      continue;
    }

    // Si el módulo tiene varios items o hijos -> agrupamos con título y dejamos flecha en los que tengan hijos
    const mapped = mapEntries(cleaned);
    out.push({
      label: m.title,
      icon: 'pi pi-folder',
      items: mapped.items,
      expanded: mapped.anyActive ? true : undefined,
    });
  }

  return out;
});
</script>

<template>
  <aside class="h-screen overflow-auto border-r bg-white dark:bg-zinc-900">
    <PanelMenu :model="model" />
  </aside>
</template>

<style scoped>
/* Resaltado simple del item activo */
.menuitem-active > .p-menuitem-content {
  font-weight: 600;
  /* si usas Tailwind + Prime con tema Aura, esto se ve bien;
     puedes añadir background si quieres:
     background-color: color-mix(in srgb, var(--p-surface-100), transparent 60%); */
}
</style>
