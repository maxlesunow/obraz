<template>
  <div>
      <login v-if="!restoreMode" :restore-mode.sync="restoreMode"></login>
      <restore v-else :restore-mode.sync="restoreMode"></restore>
  </div>
</template>

<script>
import Login from './Login'
import Restore from './Restore'

export default {
  components: { Login, Restore },
  data: () => ({
      restoreMode: false
  })
}
</script>

<style>

</style>
