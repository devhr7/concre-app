<script setup lang="ts">
import AuthenticatedSessionController from '@/actions/App/Http/Controllers/Auth/AuthenticatedSessionController';
import InputError from '@/components/InputError.vue';
import TextLink from '@/components/TextLink.vue';
import { Button } from '@/components/ui/button';
import { Checkbox } from '@/components/ui/checkbox';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import AuthBase from '@/layouts/AuthLayout.vue';
import { register } from '@/routes';
import { request } from '@/routes/password';
import { Form, Head } from '@inertiajs/vue3';
import { LoaderCircle } from 'lucide-vue-next';
import { RadioGroup, RadioGroupItem } from '@/components/ui/radio-group';


defineProps<{
    status?: string;
    canResetPassword: boolean;
}>();
</script>

<template>
    <AuthBase title="Iniciar Sesion" description="inicia sesion con el usuario y la contraseña">

        <Head title="Iniciar Sesion" />

        <div v-if="status" class="mb-4 text-center text-sm font-medium text-green-600">
            {{ status }}
        </div>

        <Form v-bind="AuthenticatedSessionController.store.form()" :reset-on-success="['password']"
            v-slot="{ errors, processing }" class="flex flex-col gap-6">
            <div class="grid gap-6">
                <div class="grid gap-2">
                    <Label for="login">Usuario</Label>
                    <Input id="login" type="string" name="login" required autofocus :tabindex="1" autocomplete="login"
                        placeholder="email / identificacion" />
                    <InputError :message="errors.login" />
                </div>

                <div class="grid gap-2">
                    <div class="flex items-center justify-between">
                        <Label for="password">Contraseña</Label>
                      
                    </div>
                    <Input id="password" type="password" name="password" required :tabindex="2"
                        autocomplete="current-password" placeholder="Password" />
                    <InputError :message="errors.password" />
                </div>
                <!-- en  columnas en una fila -->
                <div class="flex items-center justify-between">
                    <RadioGroup default-value="empleado" name="role">
                        <div class="grid grid-cols-3 gap-4 w-full">
                            <div class="flex items-center space-x-2">
                                <RadioGroupItem id="cliente" value="cliente" />
                                <Label for="cliente">Cliente</Label>
                            </div>
                            <div class="flex items-center space-x-2">
                                <RadioGroupItem id="empleado" value="empleado" />
                                <Label for="empleado">Empleado</Label>
                            </div>
                            <div class="flex items-center space-x-2">
                                <RadioGroupItem id="proveedor" value="proveedor" />
                                <Label for="proveedor">Proveedor</Label>
                            </div>
                        </div>
                    </RadioGroup>
                </div>
                <!--  boton de color  004200-->
                <Button type="submit" class="mt-4 w-full bg-[#004200] text-white hover:bg-[#005700]" :tabindex="4" :disabled="processing">
                    <LoaderCircle v-if="processing" class="h-4 w-4 animate-spin" />
                    Iniciar Sesion
                </Button>
            </div>

         
        </Form>
    </AuthBase>
</template>
