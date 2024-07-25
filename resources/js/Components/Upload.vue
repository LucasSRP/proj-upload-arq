<script setup>
import { computed, onMounted, onUnmounted, ref, watch } from 'vue';
import axios from 'axios';

const active = defineModel('active', { default: false });
const hidden = defineModel('hidden', { default: true });
const img = defineModel('img', { default: null });
const preview = ref();

const dragover = (e) => {
    e.preventDefault();
    active.value = true;
};

const dragleave = (e) => {
    e.preventDefault();
    active.value = false;
};

const drop = (e) => {
    e.preventDefault();
    active.value = false;
    let file = e.dataTransfer.files[0];
    displayPreview(file);
};

const displayPreview = (file) => {
    let reader = new FileReader();
    reader.readAsDataURL(file);
    reader.onload = () => {
        img.value = reader.result;
        hidden.value = false;
    }
};

const getImage = (e) => {
    let file = e.target.files[0];
    displayPreview(file);
};

const clear = () => {
    img.value = null;
    hidden.value = true;
};



</script>

<template>

    <div class="flex justify-center">
        <div :class="`w-[400px] relative border-2 border-gray-300 border-dashed rounded-lg p-6 ${active ? 'border-indigo-600' : ''}`"
            @dragover="dragover" @dragleave="dragleave" @drop="drop" id="dropzone">
            <input @change="getImage" type="file" class="absolute inset-0 w-full h-full opacity-0 z-50" />
            <div class="text-center ">
                <img class="mx-auto h-12 w-12" src="https://www.svgrepo.com/show/357902/image-upload.svg" alt="">

                <h3 class="mt-2 text-sm font-medium text-gray-900">
                    <label for="file-upload" class="relative cursor-pointer text-white">
                        <span>Arraste e solte aqui</span>
                        <span class="text-indigo-600"> ou navegue</span>
                        <span>para o upload</span>
                        <input id="file-upload" name="file-upload" type="file" class="sr-only">
                    </label>
                </h3>
                <p class="mt-1 text-xs text-gray-500">
                    PNG, JPG, GIF up to 10MB
                </p>
            </div>
            <img :src="img" :class="`mt-4 mx-auto max-h-40 ${hidden ? 'hidden' : 'block'}`" ref="preview" id="preview">
        </div>
    </div>
    <div class=" ">
            <button @click="clear" class="px-5 py-5 bg-blue-400 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 mb-10">
                remover
            </button>
        </div>

</template>
