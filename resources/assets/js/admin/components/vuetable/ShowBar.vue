<template>
    <div>
        <label>
            <span>По:</span>
            <select name="select" @change="changeItem" v-model="selected" class="form-control" style="width: 70px;">
                <option value="20">20</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
        </label>
    </div>
</template>

<script>
export default {
    data: () => ({
        selected: 20
    }),
    methods: {
        changeItem() {
            this.$emit('show:set', +this.selected)
        }
    }
}
</script>

<style>
</style>
