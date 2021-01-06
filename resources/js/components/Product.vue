<template>
    <div class="col-md-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">{{productname}}</h5>
        <p class="card-text">{{unitprice}}</p>
        <p>Company Name: {{companyname}}</p>
        <a :href="/editproduct/+productid" class="btn btn-primary">Edit</a>
      </div>
    </div>
  </div>
</template>
<script>
export default {
    name:'Product',
    props:['productid', 'productname', 'unitprice', 'companyname'],
}
</script>
<style scoped>

</style>