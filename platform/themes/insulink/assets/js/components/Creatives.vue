<template>
  <div>
    
    <section id="travel-form" class="bg-gray-200">
      <div class="container py-12">
        <div class="row justify-content-center">
          <div class="col-sm-8">
            <form @submit.prevent="submitForm" novalidate>
              <!-- Name Input -->
              <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input
                  type="text"
                  v-model="formData.name"
                  class="form-control"
                  id="name"
                  required
                />
              </div>

              <!-- Email Input -->
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input
                  type="email"
                  v-model="formData.email"
                  class="form-control"
                  id="email"
                  required
                />
              </div>

              <!-- Phone Input -->
              <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input
                  type="tel"
                  v-model="formData.phone"
                  class="form-control"
                  id="phone"
                  required
                />
              </div>

              <!-- Contact Preference Checkbox -->
              <div class="mb-3">
                <label class="form-label"
                  >How do you prefer we contact you?</label
                >
                <div class="form-check">
                  <input
                    type="checkbox"
                    class="form-check-input"
                    id="callMe"
                    value="Call me"
                    v-model="formData.contactPreference"
                  />
                  <label class="form-check-label" for="callMe">Call me</label>
                </div>
                <div class="form-check">
                  <input
                    type="checkbox"
                    class="form-check-input"
                    id="whatsappMe"
                    value="Whatsapp me"
                    v-model="formData.contactPreference"
                  />
                  <label class="form-check-label" for="whatsappMe"
                    >Whatsapp me</label
                  >
                </div>
                <div class="form-check">
                  <input
                    type="checkbox"
                    class="form-check-input"
                    id="emailMe"
                    value="Email me"
                    v-model="formData.contactPreference"
                  />
                  <label class="form-check-label" for="emailMe">Email me</label>
                </div>
              </div>

              <!-- Date Picker -->
              <div class="mb-3">
                <label for="contactDate" class="form-label"
                  >When do we contact you?</label
                >
                <input
                  type="date"
                  v-model="formData.contactDate"
                  class="form-control"
                  id="contactDate"
                  required
                />
              </div>

              <button type="submit" class="btn btn-primary rounded-full">
                Submit
              </button>
            </form>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>
<script>
export default {
  data() {
    return {
      formData: {
        name: "",
        email: "",
        phone: "",
        contactPreference: [],
        contactDate: "",
        currentPage: null,
      },
      buttonLoading: false,
      loading: false,
    };
  },
  created() {
    this.getcountries();
  },
  mounted() {
    // Get the current page name when the component is mounted
    this.formData.currentPage = this.getPageName();
  },
  methods: {
    getPageName() {
      // Get the pathname from the window.location object
      const pathname = window.location.pathname;

      // Extract the last segment of the pathname as the page name
      const segments = pathname.split("/");
      const lastSegment = segments[segments.length - 1];

      return lastSegment;
    },
    getcountries() {
      axios
        .get("/ajax/countries")
        .then((response) => {
          this.countries = response.data;
        })
        .catch((err) => {
          Toast.fire({
            icon: "error",
            title: err,
          });
        });
    },
    submitForm() {
      this.buttonLoading = true;

      this.$recaptcha("travelquote").then((token) => {
        if (token) {
          axios
            .post("/quotations/submit-form", this.formData)
            .then((response) => {
              Toast.fire({
                icon: "success",
                title: response.data.message,
              });
              this.buttonLoading = false;
              window.location.href = "/";
            })
            .catch((err) => {
              Toast.fire({
                icon: "error",
                title: err,
              });
            });
        } else {
          Toast.fire({
            icon: "warning",
            title: "there was a problem, try again later",
          });
        }
      });
    },
  },
};
</script>
