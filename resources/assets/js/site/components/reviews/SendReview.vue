<template>
    <div>
        <template v-if="!isReview">
            <h6 class="offset-top-34 text-uppercase text-left text-bold">{{firstName}} {{middleName}}, пользовались нашими услугами? Оставьте отзыв</h6>
            <form class="offset-top-10 text-left">
                <div class="form-group">
                    <label class="form-label form-label-outside" for="box-comment-classic-comment-message">Оценка:</label>
                    <!-- <div class="product-rating">
                        <span class="mdi mdi-star"></span>
                        <span class="mdi mdi-star"></span>
                        <span class="mdi mdi-star"></span>
                        <span class="mdi mdi-star-half"></span>
                        <span class="mdi mdi-star-outline"></span>
                    </div> -->
                    <star-rating v-model="rating" :show-rating="false" :star-size="14" :padding="10" :inactive-color="'#fff'" :border-color="'#f5bf2f'" :border-width="2"></star-rating>
                </div>

                <div class="form-group">
                    <label class="form-label form-label-outside" for="box-comment-classic-comment-message">Сообщение:</label>
                    <textarea class="form-control" id="box-comment-classic-comment-message" v-model="text"></textarea>
                </div>
                <div class="group-sm text-left offset-top-20">
                    <button class="btn btn-md btn-primary" type="button" @click.prevent="reviewSend">Оставить отзыв</button>
                </div>

            </form>  
        </template>
        <template v-else> 
            <h6 class="offset-top-34 text-uppercase text-left text-bold">{{firstName}} {{middleName}}, отзыв появится на странице после проверки. Спасибо</h6>
        </template>
    </div>
</template>

<script>
import StarRating from 'vue-star-rating'

export default {
    props: ['firstName', 'middleName'],
    components: { StarRating },
    data: () => ({
        isReview: false,
        rating: 0,
        text: ''
    }),
    methods: {
        reviewSend() {
            axios.post("/api/site/reviews", { rating: this.rating, text: this.text })
                .then((res) => {
                    this.isReview = true
                })
                .catch((res) => {
                    //
                })

        },
        clearErrors() {
            // _.each(this.inputs, (value, i) => {
            //     this.inputs[i].hasErrors = ''
            //     this.inputs[i].errorMessage = null
            // })
        },
        setErrors(err) {
            // if (!err) return;

            // _.each(this.inputs, (value, i) => {
            //     this.inputs[i].errorMessage = _.isArray(err[value.attr]) ? err[value.attr][0] : err[value.attr]
            //     if (this.inputs[i].errorMessage) { this.inputs[i].hasErrors = true }
            // })
        },
    }
  
}
</script>

<style>

</style>