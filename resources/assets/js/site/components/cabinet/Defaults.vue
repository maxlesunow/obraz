<template>
    <div>
        <h3>Мои данные</h3>
        <form class="rd-mailform text-left" data-form-output="form-output-global" role="form">

            <template v-for="(input, index) in inputs">
                <div class="form-group" :class="{'has-error': input.hasErrors, 'offset-top-12': index !== 0, 'offset-top-30': index === 0 }">
                    <label :for="input.attr" class="form-label form-label-outside">{{input.name}}</label>

                    <input v-if="input.type === 'text'" type="text" :id="input.attr" class="form-control bg-white" :name="input.attr" v-model="input.data" required autofocus>
                    <input v-if="input.type === 'phone'" type="text" v-phone-mask :id="input.attr" class="form-control bg-white" :name="input.attr" v-model="input.data" required autofocus>

                    <!-- <span v-if="input.hasErrors" class="help-block">
                            {{input.errorMessage}}
                        </span> -->
                    <span v-if="input.hasErrors" class="form-validation">{{input.errorMessage}}</span>
                </div>
            </template>

        </form>
        
        <div class="offset-top-20">
            <a href="" @click.prevent="$emit('update:passwordMode', !passwordMode)">Изменить пароль <i class="mdi mdi-arrow-right text-blue-gray"></i></a>
        </div>

        <div class="offset-top-20">
            <button class="btn btn-primary btn btn-block" @click.prevent="detailsPut">Сохранить</button>
        </div>

        <div class="offset-top-20">
            <span>Для смены телефона обратитесь к менеджеру.</span>
        </div>
    </div>
</template>

<script>
import Vue from 'vue'

import formDataMixin from './../mixins/formData'

// import Inputmask from 'inputmask'

export default {
    props: ['passwordMode'],
    mixins: [formDataMixin],
    // directives: {
    //     'phone-mask': {
    //         bind: function(el) {
    //             new Inputmask({
    //                 mask: "+7 (###) ### ## ##",
    //                 autoUnmask: true,
    //                 onUnMask: (maskedValue, unmaskedValue) => "7" + unmaskedValue
    //             }).mask(el);
    //         }
    //     }
    // },
    data() {
        return {
            inputs: [
                { data: '', hasErrors: '', errorMessage: null, type: "text", name: "Фамилия", attr: "last_name", disabled: false },
                { data: '', hasErrors: '', errorMessage: null, type: "text", name: "Имя", attr: "first_name", disabled: false },
                { data: '', hasErrors: '', errorMessage: null, type: "text", name: "Отчество", attr: "middle_name", disabled: false },
                { data: '', hasErrors: '', errorMessage: null, type: "text", name: "E-mail", attr: "email", disabled: false },
                // { data: '', hasErrors: '', errorMessage: null, type: "phone", name: "Телефон", attr: "phone", disabled: false },
                // { data: '', hasErrors: '', errorMessage: null, type: "text", name: "Способ оплаты", attr: "pay", disabled: false },
                // { data: '', hasErrors: '', errorMessage: null, type: "text", name: "Комментарий", attr: "comment", disabled: false }
            ],
        }
    },
    methods: {
        detailsGet() {
            axios.get('/api/site/user')
                .then((response) => {
                    console.log('!!', response)
                })
        },
        detailsPut() {
            this.clearErrors()
            axios.post('/api/site/details', this.getFormData())
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
        }
    },
    created() {
        this.detailsGet()
    }
}
</script>