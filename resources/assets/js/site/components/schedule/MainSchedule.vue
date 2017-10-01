<template>
    <div>
        <div>
            <div class="range range-sm-center">
              <div class="cell-sm-12 text-left">
                <div class="form-group">
                    <select2 :filters="filters" select-name="courseType" @select2:set="select2Set"></select2>
                </div>
              </div>
              <div class="cell-sm-12 cell-md-6 text-left">
                <div class="form-group">
                  <input class="form-control offset-top-24" id="rd-mailform-date" type="text" placeholder="Дата начала" name="date" data-time-picker="date">
                </div>
              </div>
              <div class="cell-sm-12 cell-md-6 text-left">
                <div class="form-group">
                  <input class="form-control offset-top-24" id="rd-mailform-date" type="text" placeholder="Дата конца" name="date" data-time-picker="date">
                </div>
              </div>
            </div>
        </div>
        <section>
            <div class="post-modern-timeline-date text-sm-right">
                <time datetime="2016-01-01">24 Feb</time>
            </div>
            <!-- Post Modern-->
            <article class="post post-modern post-modern-timeline post-modern-timeline-right">
                <!-- Post media-->
                <!-- Post content-->
                <section class="post-content text-left">
                    <ul class="list-inline">
                        <li>
                            <div class="post-tags group-xs">
                                <a class="label-custom label-lg-custom label-rounded-custom label-primary" href="blog-classic-single-post.html">News</a>
                            </div>
                        </li>
                        <li>
                            <div class="icon icon-xxs text-dark mdi mdi-pen"></div>
                        </li>
                    </ul>
                    <!-- Post Title-->
                    <div class="post-title">
                        <h6 class="offset-top-24">
                            <a href="blog-classic-single-post.html">5 Steps to Blog’s Success</a>
                        </h6>
                    </div>
                    <!-- Post Body-->
                    <div class="post-body offset-top-20">
                        <p>Unfortunately people will not come to your blog just to see what you have published on it. To make sure that your blog becomes a successful one, you have to work on it to attract visitors interested in your content.</p>
                    </div>
                    <div class="post-author">
                        <div class="post-author-img"><img class="img-circle" width="45" height="45" src="images/users/user-eugene-newman-60x60.jpg" alt="Eugene Newman"></div>
                        <div class="post-author-name text-middle">Eugene Newman
                        </div>
                    </div>
                </section>
            </article>
        </section>
        <footer class="offset-top-66">
            <div class="post-modern-timeline-right">
                <!-- Bootstrap Pager-->
                <nav>
                    <ul class="pager">
                        <li class="previous">
                            <a href="#">
                                <span class="icon-left mdi mdi-arrow-left" aria-hidden="true"></span>Older</a>
                        </li>
                        <li class="next">
                            <a href="#">Newer
                                <span class="icon-right mdi mdi-arrow-right" aria-hidden="true"></span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </footer>
    </div>
</template>

<script>
import Select2 from './../../../admin/components/Select2'

export default {
    components: { Select2 },
    data: () => ({
        additionalFilter: {},
        filterField: {},
        filters: {
            courseType: {
                // ajax: { url: '/api/course/types', text: 'name' },
                multiple: true,
                data: [{ id: "true", text: "Оплачено" }, { id: "false", text: "Не оплачено" }],
                field: 'reservations.payment_status',
            }
        },
    }),
    methods: {
        formatFilterPhp(filterFiled = {}) {
            var normalFilterField = JSON.parse(JSON.stringify(filterFiled)) // normalize object (remove functions and _proto)
            var entries = Object.entries(normalFilterField)
            var filters = entries.map((el) => el.join('|'))

            return filters.join(',')
        },
        select2Set(value, name) {
            var destName = this.filters[name].field;
            this.filterField[destName] = value
            if (value === '' || value === '-1') {
                delete this.filterField[destName]
            }
            var filters = [this.formatFilterPhp(this.additionalFilter), this.formatFilterPhp(this.filterField)].join(',')
            console.log('set', filters)
            // this.moreParams.filters = filters
            // this.updateTable()
        },
    },
    created() {
        axios.get('/api/course/types')
            .then((data) => {
                this.filters.courseType.data = data.data.map((el) => ({ id: el.id, text: el[this.options.ajax.text] }))
            })
    }
}
</script>

<style>

</style>
