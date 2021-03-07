<template>
    <div>
        {{quotations}}
    </div>
</template>

<script>
    export default {
        data() {
            return {
                quotations:{}
            }
        },
        mounted() {
            this.getquotations();
        },
        methods: {
            getquotations(){
                axios.get('/quote-customer')
                    .then((response) => {
                            this.quotations = response.data
                        }, (error) => {
                            console.log(error);
                        });
            }
        },
    }
</script>
