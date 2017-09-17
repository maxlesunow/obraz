<template>
    <div>
        <!-- <button @click.prevent="resetFilter" class="btn"><i class="icon-reset"></i></button> -->
        <label>
            <input @input.prevent="searchInput" v-model="filterText" type="search" class="" placeholder="Введи для фильтра.." aria-controls="DataTables_Table_0">
        </label>
    </div>
</template>

<script>
import _ from 'lodash'

export default {
    data: () => ({
        filterText: ''
    }),
    methods: {
        resetFilter() {
            this.filterText = ''
            this.$emit('filter:reset')
        },
        searchInput: _.debounce(function() {
            this.$emit('filter:set', this.filterText)
        }, 300)
    }
}
</script>
<style>
    /* .filter-bar {
        padding: 10px;
    } */
</style>
