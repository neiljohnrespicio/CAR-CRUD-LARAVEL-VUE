<template>
    <div>
        
        <div class="container">

            
            
            <div>
                <table class="data">
                    <thead>
                        <th>Brand</th>
                        <th>Model</th>
                        <th>Date Purchased</th>
                        <th>Previous Owner</th>
                        <th>Contact No.</th>
                        <th>Status</th>
                        <th>Owner</th>
                        <th colspan="3">Operation</th>
                        
                    </thead>
                    <tbody>
                        <tr v-for="(item, index) in Sold" ::key="index">
                            <td>{{item.brand}}</td>
                            <td>{{item.model}}</td>
                            <td>{{item.datepur}}</td>
                            <td>{{item.prevowner}}</td>
                            <td>{{item.cpn}}</td>
                            <td>{{item.status}}</td>
                            <td>{{item.owner}}</td>
                            <td>
                                <button class="green" disabled>Available For {{ item.state }}</button>
                            </td>
                            
                        </tr>    

                    </tbody>
                 </table>

            </div>
            
        </div>
        
    </div>
</template>
<script>
export default {
    props:['item_sold'],

    data() {
        return {
            Sold:[],
            
        }
    },
    mounted(){
        this.Sold = this.item_sold;
    },
    watch:{
        item_sold(New,Old){
            this.Sold= New;
        }
    },
    
}



</script>
<style>
    .container{
        margin-left: 10%;
        margin-right: 10%;
        justify-content: center;
        background-color: #DDE6ED;
        display: flex;
        padding: 30px;
        border-radius: 20px;
    }

    .data {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    .data td, .data th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    .data tr:nth-child(even){background-color: #f2f2f2;}

    .data tr:hover {background-color: #ddd;}

    .data th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: center;
        background-color: #116D6E;
        color:white;
    }
    td{
        text-align: center;
    }
    
    
</style>