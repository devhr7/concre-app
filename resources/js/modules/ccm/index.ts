import type { MenuEntry } from '@/types/menu';

export default {
  key: 'crm',
  title: 'Comercial',
  menu: <MenuEntry[]>[
    { label: 'Clientes', icon: 'pi pi-users', route: 'crm.clientes.index', perm: 'crm.clientes.view' },
    { label: 'Obras', icon: 'pi pi-building', route: 'crm.obras.index', perm: 'crm.obras.view' },
    {
      label: 'Pedidos',
      icon: 'pi pi-inbox',
      children: [
        { label: 'Radicación', route: 'crm.pedidos.radicacion.index', perm: 'crm.pedidos.radicacion.view' },
        { label: 'Cotizaciones', route: 'crm.cotizaciones.index', perm: 'crm.cotizaciones.view' },
      ],
    },
  ],
};
