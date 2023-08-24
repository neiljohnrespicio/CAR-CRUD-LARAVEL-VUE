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
                        <tr v-for="(item, index) in getItems" ::key="index">
                            <td>{{item.brand}}</td>
                            <td>{{item.model}}</td>
                            <td>{{item.datepur}}</td>
                            <td>{{item.prevowner}}</td>
                            <td>{{item.cpn}}</td>
                            <td>{{item.status}}</td>
                            <td>{{item.owner}}</td>
                            <td><button  class="green" @click="$emit('edit', item)">Edit</button></td>
                            <td><button class="red" @click="deletename(item, id)">Delete</button></td>
                            <td>
                                <button class="green" @click="state1(item, id)" v-if="item.state === 'Sell'">{{ item.state }}</button>
                                <button class="green" disabled v-else>{{ item.state }}</button>
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
    props:['items'],
    
    data() {
        return {
            getItems:[],
            sellCar:false,
            

        }
    },
    //----------------Delete---Function
    methods:{
        deletename(id){
            if(confirm("Are you Sure")){
                axios.post('/delete-name',{id})
                .then(({data})=>{
                    if(data){
                        alert("Deleted");
                        this.$emit('successful');
                    }
                });
            }
        },
        
        state1(id){
            if(confirm("Are you Sure")){
                axios.post('/sell-car',{id})
                .then(({data})=>{
                    if(data){
                        this.sellCar = true;
                        alert("Car Is Sold");
                        this.$emit('sell');
                    }
                });
            }

        }



    },

    mounted(){
        this.getItems = this.items;
        
    },
    watch:{
        items(New,Old){
            this.getItems= New;
        },
        
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