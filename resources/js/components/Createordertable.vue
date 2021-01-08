<template>
    <div>
        <div v-if="errMessage!=''" class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>{{errMessage}}</strong>
            <a @click="errMessage = ''" href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        </div>
        <div v-if="successMessage" class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Saved</strong>
            <a @click="successMessage = false" href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        </div>
        <div class="mb-3 ">
            <label class="form-label">Date</label>
            <input @change="orders=[]" v-model="date" required name="orderdate" type="date" class="form-control" id="order-date" placeholder="Date">
        </div>
        <div>
            <label class="form-label">Customer</label>
            <select @change="orders=[]" v-model="customerId" name="customerid" class="form-select form-select-lg form-control mb-3" aria-label=".form-select-lg example">
                <option value="" selected>Select Customer</option>
                <option v-for="customer in customers" :key="customer.id" :value="customer.id">{{customer.FirstName}} {{customer.LastName}}</option>    
            </select>
        </div>
        <div>
            <label class="form-label">Item</label>
            <select v-model="productId" name="" id="" class="form-select form-select-lg form-control mb-3">
                <option value="" selected>Select an item</option>
                <option v-for="product in products" :key="'p'+product.id" :value="product.id">{{product.ProductName}}</option>
            </select>
        </div>
        <div class="mb-3 ">
            <label class="form-label">Qty</label>
            <input v-model="quantity" required name="orderquantity" min="1" type="number" class="form-control" id="order-date" placeholder="Date" value="1">
        </div>   
        <button @click="addOrders" class="btn btn-primary">Add</button>
        
        <div class="mt-4">
            <h4>Items Table</h4>
            <table class="table">
                <tr>
                    <th>Item</th>
                    <th>Qty</th>
                    <th>Edit</th>
                </tr>
                <tr v-for="or in orders" :key="'p'+or.ProductId">
                    <th>{{or.ProductName}}</th>
                    <th>{{or.ProductQuantity}}</th>
                    <th><button @click="deleteItem(or.ProductId)" class="close text-danger" >&times;</button></th>
                </tr>
            </table>
            <button v-if="orders.length > 0" @click="saveOrder()" class="btn btn-primary mt-3">Save</button>
        </div>
    </div>
</template>
<script>
export default {
    name:'Createordertable',
    props:['customers', 'products'],
    data:function(){
        return{
            orderNumber:'',
            customerId:'',
            productId:'',
            date:'',
            quantity:1,
            orders:[],
            errMessage:'',
            successMessage:false,
        }
    },
    methods:{
        addOrders:function(){
          if(this.customerId != '' && this.productId !='' && this.date != ''){
                let order = {
                OrderNumber: this.orderNumber,
                CustomerId: this.customerId,
                ProductId: this.productId,
                ProductName:this.productN,
                ProductQuantity:this.quantity,
                OrderDate: this.date,    
                }
                if((this.orders.find(x => x.ProductId == this.productId)) == undefined){
                    this.orders.push(order); 
                    this.errMessage = '';
                }else{
                    this.errMessage = 'Item allready exist';
                }
          }else{
              this.errMessage = 'Customer, item, and date are required';
          }
          
        },
        saveOrder:function(){
        axios.post('/addorder',this.orders)
              .then(response => {
                 if(response.data == 'success'){
                    this.successMessage = true;
                    this.orders = [];
                    this.orderNumber=this.CustomerId=this.productId=this.date='';
                    this.quantity=1;
                    this.errMessage='';
                 }
              }).catch(err => this.errMessage=err.response)
        },
        deleteItem:function(id){
           for(let i = 0; i < this.orders.length; i++){
               if(this.orders[i].ProductId == id){
                   this.orders.splice(i, 1)
               }
           }
        }

    },
    computed:{
        productN:function(){
            let pr = this.products.find(x => x.id == this.productId);
           return pr.ProductName;
        }
    }
}
</script>
<style scoped>

</style>