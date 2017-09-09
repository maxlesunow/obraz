module.exports = {
    methods: {
        getFormData() {
            return _.reduce(this.inputs, (store, input, i) => {
                store[input.attr] = input.data
                return store
            }, {})
        },
        clearErrors() {
            _.each(this.inputs, (value, i) => {
                this.inputs[i].hasErrors = ''
                this.inputs[i].errorMessage = null
            })
        },
        setErrors(err) {
            if (!err) return;

            _.each(this.inputs, (value, i) => {
                this.inputs[i].errorMessage = _.isArray(err[value.attr]) ? err[value.attr][0] : err[value.attr]
                if (this.inputs[i].errorMessage) { this.inputs[i].hasErrors = true }
            })
        },
    }
}