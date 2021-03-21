<template>
    <el-collapse v-model="activeName" accordion>
  <el-collapse-item title="Convenience" name="1">
    <div>To allow our clients to get the best policies, compare the rates, the benefits from different insurance providers in one platform. Other than buying a policy online, you will be in a position to file a claim online.</div>
  </el-collapse-item>
  <el-collapse-item title="Credibility" name="2">
    <div>Insulink works closely with the insurance providers to ensure credible data and information are passed to you from your insurance providers. By reducing the paperwork, we allow you to have all the information regarding your policies under one platform.</div>
  </el-collapse-item>
  <el-collapse-item title="Customer-centric" name="3">
    <div>We promise direct interactions with our clients. Our team of experts will always be here to offer a remarkable customer experience all through your customer life cycle as well as your insurance journey. Our focus is to ensure that we listen to you and offer solutions.</div>
  </el-collapse-item>
</el-collapse>
</template>

<script>
    export default {
        data() {
          return {
            activeName: '1'
          }
        },
    }
</script>

