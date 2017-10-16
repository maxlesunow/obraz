<template>
    <div>
        <h3>Записаться онлайн</h3>
        <form class="well-lg bg-white shadow-drop-md text-left" data-form-output="form-output-global" role="form">
            <p>Заполните форму и получите билет на курс прямо сейчас!</p>

            <template v-if="!smsSend" v-for="(input, index) in inputs">
                <div class="form-group" :class="{'has-error': input.hasErrors, 'offset-top-12': index !== 0, 'offset-top-30': index === 0 }">
                    <label :for="input.attr" class="form-label form-label-sm form-label-outside">{{input.name}}</label>

                    <input v-if="input.type === 'text'" type="text" :id="input.attr" class="form-control input-sm form-control-impressed" :name="input.attr" v-model="input.data" required autofocus>
                    <input v-if="input.type === 'phone'" type="text" v-phone-mask :id="input.attr" class="form-control input-sm form-control-impressed" :name="input.attr" v-model="input.data" required autofocus>

                    <!-- <span v-if="input.hasErrors" class="help-block">
                            {{input.errorMessage}}
                        </span> -->
                    <span v-if="input.hasErrors" class="form-validation">{{input.errorMessage}}</span>
                </div>
            </template>

            <template v-if="smsSend">
                <span>{{ reservetionInfo.fullName }}</span>
                <span>{{ reservetionInfo.payType }}</span>

            </template>

        </form>

        <sms :sms-send="smsSend" :sms-verify.sync="smsVerify" :user="addedUser"></sms>

        <div class="offset-top-20" v-if="!smsSend">
            <button class="btn btn-primary btn btn-block" @click.prevent="reservationPost">Записаться на курс</button>
        </div>
        <div class="offset-top-20" v-if="smsVerify">
            <button class="btn btn-default btn-block" @click.prevent="finishReservation">Завершить запись</button>
        </div>
    </div>
</template>

<script>
import Vue from 'vue'

import formDataMixin from './../mixins/formData'

import Inputmask from 'inputmask'

import Sms from './../Sms.vue'

export default {
    props: ['guest'],
    components: { Sms },
    mixins: [formDataMixin],
    directives: {
        'phone-mask': {
            bind: function(el) {
                new Inputmask({
                    mask: "+7 (###) ### ## ##",
                    autoUnmask: true,
                    onUnMask: (maskedValue, unmaskedValue) => "7" + unmaskedValue
                }).mask(el);
            }
        }
    },
    data() {
        return {
            inputs: [
                //
            ],
            addedUser: null,

            smsVerify: false,
            smsSend: false,
        }
    },
    computed: {
        reservetionInfo() {
            return {
                fullName: [this.getInputData('last_name'), this.getInputData('first_name'), this.getInputData('middle_name')].join(' '),
                payType: this.getInputData('pay') || 'способ оплаты'
            }
        }
    },
    methods: {
        getInputData(searchAttr) {
            return _.find(this.inputs, {attr: searchAttr}).data
        },
        reservationPost() {
            this.clearErrors()
            axios.post('/api/site/reservation', this.getFormData())
                .then((response) => {
                    // this.addedUser = response.data
                    this.smsSend = true

                    _.each(this.inputs, function(el, i) {
                        el.disabled = true
                    })
                })
                .catch((data) => {
                    if (data.response.statusText === 'Unprocessable Entity') {
                        var err = data.response && data.response.data && data.response.data.errors
                        this.setErrors(err)
                    }
                })
        },
        finishReservation() {
            // $(this.$refs.vuemodal).modal('hide');
            // this.$emit("login")
            window.location.href = '/'
        }
    },
    created() {
        if (this.guest) {
            this.inputs = [
                { data: '', hasErrors: '', errorMessage: null, type: "text", name: "Фамилия", attr: "last_name", disabled: false },
                { data: '', hasErrors: '', errorMessage: null, type: "text", name: "Имя", attr: "first_name", disabled: false },
                { data: '', hasErrors: '', errorMessage: null, type: "text", name: "Отчество", attr: "middle_name", disabled: false },
                { data: '', hasErrors: '', errorMessage: null, type: "text", name: "E-mail", attr: "email", disabled: false },
                { data: '', hasErrors: '', errorMessage: null, type: "phone", name: "Телефон", attr: "phone", disabled: false },
                { data: '', hasErrors: '', errorMessage: null, type: "text", name: "Способ оплаты", attr: "pay", disabled: false },
                { data: '', hasErrors: '', errorMessage: null, type: "text", name: "Комментарий", attr: "comment", disabled: false }
            ]
        } else {
            this.inputs = [
                { data: '', hasErrors: '', errorMessage: null, type: "text", name: "Способ оплаты", attr: "pay", disabled: false },
                { data: '', hasErrors: '', errorMessage: null, type: "text", name: "Комментарий", attr: "comment", disabled: false }
            ]
        }
    }
}
</script>