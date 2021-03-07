<template>
    <el-collapse v-model="activeName" accordion>
  <el-collapse-item title="Convenience" name="1">
    <div>To give our clients an opportunity to get the best policies, compare the rates, the benefits from different insurance providers in one platform. Other than buying a policy online, you will be in a position to file for a claim online. No more paperwork.</div>
  </el-collapse-item>
  <el-collapse-item title="Customer Centric" name="2">
    <div>We have a team that is willing to go above and beyond to ensure our customers have the best experience. Through customer engagement we will ensure we use the key metrics to meet their needs all through the customer journey.</div>
  </el-collapse-item>
  <el-collapse-item title="Credibility" name="3">
    <div>Insu_link works closely with the insurance providers to ensure credible data and information passed to you from your insurance providers. We bridge the gap in the insurance industry by reducing all the paperwork and allowing you to have all your policies on one platform. You have got a question?</div>
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

