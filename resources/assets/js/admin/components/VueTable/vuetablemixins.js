module.exports = {
    data: () => ({
        css: {
            table: {
                tableClass: 'table datatable-basic dataTable no-footer',
                ascendingIcon: ' icon-sort-amount-asc',
                descendingIcon: ' icon-sort-amount-desc',
                sortableIcon: 'icon-sort'
            },
            pagination: {
                wrapperClass: 'pagination dataTables_paginate',
                activeClass: 'current',
                disabledClass: 'disabled',
                pageClass: 'paginate_button',
                linkClass: 'paginate_button',
                icons: {
                    first: 'icon-first',
                    prev: 'icon-previous2',
                    next: 'icon-next2',
                    last: 'icon-last',
                },
            },
        },
        template: {
            paginationInfo: 'Показано с {from} по {to} из {total} элементов'
        },
        moreParams: {},
        perPage: 20
    }),
    methods: {
        updateTable() {
            Vue.nextTick(() => this.$refs.vuetable.refresh())
        },
        onPaginationData(paginationData) {
            this.$refs.pagination.setPaginationData(paginationData)
            this.$refs.paginationInfo.setPaginationData(paginationData)
        },
        onChangePage(page) {
            this.$refs.vuetable.changePage(page)
        },
        onCellClicked(data, field, event) {
            this.$refs.vuetable.toggleDetailRow(data.id)
        },
        filterSet(filterText) {
            this.moreParams = {
                search: filterText
            }
            this.updateTable()
        },
        filterReset() {
            this.moreParams = {}
            this.updateTable()
        },
        showSet(value) {
            this.perPage = value
            this.updateTable()
        },
        loadedTable() {
            $(this.$el).find('input[type="checkbox"]').uniform({
                radioClass: 'choice'
            });
        }
    }
}