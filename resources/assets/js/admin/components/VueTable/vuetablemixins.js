module.exports = {
    data: () => ({
        css: {
            table: {
                tableClass: 'table datatable-button-init-custom dataTable no-footer',
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
            Vue.nextTick(() => this.$refs.vuetable.refresh())
        },
        filterReset() {
            this.moreParams = {}
            Vue.nextTick(() => this.$refs.vuetable.refresh())
        },
        showSet(value) {
            this.perPage = value
            Vue.nextTick(() => this.$refs.vuetable.refresh())
        }
    }
}