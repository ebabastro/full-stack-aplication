<template>
  <PageComponent>
    <ModalFormTrabajadorComponent :open="modal" @clicked="modal = false">
    </ModalFormTrabajadorComponent>

    <div class="flex justify-center container vue">
      <div
        v-if="trabajador.length"
        class="bg-white shadow overflow-hidden sm:rounded-lg w-[75%]"
      >
        <div class="px-4 py-5 sm:px-6 flex-col">
          <div
            class="flex justify-start mb-9 group relative"
            @click="router.push({ name: 'BuscarTrabajador' })"
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
                Información del trabajador
              </h3>
              <p class="mt-1 max-w-2xl text-sm text-gray-500">
                Detalles personales y de ubicación.
              </p>
            </div>
            <div class="py-2 flex justify-end">
              <button
                @click="modal = true"
                type="button"
                class="text-white bg-red-800 hover:bg-red-900 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-md px-5 py-2.5 text-center inline-flex items-center mr-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"
              >
                <UserAddIcon class="w-5 h-5 mr-2 -ml-1" />
                Crear Usuario
              </button>
            </div>
          </div>
        </div>
        <div class="border-t border-gray-200">
          <dl v-for="campo in trabajador" :key="campo.id">
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
                Labor
              </dt>
              <dd v-if="campo.docente != 1" class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2 flex">
                No docente
              </dd>
              <dd v-else class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2 flex">
                Docente
              </dd>
            </div>
            <div
              class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
            >
              <dt class="text-md font-medium text-gray-500">
                Categoría Ocupacional
              </dt>
              <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">
                {{ campo.cate_ocupa }}
              </dd>
            </div>
            <div
              class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
            >
              <dt class="text-md font-medium text-gray-500">
                Categoría Docente Investigativa
              </dt>
              <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">
                {{ campo.cate_di }}
              </dd>
            </div>
            <div
              class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
            >
              <dt class="text-md font-medium text-gray-500">
                Grado Científico
              </dt>
              <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">
                {{ campo.grado_cientifico }}
              </dd>
            </div>
            <div
              class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
            >
              <dt class="text-md font-medium text-gray-500">
                Área
              </dt>
              <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">
                {{ campo.area }}
              </dd>
            </div>
            <div
              class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
            >
              <dt class="text-md font-medium text-gray-500">
                Cargo
              </dt>
              <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">
                {{ campo.cargo }}
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
import ModalFormTrabajadorComponent from "../components/ModalFormTrabajadorComponent.vue";
import { computed, ref } from "@vue/reactivity";
import store from "../store";
import { onMounted } from "@vue/runtime-core";

// let showForm = ref(false);

let modal = ref(false);

const trabajador = computed(() => store.state.trabajador);

const user = {
  ci: "",
  username: "",
  password: "",
  password_confirmation: "",
};

function createUserTrabajador(ev) {
  ev.preventDefault();
  store.dispatch("createUserTrabajador", user);
}
</script>

<style></style>
