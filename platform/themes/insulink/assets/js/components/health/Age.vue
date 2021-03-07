<template>
  <div class="swiper-slide step-one dsc_hero-section py-3">
    <div class="container mt-6">
      <h2
        class="text-2xl font-bold leading-7 text-primary-color sm:text-3xl sm:leading-9 sm:truncate mb-2 text-center"
      >
        You can save more by Providing Accurate data
      </h2>
    

      <div class="row justify-content-center my-6">
        <div class="col-sm-8">
          <el-card class="box-card">
            <div class="form-group">
              <label for="">Select your Age Bracket below </label>
              <el-radio-group v-model="age" >
                  <el-radio :label="1" border>18 years - 30 years </el-radio>
                  <el-radio :label="2" border>31 years - 40 years </el-radio>
                  <el-radio :label="3" border>41 years - 50 years </el-radio>
                  <el-radio :label="4" border>51 years - 60 years </el-radio>
                  <el-radio :label="5" border>61 years - 70 years </el-radio>
                  <el-radio :label="6" border>71 years - above</el-radio>
              </el-radio-group>
          </div>
          </el-card>
          
        </div>
      </div>
      <div class="row justify-content-center my-6" v-if="this.age === 1 || this.age === 2 || this.age === 3 || this.age === 4 || this.age === 5 ">
        <div class="col-sm-8">
           <el-card class="box-card">
             <div slot="header" class="clearfix">
                <span>Cover Details</span>
              </div>
            <div class="card-body">
              <div class="form-group">
                <label for="" class="d-block">Annual Inpatient Cover Limit</label>
                 <el-select v-model="ip" placeholder="Select In-Patient Amount" class="d-block">
                    <el-option
                      v-for="item in inpatient"
                      :key="item.value"
                      :label="item.label"
                      :value="item.value">
                    </el-option>
                  </el-select>
              </div>
              <div class="form-group">
                <label for="" class="d-block">Do you have any pre-existing medical condition? <small>A health problem, like asthma, diabetes, or cancer</small></label>
                <el-radio-group v-model="pre_existing" >
                  <el-radio :label="1" border>Yes</el-radio>
                  <el-radio :label="0" border>No</el-radio>
                </el-radio-group>
              </div>

             <div class="form-group" v-show="pre_existing ===1">
                <label for="">Kindly state the Pre-existing conditions below</label>
                <el-input
                  type="textarea"
                  :rows="2"
                  placeholder="Please state the Pre-existing conditions here ..."
                  v-model="pre_existing_details">
                </el-input>
             </div>
              <div class="form-group">
                <label for="" class="d-block">Date of Birth of the Applicant</label>
                <el-date-picker
                  v-model="dob"
                  type="date"
                  placeholder="Pick the Day you were Born">
                </el-date-picker>
              </div>
            </div>
           </el-card>
        </div>
      </div>
    </div>
     <div class="container">
      <div class="row justify-content-center">
        <div class="col-sm-6">
          <div
            class="jituze-step-three-pagination__navigation jituze-pagination__navigation"
          >
            <button
              :disabled="checkifdob"
              class="swiper-motor-button-next w-full sm:w-auto flex-none bg-blue-900 hover:bg-blue-700 text-white text-lg py-3 px-6 border border-transparent rounded-xl focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-900 focus:outline-none transition-colors duration-200 active-item display-flex"
              @click="customerselect"
            >
              Choose Who to Cover
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapState, mapGetters, mapActions } from "vuex";
export default {
  props: ["healthSwiper", "activateNext", "activateGetQuotes"],
  data() {
    return {
      age: 0,
      ip:200000,
      pre_existing:0,
      pre_existing_details:0,
      op:0,
      inpatient: [{
          value: '200000',
          label: 'Kes 200,000'
        }, {
          value: '400000',
          label: 'Kes 400,000'
        }, {
          value: '500000',
          label: 'Kes 500,000'
        }, {
          value: '750000',
          label: 'Kes 750,000'
        },{
          value: '1000000',
          label: 'Kes 1,000,000'
        }, {
          value: '2000000',
          label: 'Kes 2,000,000'
        }, {
          value: '3000000',
          label: 'Kes 3,000,000'
        }, {
          value: '5000000',
          label: 'Kes 5,000,000'
        }, {
          value: '6000000',
          label: 'Kes 6,000,000'
        }, {
          value: '10000000',
          label: 'Kes 10,000,000'
        },
        {
          value: '12000000',
          label: 'Kes 12,000,000'
        }, {
          value: '20000000',
          label: 'Kes 20,000,000'
        }, {
          value: '40000000',
          label: 'Kes 40,000,000'
        }],
        maternity_limit: [{
          value: '25000',
          label: 'Kes 25,000'
        }, {
          value: '40000',
          label: 'Kes 40,000'
        }, {
          value: '50000',
          label: 'Kes 50,000'
        }, {
          value: '100000',
          label: 'Kes 100,000'
        }, {
          value: '250000',
          label: 'Kes 250,000'
        }, {
          value: '500000',
          label: 'Kes 500,000'
        }],
        optical_limit: [{
          value: '5000',
          label: 'Kes 5,000'
        }, {
          value: '10000',
          label: 'Kes 10,000'
        }, {
          value: '20000',
          label: 'Kes 20,000'
        }, {
          value: '30000',
          label: 'Kes 30,000'
        }, {
          value: '40000',
          label: 'Kes 40,000'
        }, {
          value: '50000',
          label: 'Kes 50,000'
        }],
        dental_limit: [{
          value: '5000',
          label: 'Kes 5,000'
        }, {
          value: '10000',
          label: 'Kes 10,000'
        }, {
          value: '20000',
          label: 'Kes 20,000'
        }, {
          value: '30000',
          label: 'Kes 30,000'
        }, {
          value: '40000',
          label: 'Kes 40,000'
        }, {
          value: '50000',
          label: 'Kes 50,000'
        }],
      dob:"",
        pickerOptions: {
          disabledDate(time) {
            return time.getTime() > Date.now() - 18;
          },
          shortcuts: [{
            text: 'Today',
            onClick(picker) {
              picker.$emit('pick', new Date());
            }
          }, {
            text: 'Yesterday',
            onClick(picker) {
              const date = new Date();
              date.setTime(date.getTime() - 3600 * 1000 * 24);
              picker.$emit('pick', date);
            }
          }, {
            text: 'A week ago',
            onClick(picker) {
              const date = new Date();
              date.setTime(date.getTime() - 3600 * 1000 * 24 * 7);
              picker.$emit('pick', date);
            }
          }]
        },
    };
  },
  computed: {
    checkifdob(){
      if (this.dob ==='') {
        return true;
      }
    }
  },
  methods: {
      customerselect() {
       //e.preventDefault();
      Swal.fire({
        title: "Please Wait..",
        text: "We are preparing the best for you, just hold on ...",
        allowOutsideClick: false,
        allowEscapeKey: false,
        allowEnterKey: false,
        onOpen: () => {
          Swal.showLoading();
        }
      });
      let payload = {
        age:this.age,
        dob:this.dob,
        ip:this.ip,
        pre_existing:this.pre_existing,
        pre_existing_details:this.pre_existing_details,
        maternity:this.maternity,
        maternity_rate:this.maternity_rate,
        optical_rate:this.optical_rate,
        dental_rate:this.dental_rate,
        optical:this.optical,
        dental:this.dental,
      };
      this.$store
            .dispatch("gethealthcustomertype", payload);
            this.healthSwiper.slideTo(1);
            this.healthSwiper.update();
            Swal.close();
    }
  },
};
</script>

<style lang="scss" scoped>
.el-radio.is-bordered+.el-radio.is-bordered {
    margin-left: 18px;
}
.el-radio {
    margin-right: 0;
    /* margin-right: 30px; */
}
</style>