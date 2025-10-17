import type { MenuEntry } from '@/types/menu';

export default {
  key: 'pcm',
  title: 'Produccion',
  menu: <MenuEntry[]>[
    {
      label: 'Bascula',
      icon: 'pi pi-id-card',
      perm: '',
      children: [
 {
      label: 'Registro Pesaje',
      perm: '',
      route: 'pcm.bascula.registrobascula.index',
    },
    {
        label: 'Lista precios MP',
        perm: '',
    }
      ],
    },
   
    //
    {
      label: 'Config',
      perm: '',
      children: [
        {
          label: 'Proveedores',
          perm: '',
          children: [
            {
              label: 'Proveedor',
              perm: '',
            },
            {
              label: 'Vehiculo',
              perm: '',
            },
          ],
        },
        
        
      ],
    },
  ],
};
