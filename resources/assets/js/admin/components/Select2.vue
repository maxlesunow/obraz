<template>
    <select style="width: 170px;" ref='select'>
        <slot></slot>
    </select>
</template>

<script>
export default {
    props: ['filters', 'selectName'],
    data: () => ({
        options: ''
    }),
    watch: {
        value: function(value) {
            this.setValue()
        },
        filters: {
            handler: function (val, oldVal) {
                this.remove()
                this.init()
            },
            deep: true
        }
    },
    methods: {
        getAjax() {
            if (this.options.ajax) {
                return {
                    url: this.options.ajax.url,
                    type: this.options.ajax.urlType || 'GET',
                    dataType: 'json',
                    delay: 250,
                    data: (params) => ({ search: params.term }),
                    processResults: (data) => ({ results: data.data.map((el) => ({ id: el.id, text: el[this.options.ajax.text] })) })
                }
            } else {
                return undefined
            }
        },
        getData() {
            if (this.options.data) {
                return this.options.data
            } else {
                return undefined
            }
        },
        init() {
            var vm = this;
            $(this.$refs.select)
                .select2({
                    debug: true,
                    multiple: vm.options.multiple || false,
                    placeholder: vm.options.placeholder,
                    allowClear: vm.options.placeholder ? true : false,
                    minimumResultsForSearch: vm.getData() ? -1 : undefined, // hide search bar
                    ajax: vm.getAjax(),
                    data: vm.getData()
                })
                .show()
        },
        setValue() {
            $(this.$refs.select)
                .val(this.value)
                .trigger('change', { ignore: true })
        },
        update() {
            var vm = this;
            this.init()

            $(this.$refs.select)
                .on('change', function () {
                    // this in select2 ctx, not vuejs
                    vm.$emit('select2:set', _.join(_.map($(vm.$el).select2('data'), 'id'), ','), vm.selectName)
                })

            Vue.nextTick(() => {
                this.setValue()
            });
        },
        remove() {
            $(this.$refs.select).off().select2('destroy')
        }
    },
    created () {
        this.options = this.filters[this.selectName]
    },
    mounted () {
        this.update()
    },
    destroyed: function() {
        this.remove()
    }
}
</script>

<style>

</style>
