<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        I'm an example component and am receiving {{ message }} as props.

                        <button class="btn btn-outline-dark">Click me</button>

                        <div v-if="customers.length > 0">
                            <ul class="list-group">
                                <li class="list-group-item" v-for="customer in customers" :key="customer.id">
                                    {{ customer.name }}
                                </li>
                            </ul>
                        </div>
                        <div v-else>
                            <p class="alert-alert-info">No Customers Found</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                customers: []
            }
        },
        props: {
            message: String
        },
        mounted() {
            axios
              .get("/api/customers")
              .then(res => this.customers = res.data.data)
              .catch(err => console.error(err));
        }
    }
</script>

<style scoped>
 
</style>
