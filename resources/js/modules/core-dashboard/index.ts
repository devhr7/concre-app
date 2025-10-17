import type { MenuEntry } from '@/types/menu';

export default {
  key: 'core-dashboard',
  title: 'Dashboard',
  menu: <MenuEntry[]>[
    {
      label: 'Dashboard',
      icon: 'pi pi-home',
      route: 'dashboard',
      perm: '',
    },
  ],
};
