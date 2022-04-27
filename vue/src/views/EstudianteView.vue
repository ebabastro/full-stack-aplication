<template>
  <PageComponent>
    <ModalFormComponent :open="modal" @clicked="modal=false" > </ModalFormComponent>

    <div class="flex justify-center container vue">
      <div
        v-if="estudiante.length"
        class="bg-white shadow overflow-hidden sm:rounded-lg w-[75%]"
      >

        <div class="px-4 py-5 sm:px-6 flex-col">
          <div
            class="flex justify-start mb-9 group relative"
            @click="router.push({ name: 'BuscarEstudiante' })"
          >
            <span
              class="justify-start text-gray-700 cursor-pointer group-hover:text-red-800 focus:ring-4 focus:outline-none focus:ring-rose-300"
            >
              <ArrowNarrowLeftIcon class="h-4 w-4 justify-end" />
            </span>
            <button class="text-xs h-0 text-gray-400 group-hover:text-red-900">
              Regresar
            </button>
          </div>
          <div class="flex justify-between">
            <div class="justify-between">
              <h3 class="text-xl leading-6 font-medium text-gray-900">
                Información de estudiante
              </h3>
              <p class="mt-1 max-w-2xl text-sm text-gray-500">
                Detalles personales y de ubicación.
              </p>
            </div>
            <div class="py-2 flex justify-end">
              <button
                @click="modal=true"
                type="button"
                class="text-white bg-red-800 hover:bg-red-900 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-md px-5 py-2.5 text-center inline-flex items-center mr-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"
              >
                <UserAddIcon  class="w-5 h-5 mr-2 -ml-1" />
                Crear Usuario
              </button>
            </div>
          </div>
        </div>
        <div class="border-t border-gray-200">
          <dl v-for="campo in estudiante" :key="campo.id">
            <div
              class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
            >
              <dt class="text-md font-medium text-gray-500">
                Carnet de Identidad
              </dt>
              <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">
                {{ campo.ci }}
              </dd>
            </div>
            <div
              class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
            >
              <dt class="text-md font-medium text-gray-500">Nombre Completo</dt>
              <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">
                {{ campo.full_name }}
              </dd>
            </div>
            <div
              class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
            >
              <dt class="text-md font-medium text-gray-500">
                Dirección Particular
              </dt>
              <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">
                {{ campo.address }}
              </dd>
            </div>

            <div
              class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
            >
              <dt class="text-md font-medium text-gray-500">Teléfono</dt>
              <dd
                v-if="!campo.phone"
                class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2"
              >
                ----
              </dd>
              <dd
                v-else
                class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2"
              >
                {{ campo.phone }}
              </dd>
            </div>
            <div
              class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
            >
              <dt class="text-md font-medium text-gray-500">
                Ubicación Escolar
              </dt>
              <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2 flex">
                {{ campo.ubicacion_escolar }}
              </dd>
            </div>
            <div
              class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
            >
              <dt class="text-md font-medium text-gray-500">Carrera</dt>
              <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">
                {{ campo.carrera }}
              </dd>
            </div>
            <div
              class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
            >
              <dt class="text-md font-medium text-gray-500">Tipo de Curso</dt>
              <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">
                {{ campo.tipo_curso }}
              </dd>
            </div>
            <div
              class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
            >
              <dt class="text-md font-medium text-gray-500">Año</dt>
              <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">
                {{ campo.anno }}
              </dd>
            </div>
          </dl>
        </div>
      </div>
    </div>
  </PageComponent>
</template>

<script setup>
import router from "../router";
import { UserAddIcon, ArrowNarrowLeftIcon } from "@heroicons/vue/solid";
import { ArrowCircleLeftIcon } from "@heroicons/vue/outline";
import PageComponent from "../components/PageComponent.vue";
import ModalFormComponent from "../components/ModalFormComponent.vue";
import { computed, ref } from "@vue/reactivity";
import store from "../store";
import { onMounted } from "@vue/runtime-core";

// let showForm = ref(false);

let modal = ref(false);

const estudiante = computed(() => store.state.estudiante);

const user = {
    ci: "",
    username : "",
    password: "",
    password_confirmation: "",
};

function createUser(ev) {
    ev.preventDefault();
    store.dispatch('createUser', user);
}


</script>

<style></style>
