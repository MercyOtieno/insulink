<template>
    <div class="container">
        <b-row>
          <div class="col-sm-12 my-6">
            <el-collapse v-model="activeNames" accordion>
  <el-collapse-item title="Who is Insulink Kenya Ltd?" name="1">
    <div>Insulink Kenya Ltd is an online insurance agency licensed and regulated by the IRA (Insurance Regulatory Authority) as well as endorsed by AKI (Association of Kenyan Insurers) to represent various underwriters and transact business online.</div>
  </el-collapse-item>
  <el-collapse-item title="Why should I choose and buy from Insulink?" name="2">
    <div>u get to compare quotes from your favorite underwriters online. You get to buy and book policies online, track your payments, policies, claims on your account. We offer free valuation at your parking lot. We offer services with less paperwork.</div>
  </el-collapse-item>
  <el-collapse-item title="Is there any hidden cost when buying a policy?" name="3">
    <div>There are no hidden costs added to your premiums. Payments are made directly to the underwriters using their MPESA pay-bill numbers, and Insulink doesn't charge any cent on top of the Premiums. There might be a slight variation in the prices once the underwriters compare the assessment reports.</div>
  </el-collapse-item>
  <el-collapse-item title="How long does it take to get my insurance policy after making the payment?" name="4">
    <div>For motor insurance, you will get a one-month cover, pending valuation, you will get a one-month cover, and based on the valuation report, your premium might go high or low. For other classes of Insurance, once you get a quote and give out all your key-details, you will book the business and get and get an acceptance letter. You will get a notification with the directives to make the payment to get on the cover.</div>
  </el-collapse-item>
  <el-collapse-item title="What makes you different from other insurance agents/agencies?" name="5">
    <div>We swear by our core pillars: convenience, credibility, and customer-centric. Kenya is embracing technology, and so is the insurance industry. We are here to ensure that we help redefine your insurance experience. We are here to not only offer credible digital services but also to empower you, the client, to understand and learn more about Insurance. We also have experienced in-house insurance agents who work closely with the underwriters to ensure that you get the best policy that suits your needs and meets your budget.</div>
  </el-collapse-item>
  <el-collapse-item title="Is my data safe with you?" name="6">
    <div>Once you create an account with us, you enter into a contract with us. We will only use this data to get your policy by sharing the data with the underwriters. This data is to be used to get your quotes, buy insurance policies, book valuations, as well as file and process a claim.</div>
  </el-collapse-item>
</el-collapse>
          </div>
        </b-row>
    </div>
</template>

<script>
    export default {
        data() {
          return {
            activeNames: ['1']
          }
        },
    }
</script>

<style lang="scss" scoped>

</style>