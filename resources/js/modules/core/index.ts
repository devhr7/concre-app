import type { MenuEntry } from '@/types/menu';

export default {
    key: 'core',
    title: 'Config',
    menu: <MenuEntry[]>[

        {
            label: 'Empresa',
            children: [
                {
                    label: 'Sede',
                    //icon: 'pi pi-id-card',
                    route: 'org.sede.index',
                    perm: '',
                },
                {
                    label: 'Sucursal',
                    //icon: 'pi pi-id-card',
                    route: 'org.sucursal.index',
                    perm: '',
                },
                {
                    label: 'Planta',
                    //icon: 'pi pi-id-card',
                    route: 'org.planta.index',
                    perm: '',
                }
            ],
        },
        //
        {
            label: 'Usuarios',
            icon: 'pi pi-users',
            //route: '',
            perm: '',
        },
        // Ubicacion
        {
            label: 'Ubicación',
            children: [
                {
                    label: 'Departamento',
                    //icon: 'pi pi-id-card',
                    route: 'geo.departamentos.index',
                    perm: '',
                },
                {
                    label: 'Municipio',
                    //icon: '',
                    route: 'geo.municipio.index',
                    perm: '',
                }
            ],
        }
    ],
};
