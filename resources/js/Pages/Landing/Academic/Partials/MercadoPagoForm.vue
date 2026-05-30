<script setup>
import { computed, onMounted, reactive, ref } from "vue";
import { loadMercadoPago } from "@mercadopago/sdk-js";
import { router } from '@inertiajs/vue3'

const cardPaymentBrickContainer = ref(null);
const processingYape = ref(false);
const activeAccordion = ref(null);

const toggleAccordion = (section) => {
    activeAccordion.value = activeAccordion.value === section ? null : section;
};
const yapeForm = reactive({
    phoneNumber: "",
    otp: "",
    email: "",
});

const props = defineProps({
    preference: {
        type: String,
        default: null,
    },
    publicKey: {
        type: String,
        default: null,
    },
    subscription:{
        type: Object,
        default: () => ({}),
    },
    samount: {
        type: Number,
        default: null,
    },
    personInvoice:{
        type: Array,
        default: {},
    }
});

let mp;
const payerEmail = computed(() => props.personInvoice?.email || "");

onMounted(async () => {
    // Carga el SDK de MercadoPago
    await loadMercadoPago();

    // Inicializa MercadoPago
    mp = new window.MercadoPago(props.publicKey, { locale: "es" });

    const bricksBuilder = mp.bricks();

    // Renderiza el brick una vez que el DOM está disponible
    await renderCardPaymentBrick(bricksBuilder);
});

const renderCardPaymentBrick = async (bricksBuilder) => {
    const settings = {
        initialization: {
            amount: props.samount,
        },
        customization: {
            visual: {
                style: {
                    theme: "bootstrap",
                },
            },
            paymentMethods: {
                maxInstallments: 1,
            },
        },
        callbacks: {
            onReady: () => {
                console.log("Brick está listo");
            },
            onSubmit: (cardFormData) => {
                cardFormData.personInvoice = props.personInvoice
                return axios({
                        method: 'PUT',
                        url: route("aca_mercadopago_processpayment", props.subscription.id),
                        data: cardFormData
                    }).then((response) => {
                        return response.data;
                    }).then((data) => {
                        if (data.status === "approved") {
                            router.visit(data.url, {
                                method: 'get',
                                replace: true,
                                preserveState: false,
                                preserveScroll: false,
                            });
                        } else {
                            alert(data.message);
                            router.visit(route('academic_step_verification',props.subscription.id), {
                                method: 'get',
                            });
                        }
                    }).catch((error) => {
                        alert(error.message || "Error al procesar el pago.");
                        router.visit(route('academic_step_verification',props.subscription.id), {
                            method: 'get',
                        });
                    });
            },
            onError: (error) => {
                console.error("Error en Brick:", error);
            },
        },
    };

    // Asegúrate de que el contenedor existe antes de crear el brick
    const container = cardPaymentBrickContainer.value;
    if (container) {
        window.cardPaymentBrickController = await bricksBuilder.create(
            "cardPayment",
            "cardPaymentBrick_container",
            settings
        );
    } else {
        console.error("El contenedor 'cardPaymentBrick_container' no está disponible.");
    }
};

const handlePaymentResponse = (data) => {
    if (data.status === "approved") {
        router.visit(data.url, {
            method: 'get',
            replace: true,
            preserveState: false,
            preserveScroll: false,
        });
    } else {
        alert(data.message || "Pago no aprobado.");
        router.visit(route('academic_step_verification',props.subscription.id), {
            method: 'get',
        });
    }
};

const processYapePayment = async () => {
    if (!mp) {
        alert("Mercado Pago todavia no esta listo.");
        return;
    }

    const email = yapeForm.email || payerEmail.value;
    if (!yapeForm.phoneNumber || !yapeForm.otp || !email) {
        alert("Ingresa celular, codigo OTP y correo.");
        return;
    }

    processingYape.value = true;

    try {
        const yape = mp.yape({
            phoneNumber: yapeForm.phoneNumber,
            otp: yapeForm.otp,
        });
        const token = await yape.create();
        const response = await axios({
            method: 'PUT',
            url: route("aca_mercadopago_processpayment", props.subscription.id),
            data: {
                token: token.id || token,
                transaction_amount: Number(props.samount),
                installments: 1,
                payment_method_id: "yape",
                payer: { email },
                payer_email: email,
                personInvoice: props.personInvoice
            }
        });

        handlePaymentResponse(response.data);
    } catch (error) {
        alert(error?.response?.data?.error || error.message || "Error al procesar Yape.");
    } finally {
        processingYape.value = false;
    }
};
</script>

<template>
    <div class="w-full">
        <!-- Accordion -->
        <div class="space-y-2">
            <!-- Yape section -->
            <div class="rounded-lg border border-gray-200 shadow-sm">
                <button type="button"
                    class="flex w-full items-center justify-between rounded-lg bg-white px-4 py-3 text-left text-sm font-semibold text-gray-900 hover:bg-gray-50"
                    :class="{ 'rounded-b-none': activeAccordion === 'yape' }"
                    @click="toggleAccordion('yape')">
                    <span class="flex items-center gap-2">
                        <svg class="h-5 w-5 text-blue-600" fill="currentColor" viewBox="0 0 24 24"><path d="M21 2H3a1 1 0 0 0-1 1v18a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1zm-7 13h-2V9h-2V7h4v8z"/></svg>
                        Pagar con Yape
                    </span>
                    <svg class="h-4 w-4 transition-transform duration-200"
                        :class="{ 'rotate-180': activeAccordion === 'yape' }"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div v-show="activeAccordion === 'yape'" class="border-t border-gray-200 bg-white p-4">
                    <p class="mb-3 text-sm text-gray-600">
                        Abre tu app Yape, genera el codigo de aprobacion/OTP para compras en linea y escribelo aqui junto con tu celular.
                    </p>
                    <div class="grid grid-cols-1 gap-3 md:grid-cols-3">
                        <input v-model="yapeForm.phoneNumber" class="form-input" inputmode="numeric" maxlength="9" placeholder="Celular Yape" type="text" />
                        <input v-model="yapeForm.otp" class="form-input" inputmode="numeric" maxlength="6" placeholder="Codigo OTP" type="text" />
                        <input v-model="yapeForm.email" class="form-input" :placeholder="payerEmail || 'Correo'" type="email" />
                    </div>
                    <button type="button" class="btn btn-primary mt-3" :disabled="processingYape" @click="processYapePayment">
                        {{ processingYape ? "Procesando..." : "Pagar con Yape" }}
                    </button>
                </div>
            </div>

            <!-- Tarjeta section -->
            <div class="rounded-lg border border-gray-200 shadow-sm">
                <button type="button"
                    class="flex w-full items-center justify-between rounded-lg bg-white px-4 py-3 text-left text-sm font-semibold text-gray-900 hover:bg-gray-50"
                    :class="{ 'rounded-b-none': activeAccordion === 'card' }"
                    @click="toggleAccordion('card')">
                    <span class="flex items-center gap-2">
                        <svg class="h-5 w-5 text-blue-600" fill="currentColor" viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 14H4V6h16v12zM6 10h12v2H6v-2z"/></svg>
                        Pagar con Tarjeta
                    </span>
                    <svg class="h-4 w-4 transition-transform duration-200"
                        :class="{ 'rotate-180': activeAccordion === 'card' }"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div v-show="activeAccordion === 'card'" class="border-t border-gray-200 bg-white p-4">
                    <div id="cardPaymentBrick_container" ref="cardPaymentBrickContainer"></div>
                </div>
            </div>
        </div>
    </div>
</template>
