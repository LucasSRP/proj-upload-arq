<script setup>
import Upload from '@/Components/Upload.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>

  <Head title="admin" />

  <AuthenticatedLayout>
    <template #header>
      <!-- <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Dashboard</h2> -->
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 text-gray-900 dark:text-gray-100 text-center text-5xl">Selecione os arquivos para upload</div>
        </div>
      </div>
    </div>
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-">
        <div
          class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-1g text-center text-5xl items-center px-4 py-2">
          <div class="grid grid-cols-3 gap-4"></div>
          <p class="text-center text-white font-bold grid grid-cols-1 gap-40">Arraste e solte seus arquivos aqui ou
            clique
            para</p>

          <div class="p-20 text-gray-900 dark:text-gray-100"></div>
          <Upload class="inline-flex items-center mt-8"></Upload>
          <section>
          </section>
        </div>
      </div>

      <div class="max-w-7xl mx-auto sm:px-6 lg:px- mt-24">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-1g text-2xl">
          <p class=" text-white font-semibold">
            Bem-vindo(a) ao <strong class="text-blue-400">FileUpload 🚀</strong>
            <br>
            <br>
            Fazer upload de arquivos gratuitamente: é rápido, fácil e seguro
            <br>
            <br>
            Serviço de armazenamento e compartilhamento de arquivos em nuvem sem necessidade de cadastro.
            Use o <strong class="text-blue-400">FileUpload</strong> para hospedar e armazenar seus arquivos e/ou para
            compartilhá-los com apenas alguns cliques.
            <br>
            <br>
            Todos os tipos de arquivos são aceitos (arquivos, imagens, vídeos, áudios, documentos pdf, etc) e você pode
            arrastá-los e soltá-los diretamente em nossa interface ou clicar no botão "Carregar arquivos".
            <br>
            <br>
            Ao utilizar o <strong class="text-blue-400">FileUpload</strong> gratuitamente para enviar seus documentos,
            fotos
            ou vídeos, a quantidade e a velocidade dos downloads não são limitadas e todos os recursos que oferecemos
            são
            gratuitos.
            <br>
            <br>
            Experimente e opte por nossa solução de armazenamento e hospedagem de arquivos em Nuvem ☁️!
          </p>

          <div class="inline-flex items-center mt-8">

          </div>
        </div>
      </div>

    </div>
  </AuthenticatedLayout>
</template>
