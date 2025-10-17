import type { RouteName } from 'ziggy-js';

export interface MenuEntry {
  label: string;
  icon?: string;             // ej: 'pi pi-users'
  route?: RouteName;         // nombre de ruta Ziggy
  perm?: string;             // permiso spatie requerido (opcional)
  children?: MenuEntry[];    // submenús
}