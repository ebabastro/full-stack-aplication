<!-- This example requires Tailwind CSS v2.0+ -->
<template>
  <ModalComponent :open="modal" :msg="msg" @clicked="closeModal" :error="error">
    <template v-slot:modal-header>
      {{status}}
    </template>
  </ModalComponent>
  <TransitionRoot as="template" :show="open">
    <Dialog as="div" class="fixed z-10 inset-0 overflow-y-auto">
      <div
        class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0"
      >
        <TransitionChild
          as="template"
          enter="ease-out duration-300"
          enter-from="opacity-0"
          enter-to="opacity-100"
          leave="ease-in duration-200"
          leave-from="opacity-100"
          leave-to="opacity-0"
        >
          <DialogOverlay
            class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
          />
        </TransitionChild>

        <!-- This element is to trick the browser into centering the modal contents. -->
        <span
          class="hidden sm:inline-block sm:align-middle sm:h-screen"
          aria-hidden="true"
          >&#8203;</span
        >
        <TransitionChild
          as="template"
          enter="ease-out duration-300"
          enter-from="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
          enter-to="opacity-100 translate-y-0 sm:scale-100"
          leave="ease-in duration-200"
          leave-from="opacity-100 translate-y-0 sm:scale-100"
          leave-to="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        >
          <div
            class="relative inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
          >
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
              <div class="flex justify-end p-2">
                <button
                  @click="$emit('clicked', false)"
                  type="button"
                  class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                >
                  <svg
                    class="w-5 h-5"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      fill-rule="evenodd"
                      d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                      clip-rule="evenodd"
                    ></path>
                  </svg>
                </button>
              </div>
              <div class="sm:flex sm:items-start pr-3">
                <div
                  class="w-full px-4 text-center sm:mt-0 sm:ml-4 sm:text-left"
                >
                  <DialogTitle
                    as="h3"
                    class="text-lg leading-6 font-medium text-gray-900 w-full"
                  >
                    <form
                      @submit="createUser"
                      class="px-1 pb-4 w-full space-y-3 lg:px-2 sm:pb-6 xl:pb-8"
                      action="#"
                    >
                      <div>
                        <label
                          for="username"
                          class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                          >Nombre de usuario</label
                        >
                        <input
                          v-model="user.username"
                          type="input"
                          name="username"
                          id="username"
                          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-800 focus:border-red-800 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                          placeholder=""
                          required
                        />
                      </div>
                      <div>
                        <label
                          for="password"
                          class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                          >Contraseña</label
                        >
                        <input
                          v-model="user.password"
                          type="password"
                          name="password"
                          id="password"
                          placeholder=""
                          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-800 focus:border-red-800 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                          required
                        />
                      </div>
                      <div>
                        <label
                          for="password_confirmation"
                          class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                          >Confirmar contraseña</label
                        >
                        <input
                          v-model="user.password_confirmation"
                          type="password"
                          name="password_confirmation"
                          id="password_confirmation"
                          placeholder=""
                          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-800 focus:border-red-800 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                          required
                        />
                      </div>

                      <button
                        type="submit"
                        class="w-full mt-9 text-white bg-red-800 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"
                      >
                        Crear
                      </button>
                    </form>
                  </DialogTitle>
                </div>
              </div>
            </div>
            <div
              class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse"
            >
              <!-- <button
                type="button"
                class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-800 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                @click="clicked"
                ref="cancelButtonRef"
              >
                Cancelar
              </button> -->
            </div>
          </div>
        </TransitionChild>
      </div>
    </Dialog>
  </TransitionRoot>
</template>

<script setup>
import {
  Dialog,
  DialogOverlay,
  DialogTitle,
  TransitionChild,
  TransitionRoot,
} from "@headlessui/vue";
import { ExclamationIcon, UserIcon } from "@heroicons/vue/outline";
import store from "../store";
import { computed, ref } from "@vue/reactivity";
import ModalComponent from "./ModalComponent.vue";

const props = defineProps({
  open: Boolean,
});
const estudiante = computed(() => store.state.estudiante);
let user = {
  ci: "",
  username: "",
  password: "",
  password_confirmation: "",
};
let msg = ref("");
let error = ref(false);
let modal = ref(false);
let status = ref("");

function closeModal() {
  modal.value = false;
}

function createUser(ev) {
  ev.preventDefault();
  store
    .dispatch("createUserEstudiante", user).then((msg) => {
      msg.value = "";
      error.value = false;
      status.value = 'Usuario añadido con éxito';
      modal.value = true;
    })
      .catch((err) => {
        msg.value = err.response.data.message;
        status.value = "Error durante la creación de usuario";
        error.value = true;
        modal.value = true;
  });
}

// export default {
//   props: {
//     open: Boolean,
//   },
//   components: {
//     Dialog,
//     DialogOverlay,
//     DialogTitle,
//     TransitionChild,
//     TransitionRoot,
//     ExclamationIcon,
//   },
//   emits: ["clicked"],
//   methods: {
//     clicked() {
//       this.$emit("clicked", false);
//     },
//   },
// };
</script>
