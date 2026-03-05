<script  setup>
    import AppLayout from "@/Layouts/Vristo/AppLayout.vue";
    import { ref, onMounted, computed, nextTick } from 'vue';
    import { Link, useForm, router, usePage } from '@inertiajs/vue3';
    import IconSend from '@/Components/vristo/icon/icon-send.vue';
    import IconSquareRotated from '@/Components/vristo/icon/icon-square-rotated.vue';
    import IconTrash from '@/Components/vristo/icon/icon-trash.vue';
    import IconEdit from '@/Components/vristo/icon/icon-edit.vue';
    import IconFilePdf from '@/Components/vristo/icon/icon-file-pdf.vue';
    import IconVideo from '@/Components/vristo/icon/icon-video.vue';
    import IconFile from '@/Components/vristo/icon/icon-file.vue';
    import IconX from '@/Components/vristo/icon/icon-x.vue';
    import InputError from '@/Components/InputError.vue';
    import Swal2 from 'sweetalert2';
    import { TransitionRoot, TransitionChild, Dialog, DialogPanel, DialogOverlay } from '@headlessui/vue';

    const props = defineProps({
        course: {
            type: Object,
            default: () => ({}),
        },
        module: {
            type: Object,
            default: () => ({}),
        }
    });

    const page = usePage();
    const themeSelected = ref(null);
    const displayModalVideo = ref(false);
    const videoSelected = ref(null);

    const default_theme_id = ref(null);
    const contentsData = ref(null);
    const commentsData = ref(null);

    if(props.module.themes && props.module.themes.length > 0){
        default_theme_id.value = props.module.themes[0].id;
        contentsData.value = props.module.themes[0].contents;
        getComment(default_theme_id.value);
        //commentsData = props.module.themes[0].comments;
    }

    const formComment = useForm({
        theme_id:  default_theme_id.value,
        message: null
    });

    const openSelectedVideo = (video) => {
        displayModalVideo.value = true;
        videoSelected.value = modifiedContent(video.content);
        saveStudentHistory(video);
    }

    const closeSelectedVideo = () => {
        displayModalVideo.value = false;
        videoSelected.value = null;
    }

    const newHeight = ref(280);

    const modifiedContent = (content) => {
        // Copia el contenido original
        let modifiedContent = content;

        // Realiza la sustitución de la altura con un valor dinámico
        //modifiedContent = modifiedContent.replace(/height="\d+"/g, `height="${newHeight.value}"`);
        modifiedContent = modifiedContent.replace(/width="\d+"/g, `width="100%"`);
        return modifiedContent;
    };

    const comments = ref([]);
    const commentsLoading = ref(false);

    const getComment = (id) => {
        commentsLoading.value = true;
        axios.get(route('aca_lesson_comments',id)).then((res) => {
            return res.data.comments;
        }).then((data) =>{
            commentsData.value = data
            commentsLoading.value = false
        });
    }

    const createComment = () => {
        formComment.post(route('aca_lesson_comments_store'), {
            errorBag: 'createComment',
            preserveScroll: true,
            onSuccess: () => {
                showMessage('El comentario se registró correctamente.');
                getComment(formComment.theme_id)
                formComment.message = null;
            },
        });
    }

    const activeEditComment = (index) => {
        commentsData.value[index]['edit_status'] = true;
        nextTick(() => {
            document.getElementById('ctnTextarea' + index)?.focus();
        });
    }

    const editComment = (comment, index) => {
        commentsData.value[index]['loading'] = true;
        axios.put(route('aca_lesson_comments_update',comment.id),comment).then((res) => {
            commentsData.value[index]['loading'] = false;
            commentsData.value[index]['edit_status'] = false;
        }).then(() =>{
            showMessage('El comentario se actualizó correctamente.');
        });
    }

    const showMessage = (msg = '', type = 'success') => {
        const toast = Swal2.mixin({
            toast: true,
            position: 'top',
            showConfirmButton: false,
            timer: 3000,
            customClass: { container: 'toast' },
        });
        toast.fire({
            icon: type,
            title: msg,
            padding: '10px 20px',
        });
    };

    const destroyComment = (comment,index) => {
        Swal2.fire({
            title: '¿Estas seguro?',
            text: "¡No podrás revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '¡Sí, Eliminar!',
            cancelButtonText: 'Cancelar',
            showLoaderOnConfirm: true,
            padding: '2em',
            customClass: 'sweet-alerts',
            preConfirm: () => {
                return axios.delete(route('aca_lesson_comments_destroy', comment.id)).then((res) => {
                    if (!res.data.success) {
                        Swal2.showValidationMessage(res.data.message)
                    }
                    return res
                });
            },
            allowOutsideClick: () => !Swal2.isLoading()
        }).then((result) => {
            if (result.isConfirmed) {
                commentsData.value.splice(index,1);
                Swal2.fire({
                    title: 'Enhorabuena',
                    text: 'Se Eliminó correctamente',
                    icon: 'success',
                    padding: '2em',
                    customClass: 'sweet-alerts',
                });
                getComment(formComment.theme_id);
            }
        });
    }

    const baseUrl = assetUrl;

    const getImage = (path) => {
        return baseUrl + 'storage/'+ path;
    }

    const selectedTab = ref(default_theme_id.value);

    const selectTheme = (theme) => {
        contentsData.value = theme.contents;
        selectedTab.value = theme.id
        themeSelected.value = theme;
        formComment.theme_id = theme.id
        // Para la nueva UI, también se actualiza el tema seleccionado
        selectThemeNewUI(theme);
        getComment(theme.id);
    }

    const getPath = (path) => {
        return baseUrl + 'storage/'+ path;
    }

    const originalSaveStudentHistory = (content) => {
        let history = {
            course_id: props.course.id,
            module_id: props.module.id,
            theme_id: content.theme_id,
            content_id: content.id,
            type_content: content.is_file,
            student_id: page.props.auth.user.id
        }

        axios.post(route('aca_students_history_store'), history);

        // Hook para la nueva UI
        updateContentCompletionStatus(content);
    }

    const openExamSolve = (content,title = 'Exam', w = 800, h = 600) => {

        const url = route('aca_student_exam_solve',content.id);
        const left = (window.innerWidth / 2) - (w / 2);
        const top = (window.innerHeight / 2) - (h / 2);

        const popup = window.open('', title, `width=${w},height=${h},top=${top},left=${left},scrollbars=yes`);

        if (popup) {
            popup.document.write(`
            <html><head><title>Cargando...</title></head>
            <body style="display:flex;align-items:center;justify-content:center;height:100vh;">
                <div>🔄 Cargando contenido...</div>
            </body></html>
            `);
            popup.document.close();

            // Redirige al contenido real
            popup.location.href = url;
        }
    }

    // =================================================================
    // =========== INICIO: LÓGICA PARA NUEVA PROPUESTA DE UX ===========
    // =================================================================

    // Estado para la nueva UI
    const themesWithProgress = ref([]);
    const selectedThemeNewUI = ref(null);
    const activeContent = ref(null); // Contenido actualmente expandido en el acordeón

    // Historial local para simular el progreso
    const studentHistoryLocal = ref([]);

    // Función para procesar los temas y añadirles el estado de progreso
    const initializeNewUI = () => {
        if (!props.module || !props.module.themes) return;

        themesWithProgress.value = props.module.themes.map(theme => {
            const processedContents = theme.contents.map(content => ({
                ...content,
                completed: studentHistoryLocal.value.some(h => h.content_id === content.id),
                isExpanded: false,
            }));

            const completedCount = processedContents.filter(c => c.completed).length;

            return {
                ...theme,
                contents: processedContents,
                completedCount: completedCount,
                progress: theme.contents.length > 0 ? (completedCount / theme.contents.length) * 100 : 0
            };
        });

        // Seleccionar el primer tema por defecto para la nueva UI
        if (themesWithProgress.value.length > 0) {
            selectedThemeNewUI.value = themesWithProgress.value[0];
        }
    };

    // Seleccionar un tema en la nueva UI
    const selectThemeNewUI = (theme) => {
        selectedThemeNewUI.value = themesWithProgress.value.find(t => t.id === theme.id);
        activeContent.value = null; // Cierra cualquier acordeón abierto
        // También actualizamos la UI original para mantener consistencia
        selectedTab.value = theme.id;
        contentsData.value = theme.contents;
        formComment.theme_id = theme.id;
        getComment(theme.id);
    };

    // Abrir/Cerrar el acordeón de un contenido
    const toggleContentAccordion = (content) => {
        // Si ya está abierto, ciérralo
        if (activeContent.value && activeContent.value.id === content.id) {
            activeContent.value.isExpanded = false;
            activeContent.value = null;
            return;
        }

        // Cierra el que estaba abierto anteriormente
        if (activeContent.value) {
            activeContent.value.isExpanded = false;
        }

        // Abre el nuevo y marca como visto
        content.isExpanded = true;
        activeContent.value = content;
        saveStudentHistory(content); // Marca como visto al abrir

        // Carga los comentarios para el tema (demostración)
        getComment(content.theme_id);
    };

    // Actualizar el estado de completado
    const updateContentCompletionStatus = (contentToUpdate) => {
        // Añade al historial local para simulación si no está
        if (!studentHistoryLocal.value.some(h => h.content_id === contentToUpdate.id)) {
            studentHistoryLocal.value.push({ content_id: contentToUpdate.id });
        }

        const theme = themesWithProgress.value.find(t => t.id === contentToUpdate.theme_id);
        if (theme) {
            const content = theme.contents.find(c => c.id === contentToUpdate.id);
            if (content && !content.completed) {
                content.completed = true;
                // Recalcular progreso del tema
                const completedCount = theme.contents.filter(c => c.completed).length;
                theme.completedCount = completedCount;
                theme.progress = theme.contents.length > 0 ? (completedCount / theme.contents.length) * 100 : 0;
            }
        }
    };

    // Envolvemos la función original para añadirle la actualización de la nueva UI
    const saveStudentHistory = (content) => {
        originalSaveStudentHistory(content);
    };

    // Llamar a la inicialización en onMounted
    onMounted(() => {
        initializeNewUI();
    });

    // ===============================================================
    // =========== FIN: LÓGICA PARA NUEVA PROPUESTA DE UX ============
    // ===============================================================

</script>
<template>
    <AppLayout title="Mis Cursos">
        <ul class="flex space-x-2 rtl:space-x-reverse">
            <li>
                <a href="javascript:;" class="text-primary hover:underline">Académico</a>
            </li>
            <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                <Link :href="route('aca_mycourses')" class="text-primary hover:underline">Cursos</Link>
            </li>
            <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                <Link :href="route('aca_mycourses_lessons',course.id)" class="text-primary hover:underline">{{ course.description }}</Link>
            </li>
            <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                <span>{{ module.description }}</span>
            </li>
        </ul>
        <div class="pt-5 space-y-5 relative">
            <div class="max-w-[85rem] px-4 py-6 sm:px-6 lg:px-8 lg:py-8 mx-auto">
                <!-- Title -->
                <div class="max-w-2xl mx-auto text-center mb-6 lg:mb-8">
                    <h2 class="text-2xl font-bold md:text-2xl md:leading-tight dark:text-white">{{ course.description }}</h2>
                    <p class="mt-1 text-gray-600 dark:text-neutral-400">{{ module.description }}</p>
                </div>
                <!-- Profile -->
                <div class="flex justify-center">
                    <template v-if="module.teacher_id">
                        <div class="flex items-center gap-x-3 max-w-xl">
                            <div class="shrink-0">
                                <img v-if="module.teacher.person.image" class="shrink-0 size-16 rounded-full" :src="getImage(module.teacher.person.image)" alt="Avatar">
                                <img v-else :src="`https://ui-avatars.com/api/?name=${module.teacher.person.names}&size=150&rounded=true`" class="shrink-0 size-16 rounded-full" alt="avatar"/>
                            </div>

                            <div class="grow">
                                <h1 class="text-lg font-medium text-gray-800 dark:text-neutral-200">
                                    {{ module.teacher.person.full_name }}
                                </h1>
                                <p class="text-sm text-gray-600 dark:text-neutral-400">
                                    {{ module.teacher.person.presentacion }}
                                </p>
                            </div>
                        </div>
                    </template>
                    <template v-else>
                        <div v-if="course.teacher" class="flex items-center gap-x-3 max-w-xl">
                            <div class="shrink-0">
                                <img v-if="course.teacher.person.image" class="shrink-0 size-16 rounded-full" :src="getImage(course.teacher.person.image)" alt="Avatar">
                                <img v-else :src="`https://ui-avatars.com/api/?name=${course.teacher.person.names}&size=150&rounded=true`" class="shrink-0 size-16 rounded-full" alt="avatar"/>
                            </div>

                            <div class="grow">
                                <h1 class="text-lg font-medium text-gray-800 dark:text-neutral-200">
                                    {{ course.teacher.person.full_name }}
                                </h1>
                                <p class="text-sm text-gray-600 dark:text-neutral-400">
                                    {{ course.teacher.person.presentacion }}
                                </p>
                            </div>
                        </div>
                    </template>
                </div>
                <!-- End Profile -->
            </div>

            <div class="grid grid-cols-6 gap-4">
                <div class="panel col-span-6 sm:col-span-2">
                    <div class="flex justify-between items-center">
                        <h1 class="font-extrabold tracking-wider">Temas</h1>
                    </div>
                    <div class="flex flex-col mt-5 gap-4 text-sm">
                        <template v-for="(theme, index) in module.themes">
                            <div @click="selectTheme(theme)" class="cursor-pointer flex justify-between items-center p-3 rounded-sm shadow-sm hover:bg-white-dark/10 dark:hover:bg-[#181F32] font-medium ltr:hover:pl-3 rtl:hover:pr-3 duration-300 dark:bg-gray-700 dark:text-white"
                                :class="selectedTab === theme.id ? 'ltr:pl-3 rtl:pr-3 bg-gray-100 dark:bg-[#181F32] text-primary' : 'bg-yellow-50 text-success'">
                                <div class="flex items-center">
                                    <icon-square-rotated class=" fill-success shrink-0" />
                                    <div class="text-left ltr:ml-3 rtl:mr-3">
                                        {{ theme.description }}
                                    </div>
                                </div>
                                <span class="font-bold text-yellow-500">{{ theme.contents.length }}</span>
                            </div>
                        </template>
                    </div>
                </div>
                <div class="panel col-span-6 sm:col-span-4">
                    <div class="flow-root">
                        <div class="space-y-6">
                            <template v-for="(content, key) in contentsData">
                                <template v-if="content.is_file == 1">
                                    <div class="flex items-center p-3.5 rounded text-primary bg-primary-light dark:bg-primary-dark-light">
                                        <span class="ltr:mr-3 rtl:ml-3">
                                            <icon-file class="w-9 h-9 object-cover" />
                                        </span>
                                        <div class="flex-1">
                                            <div class="flex items-center space-x-4">
                                                <h6 class="flex-1 text-base font-semibold">
                                                    <strong class="ltr:mr-1 rtl:ml-1">Link de archivo: </strong>
                                                    {{ content.description }}
                                                </h6>
                                                <div>
                                                    <a
                                                        :href="content.content"
                                                        @click="originalSaveStudentHistory(content)"
                                                        target="_blank"
                                                        type="button"
                                                        class="btn btn-success btn-sm flex uppercase inline-block"
                                                    >
                                                        <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path fill="currentColor" d="M156.6 384.9L125.7 354c-8.5-8.5-11.5-20.8-7.7-32.2c3-8.9 7-20.5 11.8-33.8L24 288c-8.6 0-16.6-4.6-20.9-12.1s-4.2-16.7 .2-24.1l52.5-88.5c13-21.9 36.5-35.3 61.9-35.3l82.3 0c2.4-4 4.8-7.7 7.2-11.3C289.1-4.1 411.1-8.1 483.9 5.3c11.6 2.1 20.6 11.2 22.8 22.8c13.4 72.9 9.3 194.8-111.4 276.7c-3.5 2.4-7.3 4.8-11.3 7.2l0 82.3c0 25.4-13.4 49-35.3 61.9l-88.5 52.5c-7.4 4.4-16.6 4.5-24.1 .2s-12.1-12.2-12.1-20.9l0-107.2c-14.1 4.9-26.4 8.9-35.7 11.9c-11.2 3.6-23.4 .5-31.8-7.8zM384 168a40 40 0 1 0 0-80 40 40 0 1 0 0 80z"/>
                                                        </svg>
                                                        Ir al sitio
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </template>
                                <template v-else-if="content.is_file == 0">
                                    <div class="flex items-center p-3.5 rounded text-primary bg-primary-light dark:bg-primary-dark-light">
                                        <span class="ltr:mr-3 rtl:ml-3">
                                            <icon-video class="w-9 h-9 object-cover" />
                                        </span>
                                        <div class="flex-1">
                                            <div class="flex items-center space-x-4">
                                                <div class="flex-1">
                                                    <h6 class="text-base font-semibold">
                                                        <strong class="ltr:mr-1 rtl:ml-1">Video: </strong>
                                                        {{ content.description }}
                                                    </h6>
                                                </div>
                                                <div>
                                                    <button @click="openSelectedVideo(content)"
                                                        type="button"
                                                        class="btn btn-success btn-sm flex uppercase inline-block"
                                                    >
                                                        <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                                            <path fill="currentColor" d="M73 39c-14.8-9.1-33.4-9.4-48.5-.9S0 62.6 0 80L0 432c0 17.4 9.4 33.4 24.5 41.9s33.7 8.1 48.5-.9L361 297c14.3-8.7 23-24.2 23-41s-8.7-32.2-23-41L73 39z"/>
                                                        </svg>
                                                        Reproducir
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </template>
                                <template v-else-if="content.is_file == 2">
                                    <div class="flex items-center p-3.5 rounded text-primary bg-primary-light dark:bg-primary-dark-light">
                                        <span class="ltr:mr-3 rtl:ml-3">
                                            <icon-file-pdf class="w-9 h-9 object-cover" />
                                        </span>
                                        <div class="flex-1 font-semibold">
                                            <div class="flex items-center space-x-4">
                                                <h6 class="flex-1 text-base">
                                                    <strong class="ltr:mr-1 rtl:ml-1">Link de archivo: </strong>
                                                    {{ content.description }}
                                                </h6>
                                                <div>
                                                    <a
                                                        :href="getPath(content.content)"
                                                        @click="originalSaveStudentHistory(content)"
                                                        target="_blank"
                                                        type="button"
                                                        class="btn btn-success btn-sm flex uppercase inline-block"
                                                    >
                                                        <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path fill="currentColor" d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 242.7-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7 288 32zM64 352c-35.3 0-64 28.7-64 64l0 32c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-32c0-35.3-28.7-64-64-64l-101.5 0-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352 64 352zm368 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48z"/>
                                                        </svg>
                                                        Descargar
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </template>
                                <template v-else-if="content.is_file == 3">
                                    <div class="flex items-center p-3.5 rounded text-primary bg-primary-light dark:bg-primary-dark-light">
                                        <span class="ltr:mr-3 rtl:ml-3">
                                            <svg class="w-9 h-9 object-cover" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                <path d="M352 256c0 22.2-1.2 43.6-3.3 64l-185.3 0c-2.2-20.4-3.3-41.8-3.3-64s1.2-43.6 3.3-64l185.3 0c2.2 20.4 3.3 41.8 3.3 64zm28.8-64l123.1 0c5.3 20.5 8.1 41.9 8.1 64s-2.8 43.5-8.1 64l-123.1 0c2.1-20.6 3.2-42 3.2-64s-1.1-43.4-3.2-64zm112.6-32l-116.7 0c-10-63.9-29.8-117.4-55.3-151.6c78.3 20.7 142 77.5 171.9 151.6zm-149.1 0l-176.6 0c6.1-36.4 15.5-68.6 27-94.7c10.5-23.6 22.2-40.7 33.5-51.5C239.4 3.2 248.7 0 256 0s16.6 3.2 27.8 13.8c11.3 10.8 23 27.9 33.5 51.5c11.6 26 20.9 58.2 27 94.7zm-209 0L18.6 160C48.6 85.9 112.2 29.1 190.6 8.4C165.1 42.6 145.3 96.1 135.3 160zM8.1 192l123.1 0c-2.1 20.6-3.2 42-3.2 64s1.1 43.4 3.2 64L8.1 320C2.8 299.5 0 278.1 0 256s2.8-43.5 8.1-64zM194.7 446.6c-11.6-26-20.9-58.2-27-94.6l176.6 0c-6.1 36.4-15.5 68.6-27 94.6c-10.5 23.6-22.2 40.7-33.5 51.5C272.6 508.8 263.3 512 256 512s-16.6-3.2-27.8-13.8c-11.3-10.8-23-27.9-33.5-51.5zM135.3 352c10 63.9 29.8 117.4 55.3 151.6C112.2 482.9 48.6 426.1 18.6 352l116.7 0zm358.1 0c-30 74.1-93.6 130.9-171.9 151.6c25.5-34.2 45.2-87.7 55.3-151.6l116.7 0z"/>
                                            </svg>
                                        </span>
                                        <div class="flex-1 font-semibold">
                                            <div class="flex items-center space-x-4">
                                                <h6 class="flex-1 text-base">
                                                    <strong class="ltr:mr-1 rtl:ml-1">Videoconferencia: </strong>
                                                    {{ content.description }}
                                                </h6>
                                                <div>
                                                    <a
                                                        :href="content.content"
                                                        @click="originalSaveStudentHistory(content)"
                                                        target="_blank"
                                                        type="button"
                                                        class="btn btn-success btn-sm flex uppercase inline-block"
                                                    >
                                                        <svg class="w-4 h-4 mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                            <path d="M0 128C0 92.7 28.7 64 64 64l256 0c35.3 0 64 28.7 64 64l0 256c0 35.3-28.7 64-64 64L64 448c-35.3 0-64-28.7-64-64L0 128zM559.1 99.8c10.4 5.6 16.9 16.4 16.9 28.2l0 256c0 11.8-6.5 22.6-16.9 28.2s-23 5-32.9-1.6l-96-64L416 337.1l0-17.1 0-128 0-17.1 14.2-9.5 96-64c9.8-6.5 22.4-7.2 32.9-1.6z"/>
                                                        </svg> Unirse

                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </template>
                                <template v-else-if="content.is_file == 4">
                                    <div class="flex items-center p-3.5 rounded text-primary bg-primary-light dark:bg-primary-dark-light">
                                        <span class="ltr:mr-3 rtl:ml-3">
                                            <svg class="w-9 h-9 object-cover" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                <path d="M0 64C0 28.7 28.7 0 64 0L224 0l0 128c0 17.7 14.3 32 32 32l128 0 0 38.6C310.1 219.5 256 287.4 256 368c0 59.1 29.1 111.3 73.7 143.3c-3.2 .5-6.4 .7-9.7 .7L64 512c-35.3 0-64-28.7-64-64L0 64zm384 64l-128 0L256 0 384 128zm48 96a144 144 0 1 1 0 288 144 144 0 1 1 0-288zm0 240a24 24 0 1 0 0-48 24 24 0 1 0 0 48zM368 321.6l0 6.4c0 8.8 7.2 16 16 16s16-7.2 16-16l0-6.4c0-5.3 4.3-9.6 9.6-9.6l40.5 0c7.7 0 13.9 6.2 13.9 13.9c0 5.2-2.9 9.9-7.4 12.3l-32 16.8c-5.3 2.8-8.6 8.2-8.6 14.2l0 14.8c0 8.8 7.2 16 16 16s16-7.2 16-16l0-5.1 23.5-12.3c15.1-7.9 24.5-23.6 24.5-40.6c0-25.4-20.6-45.9-45.9-45.9l-40.5 0c-23 0-41.6 18.6-41.6 41.6z"/>
                                            </svg>
                                        </span>
                                        <div class="flex-1 font-semibold">
                                            <div class="flex items-center space-x-4">
                                                <h6 class="flex-1 text-base">
                                                    <strong class="ltr:mr-1 rtl:ml-1">Examen: </strong>
                                                    {{ content.description }}
                                                </h6>
                                                <div>
                                                    <button
                                                        @click="openExamSolve(content)"
                                                        type="button"
                                                        class="btn btn-success btn-sm flex uppercase inline-block"
                                                    >
                                                        <svg class="w-4 h-4 mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path d="M453.3 19.3l39.4 39.4c25 25 25 65.5 0 90.5l-52.1 52.1s0 0 0 0l-1-1s0 0 0 0l-16-16-96-96-17-17 52.1-52.1c25-25 65.5-25 90.5 0zM241 114.9c-9.4-9.4-24.6-9.4-33.9 0L105 217c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9L173.1 81c28.1-28.1 73.7-28.1 101.8 0L288 94.1l17 17 96 96 16 16 1 1-17 17L229.5 412.5c-48 48-109.2 80.8-175.8 94.1l-25 5c-7.9 1.6-16-.9-21.7-6.6s-8.1-13.8-6.6-21.7l5-25c13.3-66.6 46.1-127.8 94.1-175.8L254.1 128 241 114.9z"/>
                                                        </svg>
                                                        Resolver

                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </template>
                            </template>
                            <div>
                                <h5 class="pb-3 text-gray-900 border-b border-gray-400/50 dark:text-gray-50 dark:border-zinc-700">
                                    COMENTARIOS
                                </h5>
                                <template v-if="commentsLoading">
                                    <div class="flex items-center mt-4">
                                        <svg class="w-10 h-10 me-3 text-gray-200 dark:text-gray-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z"/>
                                        </svg>
                                        <div>
                                            <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-700 w-32 mb-2"></div>
                                            <div class="w-48 h-2 bg-gray-200 rounded-full dark:bg-gray-700"></div>
                                        </div>
                                    </div>
                                </template>
                                <template v-else>
                                    <template v-if="commentsData && commentsData.length > 0">
                                        <div v-for="(comment, index) in commentsData" :key="comment.id" class="mt-8">
                                            <div class="flex align-top">
                                                <div class="shrink-0">
                                                    <img v-if="comment.user.avatar" class="p-1 rounded-full w-14 h-14 ring-2 ring-gray-100/20" :src="getImage(comment.user.avatar)" alt="img">
                                                    <img v-else :src="'https://ui-avatars.com/api/?name='+comment.user.name+'&size=150&rounded=true'" class="p-1 rounded-full w-14 h-14 ring-2 ring-gray-100/20" :alt="comment.user.name"/>
                                                </div>
                                                <div class="ltr:ml-3 rtl:mr-3 grow">
                                                    <small class="text-xs text-gray-500 ltr:float-right rtl:float-left dark:text-gray-300"><i class="uil uil-clock"></i> {{ comment.time_elapsed }}</small>
                                                    <a href="javascript:(0)" class="text-gray-900 transition-all duration-500 ease-in-out hover:bg-violet-500 dark:text-gray-50"><h6 class="mb-0 text-16 mt-sm-0">{{ comment.user.name }}</h6></a>
                                                    <p class="mb-0 text-sm text-gray-500 dark:text-gray-300">{{ comment.created_atx }}</p>

                                                    <div v-show="comment.edit_status">
                                                        <form @submit.prevent="editComment(comment,index)" class="mt-2 contact-form">
                                                            <div>
                                                                <textarea v-model="comment.description" :id="'ctnTextarea'+index" :ref="'ctnTextarea' + index" rows="3" class="form-textarea" placeholder="Escribe aqui..." required></textarea>
                                                            </div>

                                                            <div class="flex justify-end mt-4">
                                                                <button name="submit" type="submit" class="btn btn-danger hover:-translate-y-1" :class="{ 'opacity-25': comment.loading }" :disabled="comment.loading">
                                                                    Editar mensaje
                                                                    <svg v-if="comment.loading" aria-hidden="true" role="status" class="inline w-4 h-4 ml-2 text-gray-200 animate-spin dark:text-gray-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                                                                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="#1C64F2"/>
                                                                    </svg>
                                                                    <icon-send v-else class="ml-2" />
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <p v-if="!comment.edit_status" class="mb-0 italic text-gray-500 dark:text-gray-300">{{ comment.description }}</p>

                                                    <div class="mt-4">
                                                        <ul class="flex space-x-4 rtl:space-x-reverse font-bold">
                                                            <!-- <li>
                                                                <a href="javascript:;" class="flex items-center hover:text-primary">
                                                                <icon-message class="mr-1 w-4 h-4" />
                                                                Responder
                                                                </a>
                                                            </li> -->
                                                            <!-- megusta y no me gusta  -->
                                                            <!-- <li>
                                                                <a href="javascript:;" class="flex items-center hover:text-primary">
                                                                    <font-awesome-icon :icon="faThumbsUp" class="mr-1" />
                                                                    {{ comment.i_like == null ? 0 : comment.i_like }}
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:;" class="flex items-center hover:text-primary">
                                                                    <font-awesome-icon :icon="faThumbsDown" class="mr-1" />
                                                                    {{ comment.not_like == null ? 0 : comment.not_like }}
                                                                </a>
                                                            </li> -->
                                                            <li v-if="$page.props.auth.user.id == comment.user.id">
                                                                <a @click="activeEditComment(index)" href="javascript:;" class="flex items-center hover:text-primary">
                                                                    <icon-edit class="mr-1 w-4 h-4" />
                                                                    Editar
                                                                </a>
                                                            </li>
                                                            <li v-if="$page.props.auth.user.id == comment.user.id">
                                                                <a @click="destroyComment(comment,index)" href="javascript:;" class="flex items-center hover:text-primary">
                                                                    <icon-trash class="mr-1 w-4 h-4" />
                                                                    Eliminar
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </template>
                                </template>
                                <!-- <form @submit.prevent="createComment" class="mt-8 contact-form">
                                    <div>
                                        <label for="ctnTextarea">Dejar un comentario</label>
                                        <textarea v-model="formComment.message" id="ctnTextarea" rows="3" class="form-textarea" placeholder="Escribe aqui..." required></textarea>
                                        <InputError :message="formComment.errors.message" class="mt-2" />
                                    </div>

                                    <div class="flex justify-end mt-6">
                                        <button name="submit" type="submit" id="submit" :class="{ 'opacity-25': formComment.processing }" :disabled="formComment.processing" class="btn btn-primary hover:-translate-y-1">
                                            Enviar mensaje
                                            <svg v-if="formComment.processing" aria-hidden="true" role="status" class="inline w-4 h-4 ml-2 text-gray-200 animate-spin dark:text-gray-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                                                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="#1C64F2"/>
                                            </svg>
                                            <icon-send v-else class="ml-2" />
                                        </button>
                                    </div>
                                </form> -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ================================================================= -->
            <!-- =========== INICIO: NUEVA PROPUESTA DE INTERFAZ DE UX =========== -->
            <!-- ================================================================= -->
            <div class="pt-10">
                <hr class="my-8 border-dashed">
                <div class="max-w-2xl mx-auto text-center mb-6 lg:mb-8">
                    <h2 class="text-xl font-bold md:text-xl md:leading-tight dark:text-white">--- Nueva Propuesta de Interfaz ---</h2>
                </div>

                <div class="grid grid-cols-6 gap-4">
                    <!-- Columna de Temas con Progreso -->
                    <div class="panel col-span-6 sm:col-span-2">
                        <div class="flex justify-between items-center mb-5">
                            <h1 class="font-extrabold tracking-wider">Temas</h1>
                        </div>
                        <div class="flex flex-col gap-4 text-sm">
                            <div v-for="theme in themesWithProgress" :key="theme.id"
                                @click="selectThemeNewUI(theme)"
                                class="cursor-pointer p-3 rounded-lg shadow-sm hover:shadow-md duration-300 border"
                                :class="selectedThemeNewUI && selectedThemeNewUI.id === theme.id ? 'bg-primary-light dark:bg-primary-dark-light border-primary' : 'bg-white dark:bg-gray-800 border-gray-200 dark:border-gray-700'">
                                <div class="flex justify-between items-center">
                                    <span class="font-semibold" :class="selectedThemeNewUI && selectedThemeNewUI.id === theme.id ? 'text-primary' : 'text-gray-800 dark:text-white'">{{ theme.description }}</span>
                                </div>
                                <div class="mt-2">
                                    <div class="flex justify-between items-center mb-1 text-xs">
                                        <span class="text-gray-500 dark:text-gray-400">Progreso</span>
                                        <span class="font-bold" :class="selectedThemeNewUI && selectedThemeNewUI.id === theme.id ? 'text-primary' : 'text-gray-600 dark:text-gray-300'">
                                            {{ theme.completedCount }} / {{ theme.contents.length }}
                                        </span>
                                    </div>
                                    <div class="w-full bg-gray-200 rounded-full h-1.5 dark:bg-gray-700">
                                        <div class="bg-primary h-1.5 rounded-full" :style="{ width: theme.progress + '%' }"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Columna de Contenidos Interactivos -->
                    <div class="panel col-span-6 sm:col-span-4">
                        <div v-if="selectedThemeNewUI" class="space-y-2">
                            <div v-for="content in selectedThemeNewUI.contents" :key="content.id" class="border border-gray-200 dark:border-gray-700 rounded-lg overflow-hidden">
                                <!-- Cabecera del Acordeón -->
                                <div @click="toggleContentAccordion(content)" class="cursor-pointer flex items-center p-4 bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700">
                                    <!-- Icono de Completado -->
                                    <div class="shrink-0 mr-3">
                                        <svg v-if="content.completed" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <svg v-else xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <!-- Icono de Tipo de Contenido -->
                                    <div class="shrink-0 mr-4 text-primary">
                                        <icon-video v-if="content.is_file == 0" class="w-6 h-6" />
                                        <icon-file v-else-if="content.is_file == 1" class="w-6 h-6" />
                                        <icon-file-pdf v-else-if="content.is_file == 2" class="w-6 h-6" />
                                        <svg v-else-if="content.is_file == 3" class="w-6 h-6" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M352 256c0 22.2-1.2 43.6-3.3 64l-185.3 0c-2.2-20.4-3.3-41.8-3.3-64s1.2-43.6 3.3-64l185.3 0c2.2 20.4 3.3 41.8 3.3 64z"/></svg>
                                        <svg v-else-if="content.is_file == 4" class="w-6 h-6" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M0 64C0 28.7 28.7 0 64 0L224 0l0 128c0 17.7 14.3 32 32 32l128 0 0 38.6C310.1 219.5 256 287.4 256 368c0 59.1 29.1 111.3 73.7 143.3c-3.2 .5-6.4 .7-9.7 .7L64 512c-35.3 0-64-28.7-64-64L0 64z"/></svg>
                                    </div>
                                    <!-- Descripción -->
                                    <div class="flex-1">
                                        <h6 class="font-semibold text-gray-800 dark:text-white">{{ content.description }}</h6>
                                    </div>
                                    <!-- Flecha del Acordeón -->
                                    <div class="shrink-0 ml-4">
                                        <svg class="w-5 h-5 text-gray-500 transition-transform duration-300" :class="{ 'rotate-180': content.isExpanded }" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>

                                <!-- Contenido del Acordeón -->
                                <div v-show="content.isExpanded" class="p-5 bg-gray-50 dark:bg-gray-900/50">
                                    <!-- Acción del Contenido -->
                                    <div class="mb-6">
                                        <button v-if="content.is_file == 0" @click="openSelectedVideo(content)" type="button" class="btn btn-primary">Reproducir Video</button>
                                        <a v-if="content.is_file == 1" :href="content.content" target="_blank" @click="saveStudentHistory(content)" class="btn btn-primary">Ir al Sitio</a>
                                        <a v-if="content.is_file == 2" :href="getPath(content.content)" target="_blank" @click="saveStudentHistory(content)" class="btn btn-primary">Descargar PDF</a>
                                        <a v-if="content.is_file == 3" :href="content.content" target="_blank" @click="saveStudentHistory(content)" class="btn btn-primary">Unirse a Videoconferencia</a>
                                        <button v-if="content.is_file == 4" @click="openExamSolve(content)" type="button" class="btn btn-primary">Resolver Examen</button>
                                    </div>

                                    <!-- Sección de Comentarios (reutilizada) -->
                                    <div>
                                        <h5 class="pb-3 text-gray-900 border-b border-gray-400/50 dark:text-gray-50 dark:border-zinc-700">
                                            COMENTARIOS DEL TEMA
                                            <span class="text-xs text-gray-500">(Esta sección es para todo el tema)</span>
                                        </h5>
                                        <template v-if="commentsLoading">
                                            <div class="flex items-center mt-4 animate-pulse">
                                                <svg class="w-10 h-10 me-3 text-gray-200 dark:text-gray-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z"/>
                                                </svg>
                                                <div>
                                                    <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-700 w-32 mb-2"></div>
                                                    <div class="w-48 h-2 bg-gray-200 rounded-full dark:bg-gray-700"></div>
                                                </div>
                                            </div>
                                        </template>
                                        <template v-else>
                                            <div v-if="!commentsData || commentsData.length === 0" class="text-center py-6 text-gray-500">
                                                Sé el primero en comentar.
                                            </div>
                                            <template v-if="commentsData && commentsData.length > 0">
                                                <div v-for="(comment, index) in commentsData" :key="comment.id" class="mt-8">
                                                    <div class="flex align-top">
                                                        <div class="shrink-0">
                                                            <img v-if="comment.user.avatar" class="p-1 rounded-full w-14 h-14 ring-2 ring-gray-100/20" :src="getImage(comment.user.avatar)" alt="img">
                                                            <img v-else :src="'https://ui-avatars.com/api/?name='+comment.user.name+'&size=150&rounded=true'" class="p-1 rounded-full w-14 h-14 ring-2 ring-gray-100/20" :alt="comment.user.name"/>
                                                        </div>
                                                        <div class="ltr:ml-3 rtl:mr-3 grow">
                                                            <small class="text-xs text-gray-500 ltr:float-right rtl:float-left dark:text-gray-300"><i class="uil uil-clock"></i> {{ comment.time_elapsed }}</small>
                                                            <a href="javascript:(0)" class="text-gray-900 transition-all duration-500 ease-in-out hover:bg-violet-500 dark:text-gray-50"><h6 class="mb-0 text-16 mt-sm-0">{{ comment.user.name }}</h6></a>
                                                            <p class="mb-0 text-sm text-gray-500 dark:text-gray-300">{{ comment.created_atx }}</p>

                                                            <div v-show="comment.edit_status">
                                                                <form @submit.prevent="editComment(comment,index)" class="mt-2 contact-form">
                                                                    <div>
                                                                        <textarea v-model="comment.description" :id="'ctnTextareaNew'+index" rows="3" class="form-textarea" placeholder="Escribe aqui..." required></textarea>
                                                                    </div>

                                                                    <div class="flex justify-end mt-4">
                                                                        <button name="submit" type="submit" class="btn btn-danger hover:-translate-y-1" :class="{ 'opacity-25': comment.loading }" :disabled="comment.loading">
                                                                            Editar mensaje
                                                                            <svg v-if="comment.loading" aria-hidden="true" role="status" class="inline w-4 h-4 ml-2 text-gray-200 animate-spin dark:text-gray-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/><path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="#1C64F2"/></svg>
                                                                            <icon-send v-else class="ml-2" />
                                                                        </button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <p v-if="!comment.edit_status" class="mb-0 italic text-gray-500 dark:text-gray-300">{{ comment.description }}</p>

                                                            <div class="mt-4">
                                                                <ul class="flex space-x-4 rtl:space-x-reverse font-bold">
                                                                    <li v-if="$page.props.auth.user.id == comment.user.id">
                                                                        <a @click="activeEditComment(index)" href="javascript:;" class="flex items-center hover:text-primary">
                                                                            <icon-edit class="mr-1 w-4 h-4" />
                                                                            Editar
                                                                        </a>
                                                                    </li>
                                                                    <li v-if="$page.props.auth.user.id == comment.user.id">
                                                                        <a @click="destroyComment(comment,index)" href="javascript:;" class="flex items-center hover:text-primary">
                                                                            <icon-trash class="mr-1 w-4 h-4" />
                                                                            Eliminar
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </template>
                                        </template>
                                        <form @submit.prevent="createComment" class="mt-8 contact-form">
                                            <div>
                                                <label for="ctnTextareaNew">Dejar un comentario</label>
                                                <textarea v-model="formComment.message" id="ctnTextareaNew" rows="3" class="form-textarea" placeholder="Escribe aqui..." required></textarea>
                                                <InputError :message="formComment.errors.message" class="mt-2" />
                                            </div>

                                            <div class="flex justify-end mt-6">
                                                <button name="submit" type="submit" :class="{ 'opacity-25': formComment.processing }" :disabled="formComment.processing" class="btn btn-primary hover:-translate-y-1">
                                                    Enviar mensaje
                                                    <svg v-if="formComment.processing" aria-hidden="true" role="status" class="inline w-4 h-4 ml-2 text-gray-200 animate-spin dark:text-gray-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/><path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="#1C64F2"/></svg>
                                                    <icon-send v-else class="ml-2" />
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- =============================================================== -->
            <!-- =========== FIN: NUEVA PROPUESTA DE INTERFAZ DE UX ============ -->
            <!-- =============================================================== -->

        </div>
         <!-- Modal -->
        <TransitionRoot appear :show="displayModalVideo" as="template">
            <Dialog as="div" @close="closeSelectedVideo" class="relative z-50">
            <TransitionChild as="template" enter="duration-300 ease-out" enter-from="opacity-0" enter-to="opacity-100" leave="duration-200 ease-in" leave-from="opacity-100" leave-to="opacity-0">
                <DialogOverlay class="fixed inset-0 bg-[black]/60" />
            </TransitionChild>

            <div class="fixed inset-0 overflow-y-auto">
                <div class="flex min-h-full items-start justify-center px-4 py-8">
                    <TransitionChild
                        as="template"
                        enter="duration-300 ease-out"
                        enter-from="opacity-0 scale-95"
                        enter-to="opacity-100 scale-100"
                        leave="duration-200 ease-in"
                        leave-from="opacity-100 scale-100"
                        leave-to="opacity-0 scale-95"
                    >
                        <DialogPanel class="relative overflow-hidden w-full max-w-3xl py-8">
                            <button @click="closeSelectedVideo" type="button" class="absolute top-4 ltr:right-4 rtl:left-4 text-gray-400 hover:text-gray-800 dark:hover:text-gray-600 outline-none">
                                <icon-x />
                            </button>
                            <div class="p-5" v-html="videoSelected"></div>
                        </DialogPanel>
                    </TransitionChild>
                </div>
            </div>
            </Dialog>
        </TransitionRoot>

    </AppLayout>
</template>
