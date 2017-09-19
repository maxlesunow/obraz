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
    created () {
        this.options = this.filters[this.selectName]
    },
    mounted () {
        var vm = this;
        $(this.$el)
            .val(this.value)
            .select2({
                placeholder: vm.options.placeholder,
                allowClear: true,
                ajax: {
                    url: vm.options.url,
                    // type: "POST",
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            search: params.term
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: data.data.map((el) => ({ id: el.id, text: el[vm.options.text] }))
                        };
                    }
                }
            })
            .on('change', function () {
                vm.$emit('select2:set', this.value, vm.selectName)
            })
    },
    destroyed: function() {
        $(this.$el).off().select2('destroy')
    }
}
</script>

<style>

</style>
