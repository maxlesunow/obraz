<template>
    <div>
        <label>
            <span>По:</span>
            <select name="select" @change="changeItem" v-model="selected" class="form-control" style="width: 65px;">
                <option value="10">10</option>
                <option value="20">20</option>
                <option value="30">30</option>
            </select>
        </label>
    </div>
</template>

<script>
export default {
    data: () => ({
        selected: 10
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
