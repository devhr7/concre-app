import type { MenuEntry } from '@/types/menu';

export default {
  key: 'gth',
  title: 'Gestión Humana',
  menu: <MenuEntry[]>[
    {
      label: 'Empleados',
      icon: 'pi pi-id-card',
      perm: '',
    },
    {
      label: 'Nómina',
      perm: '',
      children: [
        {
          label: 'Liq Horas Extras',
          perm: '',
        },
        {
          label: 'Novedades',
          perm: '',
        },
        {
          label: 'Nómina',
          perm: '',
        },
      ],
    },
    //
    {
      label: 'Config',
      perm: '',
      children: [
        {
          label: 'Organización',
          perm: '',
          children: [
            {
              label: 'Areas',
              perm: '',
            },
            {
              label: 'Cargos',
              perm: '',
            },
          ],
        },
        {
          label: 'Entidades',
          perm: '',
          children: [
            {
              label: 'EPS',
              perm: '',
            },
          ],
        },
      ],
    },
  ],
};
