import { useAuthStore } from '@/stores/auth.store';

export function useAbility() {
  const auth = useAuthStore();
  const can = (perm?: string) => !perm || auth.can(perm);
  return { can };
}