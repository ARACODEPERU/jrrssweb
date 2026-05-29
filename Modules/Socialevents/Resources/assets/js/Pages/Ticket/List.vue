<script setup>
    import AppLayout from '@/Layouts/Vristo/AppLayout.vue';
    import { useForm } from '@inertiajs/vue3';
    import Keypad from '@/Components/Keypad.vue';
    import Pagination from '@/Components/Pagination.vue';
    import * as XLSX from 'xlsx/dist/xlsx.full.min';
    import Swal2 from "sweetalert2";
    import { Link, router } from '@inertiajs/vue3';

    const props = defineProps({
        tickets: {
            type: Object,
            default: () => ({}),
        },
        ticketsExport: {
            type: Array,
            default: () => [],
        },
        filters: {
            type: Object,
            default: () => ({}),
        },
    });

    const form = useForm({
        search: props.filters.search,
        approved_only: props.filters.approved_only === true || props.filters.approved_only === '1',
    });

    const searchTickets = () => {
        form.get(route('even_tickets_listado'), {
            preserveState: true,
            preserveScroll: true,
        });
    };

    const formatApproved = (ticket) => ticket.status ? 'Si' : 'No';

    const formatDate = (date) => date ?? '';

    const downloadExcel = () => {
        const rows = props.ticketsExport.map((ticket) => ({
            ID: ticket.id,
            Evento: ticket.event?.title ?? 'Evento no disponible',
            Usuario: ticket.full_name ?? '',
            Documento: ticket.identification_number ?? '',
            Telefono: ticket.phone ?? '',
            Email: ticket.email ?? '',
            Ciudad: ticket.name_city ?? '',
            'Precio ticket': Number(ticket.price ?? ticket.type?.price ?? 0),
            Cantidad: Number(ticket.quantity ?? 0),
            Total: Number(ticket.total ?? ((ticket.price ?? ticket.type?.price ?? 0) * (ticket.quantity ?? 0))),
            'Fecha de pago': formatDate(ticket.response_date_approved),
            'Pago aprobado': formatApproved(ticket),
            'Estado pago': ticket.response_status ?? (ticket.status ? 'approved' : 'pending'),
            'Metodo pago': ticket.response_payment_method_id ?? '',
        }));

        const workbook = XLSX.utils.book_new();
        const worksheet = XLSX.utils.json_to_sheet(rows);

        worksheet['!cols'] = [
            { wch: 8 },
            { wch: 30 },
            { wch: 28 },
            { wch: 16 },
            { wch: 16 },
            { wch: 28 },
            { wch: 18 },
            { wch: 14 },
            { wch: 10 },
            { wch: 12 },
            { wch: 16 },
            { wch: 14 },
            { wch: 14 },
            { wch: 16 },
        ];

        XLSX.utils.book_append_sheet(workbook, worksheet, 'Tickets');
        XLSX.writeFile(workbook, 'tickets_eventos.xlsx');
    };

    const destroyLocal = (id) => {
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
            preConfirm: () => {
                return axios.delete(route('even_local_destroy', id)).then((res) => {
                    if (!res.data.success) {
                        Swal2.showValidationMessage(res.data.message)
                    }
                    return res
                });
            },
            allowOutsideClick: () => !Swal2.isLoading()
        }).then((result) => {
            if (result.isConfirmed) {
                Swal2.fire({
                    title: 'Enhorabuena',
                    text: 'Se Eliminó correctamente',
                    icon: 'success',
                });
                router.visit(route('even_local_list'), { replace: true, method: 'get' });
            }
        });
    }

    const xhttp =  assetUrl;
</script>

<template>
    <AppLayout title="Tickets">
        <div class="max-w-screen-2xl mx-auto p-4 md:p-6 2xl:p-10">
            <!-- Breadcrumb Start -->
            <nav class="flex px-4 py-3 border border-stroke text-gray-700 mb-4 bg-gray-50 dark:bg-gray-800 dark:border-gray-700" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <Link :href="route('dashboard')" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                        <svg aria-hidden="true" class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                        Inicio
                        </Link>
                    </li>
                    <li>
                        <div class="flex items-center">
                        <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <!-- <a href="#" class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">Productos</a> -->
                        <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Eventos sociales</span>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                            <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Tickets</span>
                        </div>
                    </li>
                </ol>
            </nav>
            <!-- ====== Table Section Start -->
            <div class="flex flex-col gap-10">
                <!-- ====== Table One Start -->
                <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                    <div class="w-full p-4 border-b border-gray-200 bg-gray-50 dark:border-gray-600 dark:bg-gray-700">
                        <div class="grid grid-cols-3">
                            <div class="col-span-3 sm:col-span-1">
                                <form id="form-search-items" @submit.prevent="searchTickets">
                                    <label for="table-search" class="sr-only">Search</label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                                        </div>
                                        <input v-model="form.search" type="text" id="table-search-users" class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Buscar por cliente o evento">
                                    </div>
                                    <label class="mt-3 inline-flex items-center gap-2 text-sm text-gray-700 dark:text-gray-300">
                                        <input v-model="form.approved_only" @change="searchTickets" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        Pago aprobado
                                    </label>
                                </form>
                            </div>
                            <div class="col-span-3 sm:col-span-2">
                                <Keypad>
                                    <template #botones>
                                        <button v-on:click="downloadExcel()" type="button" class="flex items-center justify-center inline-block px-6 py-2.5 bg-green-700 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-green-600 hover:shadow-lg focus:bg-green-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-800 active:shadow-lg transition duration-150 ease-in-out">
                                            Exportar Excel
                                        </button>
                                    </template>
                                </Keypad>
                            </div>
                        </div>
                    </div>
                    <div class="max-w-full overflow-x-auto">
                        <table class="w-full table-auto">
                            <thead class="border-b border-stroke">
                                <tr class="bg-gray-50 text-left dark:bg-meta-4">
                                    <th  class="py-2 px-4 text-center font-medium text-black dark:text-white">
                                        Acciones
                                    </th>
                                    <th class="py-2 px-4 font-medium text-black dark:text-white">
                                        Evento
                                    </th>
                                    <th class="py-2 px-4 font-medium text-black dark:text-white">
                                        Nombre de cliente
                                    </th>
                                    <th class="py-2 px-4 font-medium text-black dark:text-white">
                                        Ticket Precio
                                    </th>
                                    <th class="py-2 px-4 font-medium text-black dark:text-white">
                                        Cantidad
                                    </th>
                                    <th class="py-2 px-4 font-medium text-black dark:text-white">
                                        Estado
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-for="(ticket, index) in tickets.data" :key="ticket.id">
                                    <tr class="border-b border-stroke">
                                        <td class="text-center py-2 dark:border-strokedark">

                                        </td>
                                        <td class="py-2 px-2 dark:border-strokedark">
                                            {{ ticket.event?.title ?? 'Evento no disponible' }}
                                        </td>
                                        <td class="py-2 px-2 dark:border-strokedark">
                                            {{ ticket.full_name }}
                                        </td>
                                        <td class="py-2 px-2 dark:border-strokedark">
                                            {{ ticket.type?.type_id ?? 'Sin tipo' }} S/. {{ ticket.type?.price ?? 0 }}
                                        </td>
                                        <td class="text-right py-2 px-2 dark:border-strokedark">
                                            {{ ticket.quantity }}
                                        </td>
                                        <td class="text-center py-2 px-2 dark:border-strokedark">
                                            <span v-if="ticket.status" class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400">Valido</span>
                                            <span v-else class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-red-400 border border-red-400">Pendiente de Pago</span>
                                        </td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                    </div>
                    <Pagination :data="tickets" />
                </div>
            </div>
        </div>

    </AppLayout>
</template>
