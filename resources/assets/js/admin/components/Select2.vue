<template>
    <select>
        <slot></slot>
    </select>
</template>

<script>
export default {
    props: ['value'],
    watch: {
        value: function(value) {
            $(this.$el).val(value)
        },
        // localData: function(localData) {
        //     $(this.$el).select2({ data: localData })
        // }
    },
    mounted: function() {
        var vm = this;
        $(this.$el)
            .val(this.value)
            .select2({
                ajax: {
                    url: "/ajax/geo_sugest",
                    // type: "POST",
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            q: params.term
                        };
                    },
                }
            })
            .on('change', function () {
                vm.$emit('input', this.value)
            })
    },
    destroyed: function() {
        $(this.$el).off().select2('destroy')
    }
}
</script>

<style>

</style>
