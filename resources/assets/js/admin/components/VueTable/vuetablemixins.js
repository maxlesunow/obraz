module.exports = {
    data: () => ({
        css: {
            table: {
                tableClass: 'table datatable-button-init-custom dataTable no-footer',
                ascendingIcon: 'icon-chevron-up',
                descendingIcon: 'icon-chevron-down'
            },
            pagination: {
                wrapperClass: 'pagination dataTables_paginate',
                activeClass: 'active',
                disabledClass: 'disabled',
                pageClass: 'page',
                linkClass: 'link',
                icons: {
                    first: '',
                    prev: '',
                    next: '',
                    last: '',
                },
            },
            icons: {
                first: 'icon-step-backward',
                prev: 'icon-chevron-left',
                next: 'icon-chevron-right',
                last: 'icon-step-forward',
            },
        },
        moreParams: {}
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
                filter: filterText
            }
            Vue.nextTick(() => this.$refs.vuetable.refresh())
        },
        filterReset() {
            this.moreParams = {}
            Vue.nextTick(() => this.$refs.vuetable.refresh())
        }
    }
}