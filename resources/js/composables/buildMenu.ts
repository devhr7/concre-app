import type { MenuEntry } from '@/types/menu';
import type { MenuItem } from 'primevue/menuitem';
import { useAbility } from '@/composables/useAbility';
import { route } from 'ziggy-js';
import { router } from '@inertiajs/vue3';


function filterByPerm(items: MenuEntry[], can: (p?: string) => boolean): MenuEntry[] {
  return items
    .map(i => ({
      ...i,
      children: i.children ? filterByPerm(i.children, can) : undefined,
    }))
    .filter(i => {
      const selfOk = can(i.perm);
      const hasChildren = (i.children?.length ?? 0) > 0;
      return selfOk || hasChildren;
    });
}

export function buildPanelMenu(entries: MenuEntry[]): MenuItem[] {
  const { can } = useAbility();
  const allowed = filterByPerm(entries, can);

  const toMenuItem = (e: MenuEntry): MenuItem => ({
    label: e.label,
    icon: e.icon,
    items: e.children?.map(toMenuItem),
    command: e.route ? () => router.visit(route(e.route as any)) : undefined
    
  });

  return allowed.map(toMenuItem);
}
