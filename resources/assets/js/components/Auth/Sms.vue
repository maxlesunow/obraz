<template>
    <div class="panel panel-success clearfix" v-if="!isSmsValid">
        <div class="panel-body">
            <form class="form-horizontal" role="form">

                <template v-for="input in inputs">
                    <div class="form-group" :class="{'has-error': input.hasErrors }">
                        <label :for="input.attr" class="col-md-4 control-label">{{input.name}}</label>

                        <div class="col-md-6">
                            <input type="text" :id="input.attr" class="form-control" :name="input.attr" v-model="input.data" required autofocus>
                            
                            <span v-if="input.hasErrors" class="help-block">
                                <strong>{{input.errorMessage}}</strong>
                            </span>
                        </div>
                    </div>
                </template>

            </form>
            
            <!-- <button class="btn btn-success" @click.prevent="sendSms()" v-if="!isSmsSend">Отправить СМС</button>

            <div class="form-group" v-if="isSmsSend">
                <label for="sms" class="col-md-4 control-label">Подтверждение СМС</label>

                <div class="col-md-6">
                    <input type="text" class="form-control" name="sms" v-model="enteredSms" required autofocus>
                    
                    <span v-if="smsError" class="help-block">
                        <strong>{{smsErrorMessage}}</strong>
                    </span>
                </div>
                <button class="btn btn-success" @click.prevent="verifySms()">Подтвердить</button>
            </div> -->
        </div>
    </div>
</template>

<script>
import formDataMixin from './../mixins/formData'

export default {
    name: "sms",
    mixins: [formDataMixin],
    data: () => ({
        inputs: [
            { data: '', hasErrors: '', errorMessage: null, type: "text", name: "Код", attr: "code" },
        ],
        isSmsValid: false,
        isSmsSend: false,
        enteredSms: ''
    }),
    methods: {
        sendSms() {
            this.isSmsSend = true;
        },
        verifySms() {
            this.isSmsValid = true;
            _.each(this.inputs, (val, i) => {
                val.show = !val.show
            })
        },
    }
}
</script>

<style>

</style>
