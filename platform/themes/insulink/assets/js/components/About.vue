<template>
    <div class="my-4">
      <b-container>
        <div class="flex -mx-4 flex-wrap overflow-hidden">
          <div class="w-full px-3 overflow-hidden sm:w-full md:w-3/5 lg:w-3/5 xl:w-3/5">
            <div class="py-4">
              <p>
                Insulink Kenya Ltd is an online insurance agency licensed and
                regulated by the IRA (Insurance Regulatory Authority) as well as
                endorsed by AKI (Association of Kenyan Insurers) to represent
                various underwriters and transact business online.
              </p>
              <p>
                The first of its kind, to provide an online platform that
                creates empowerment, offer convenience, efficiency and
                credibility.
              </p>
              <p>
                Our main goal is to create awareness and help our clients
                understand all matters insurance through our experienced team of
                agents, and we closely work with the underwriters from your
                favorite insurance companies, to ensure that we give you the
                best policies that are customized to meet your expectations.
              </p>
              <p>
                Our experienced team will advise on the best policy based on the
                risks, your budget, the benefits and exclusions provided by
                various insurance providers.
              </p>
              <p>
                This is your one stop shop for insurance, you can buy, compare
                quotes, renew policies, make claims online.
              </p>
              <p>
                Once you have an account with us, you will be able to track your
                policies, claims history, savings, investment, payments and
                renewal policies.
              </p>
            </div>
          </div>
          <div class="lg:w-2/5 px-3 w-full overflow-hidden sm:w-full md:w-2/5 xl:w-2/5">
            <div class="p-4" style="background-color: #e2e8f0">
              <div class="box mb-4">
                <h3 style="color: #048abf" class="text-uppercase mb-4">
                  Our Mission
                </h3>
                <p>
                  To make a vital contribution to the insurance industry by
                  empowering the consumers. We listen to our customers and work
                  hand in hand with the insurance providers to ensure we meet
                  their needs.
                </p>
              </div>
              <div class="box">
                <h3 style="color: #048abf" class="text-uppercase mb-4">
                  Our Vision
                </h3>
                <p>
                  To set the standard of excellence among insurance agencies
                  together with the insurance providers by being innovative and
                  empowering the consumers. We look forward to redefining the
                  insurance experience in the country by making sure we offer
                  the best customer experience in the insurance industry.
                </p>
              </div>
            </div>
          </div>
        </div>
      </b-container>
    <section style="background: #f3f7fa" class="py-9">
      <b-container>
        <h3 class="mb-4 text-uppercase">Why Us</h3>
        <div class="flex -mx-4 flex-wrap overflow-hidden">
          <div class="w-full px-3 overflow-hidden sm:w-full md:w-full lg:w-full xl:w-1/2">
            <img src="/images/why-us.png" alt="" />
          </div>
          <div class="w-full px-3 overflow-hidden sm:w-full md:w-full lg:w-full xl:w-1/2">
              <why-us></why-us>
          </div>
        </div>
      </b-container>
    </section> 
    </div>
</template>
<script>
import WhyUs from './Whyus'
export default {
  name:"About",
    components:{
        WhyUs
    }
}
</script>
<style lang="scss" scoped>
  
</style>