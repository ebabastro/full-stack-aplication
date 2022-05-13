<template>
  <PageComponent>
    <ModalFormEstudianteComponent :open="modal" @clicked="modal = false">
    </ModalFormEstudianteComponent>

    <div class="flex justify-center container vue">
      <div
        v-if="estudiante"
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
            <div v-if="permiso" class="py-2 flex justify-end">
              <button
                @click="modal = true"
                type="button"
                class="text-white bg-red-800 hover:bg-red-900 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-md px-5 py-2.5 text-center inline-flex items-center mr-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"
              >
                <UserAddIcon class="w-5 h-5 mr-2 -ml-1" />
                Crear Usuario
              </button>
            </div>
            <div v-else>
              No tienes permiso
            </div>
          </div>
        </div>
        <div class="border-t border-gray-200">
          <dl v-if="estudiante">
            <div
              class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
            >
              <dt class="text-md font-medium text-gray-500">
                Carnet de Identidad
              </dt>
              <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">
                {{ estudiante.ci }}
              </dd>
            </div>
            <div
              class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
            >
              <dt class="text-md font-medium text-gray-500">Nombre Completo</dt>
              <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">
                {{ estudiante.full_name }}
              </dd>
            </div>
            <div
              class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
            >
              <dt class="text-md font-medium text-gray-500">
                Dirección Particular
              </dt>
              <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">
                {{ estudiante.address }}
              </dd>
            </div>

            <div
              class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
            >
              <dt class="text-md font-medium text-gray-500">Teléfono</dt>
              <dd
                v-if="!estudiante.phone"
                class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2"
              >
                ----
              </dd>
              <dd
                v-else
                class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2"
              >
                {{ estudiante.phone }}
              </dd>
            </div>
            <div
              class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
            >
              <dt class="text-md font-medium text-gray-500">
                Ubicación Escolar
              </dt>
              <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2 flex">
                {{ estudiante.ubicacion_escolar }}
              </dd>
            </div>
            <div
              class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
            >
              <dt class="text-md font-medium text-gray-500">Carrera</dt>
              <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">
                {{ estudiante.carrera }}
              </dd>
            </div>
            <div
              class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
            >
              <dt class="text-md font-medium text-gray-500">Tipo de Curso</dt>
              <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">
                {{ estudiante.tipo_curso }}
              </dd>
            </div>
            <div
              class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
            >
              <dt class="text-md font-medium text-gray-500">Año</dt>
              <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">
                {{ estudiante.anno }}
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
import PageComponent from "../components/PageComponent.vue";
import ModalFormEstudianteComponent from "../components/ModalFormEstudianteComponent.vue";
import { computed, ref } from "@vue/reactivity";
import store from "../store";
import { onMounted } from "@vue/runtime-core";

let modal = ref(false);
let permiso = ref(false);
const estudiante = computed(() => store.state.estudiante);
const informatico = computed(() => store.state.user.data.area);

onMounted(() => {
  let area_estudiante = estudiante._value.ubicacion_escolar.replace(/\s+/g, '');
  let area_informatico = informatico.value.replace(/\s+/g, '');

  // console.log(area_informatico);
  if(informatico.value == "GENERAL" || area_estudiante == area_informatico){
    permiso.value = true
    // return permiso;
    
  }
  else {
    permiso.value = false;
    // return permiso;
    
  }
  // console.log(area_estudiante)
})

const user = {
  ci: "",
  username: "",
  password: "",
  password_confirmation: "",
};

function createUserEstudiante(ev) {
  ev.preventDefault();
  store.dispatch("createUserEstudiante", user);
}
</script>

<style></style>
