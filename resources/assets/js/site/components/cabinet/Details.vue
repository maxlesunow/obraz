<template>
  <div>
      <defaults v-if="!passwordMode" :password-mode.sync="passwordMode"></defaults>
      <password v-else :password-mode.sync="passwordMode"></password>
  </div>
</template>

<script>
import Defaults from './Defaults'
import Password from './Password'

export default {
  components: { Defaults, Password },
  data: () => ({
      passwordMode: false
  })
}
</script>

<style>

</style>
