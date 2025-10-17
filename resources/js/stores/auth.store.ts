import { defineStore } from 'pinia';

export interface UserPayload {
  id: number|string;
  name: string;
  email: string;
  permissions?: string[];
  roles?: Array<{ id: number|string; name: string }>;
}

export const useAuthStore = defineStore('auth', {
  state: () => ({
    user: null as UserPayload | null,
    ready: false,
  }),
  getters: {
    isLogged: (s) => !!s.user,
    can:      (s) => (perm: string) => s.user?.permissions?.includes(perm) ?? false,
    hasRole:  (s) => (role: string) => s.user?.roles?.some(r => r.name === role) ?? false,
  },
  actions: {
    setUser(payload: UserPayload | null) {
      this.user = payload;
      this.ready = true;
    },
  },
});
