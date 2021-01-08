<template>
    <div class="mt-md-4 orders-container">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>Number</th>
                    <th>Customer</th>
                    <th>Date</th>
                    <th>Total Amount</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tr v-for="order in orders" :key="order.id">
                <td>{{order.OrderNumber}}</td>
                <td>{{order.customer.FirstName}} {{order.customer.LastName}}</td>
                <td>{{order.OrderDate}}</td>
                <td>{{order.TotalAmount}}</td>
                <td>
                    <a :href="/editorder/ + order.id" class="btn btn-link">Edit</a>
                    <a class="btn btn-link">Delete</a>
                </td>
            </tr>
        </table>
    </div>
</template>
<script>
export default {
    name:'Orderstable',
    props:['orders'],
    mounted:function(){
        console.log(this.orders)
    }
}
</script>
<style lang="stylus" scoped>

</style>