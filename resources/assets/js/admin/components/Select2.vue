<template>
    <select style="width: 170px;">
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
            $(this.$el).val(value)
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
        }
    },
    created () {
        this.options = this.filters[this.selectName]
    },
    mounted () {
        var vm = this;
        $(vm.$el)
            .val(vm.value)
            .select2({
                debug: true,
                multiple: vm.options.multiple || false,
                placeholder: vm.options.placeholder,
                allowClear: true,
                minimumResultsForSearch: vm.getData() ? -1 : undefined, // hide search bar
                ajax: vm.getAjax(),
                data: vm.getData()
            })
            .on('change', function () {
                // this in select2 ctx, not vuejs
                vm.$emit('select2:set', _.join(_.map($(vm.$el).select2('data'), 'id'), ','), vm.selectName)
            })
    },
    destroyed: function() {
        $(this.$el).off().select2('destroy')
    }
}
</script>

<style>

</style>
