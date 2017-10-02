<template>
    <el-select v-model="selectValue" multiple filterable remote :placeholder="placeHold" :remote-method="remoteMethod" :loading="loading" @change="changeMethod">
        <el-option v-for="item in options" :key="item.value" :label="item.label" :value="item.value"></el-option>
    </el-select>
</template>

<script>

export default {
    props: ['filters', 'selectName'],
    data: () => ({
        options: [],
        selectValue: [],
        list: [],
        loading: false,
        states: [],
        placeHold: ''
    }),
    methods: {
        remoteMethod(query = '') {
            axios.get(this.filters[this.selectName].ajax.url, { search: query })
                .then((res) => {
                   this.options =  _.map(res.data, (key, el) => ({ value: el, label: key }))
                })
                .catch((res) => {
                    this.options = []
                })
        },
        changeMethod(elements) {
            this.$emit('select2:set', _.join(elements, ':'), this.selectName)
        }
    },
    mounted() {
        this.placeHold = this.filters[this.selectName].placeholder
        this.remoteMethod('')
    }
}
</script>

<style scoped>
    .el-select {
        width: 100%;
    }
    .el-select .el-input__inner {
        min-height: 50px;
    }
    .el-select .el-input input {
        padding: 9px 16px;
        /* font-size: 16px; */
        line-height: 1.5;
        color: #212121;
        background-color: transparent;
        background-image: none;
        border: 1px solid #d9d9d9;
        border-radius: 5px;
    }

    .el-select-dropdown.is-multiple .el-select-dropdown__item.selected {
        color: #4c4ab5;
    }

    .el-tag--primary {
        color: white;
        border-color: #4c4bb5;
    }
</style>
